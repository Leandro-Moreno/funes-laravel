<?php

namespace App\Http\Controllers;

use App\Exceptions\ImagickException;
use App\Http\Requests\DocumentRequest;
use App\Http\Requests\RegistroRequest;
use App\Http\Requests\UploadRegistroImageRequest;
use App\Jobs\importFolder;
use App\Models\Author;
use App\Models\AuthorInstitutional;
use App\Models\Document;
use App\Models\Folder;
use App\Models\Registro;
use App\Models\Subject;
use App\Models\TipoRegistro;
use App\Models\RegistroTipoCampos;
use App\Services\ImagickService;
use App\Services\ImportService;
use App\Services\ImportSubjectService;
use Butschster\Head\Facades\Meta;
use Carbon\Carbon;
use Database\Seeders\RegistroSeeder;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Debugbar;

class RegistroController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Registro::class, 'registro');
        $this->middleware(['auth','verified'])->except(['index', 'show', 'year', 'yearShow', 'latest', 'editorial', 'publication', 'search']);
    }

    /**
     * Get the map of resource methods to ability names.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
        return [
            'show' => 'view',
            'create' => 'create',
            'store' => 'create',
            'edit' => 'update',
            'update' => 'update',
            'destroy' => 'delete',
            'latest' => 'another',
            'yearShow' => 'another',
            'year' => 'another',
            'massiveFolders' => 'administrator'
        ];
    }

    /**
     * Get the list of resource methods which do not have model parameters.
     *
     * @return array
     */
    protected function resourceMethodsWithoutModels()
    {
        return ['index', 'create', 'store', 'latest', 'year', 'yearShow', 'massiveFolders'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //dd input request
//        dd(request()->all());
//        dd($request->input('ids'));
        $req = $request->input('ids');
//        dd($req['ids']);
        return view('registros.index-main', [
            'title' => 'Todos los registros',
            'ids' => $req,
        ]);
        // return csrf_token();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('registros.create');
    }

    public function showArray(Request $request)
    {
        $registros = Registro::where('eprint_status', 'archive')->find($request->input('ids'));
        dd($registros);
    }

    public function attachUser(Registro $registro)
    {
        $user = Auth::user();
        $attached = $registro->users->contains($user);
        if ($attached) {
            $registro->users()->detach($user);
        } else {
            $registro->users()->attach($user);
        }
        $attached = !$attached;
        return ['attached' => $attached];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(RegistroRequest $request)
    {
//        return response()->json(['request' => $request->validated()]);
        $registroInput = $request->validated();
        $registroInput = $registroInput['registro'];
        if (is_null($registroInput['eprintid'])) {
            $registroInput['eprintid'] = $this->getNextEprintid();
        }
        $registroInput['user_deposito_id'] = Auth::id();
        $registroInput['user_edicion_id'] = Auth::id();
        $subjects = $registroInput['subjects'];
        unset($registroInput['subjects']);
        $registro = new Registro;
        $registro = $registro->updateOrCreate($registroInput);
//        $registro->save();
        $authors = $request['registro']['authors'];
        $this->storeAuthorRegister($authors, $registro);//        $autores_institucionales = $todo['autoresInstitucionales'];
        $this->storeSubjectRegister($subjects, $registro);
        return response()->json(['success' => 'Subida exitosa', 'registro' => $registro, 'route' => route('registro.edit', $registro->eprintid)]);
    }

    // public function storeSubjectRegister(array $subjects, Registro $registro) must search the subjects trough eloquent  and attach with registro
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function storeSubjectRegister(array $subjects, Registro $registro)
    {
        foreach ($subjects as $subject) {
            if($registro->subjects->contains($subject)){
                break;
            }
            $subject = Subject::firstOrCreate(['id' => $subject]);
            $registro->subjects()->attach($subject);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function storeAuthorInstitucionalRegister(array $autores_institucionales, Registro $registro){

        foreach ($autores_institucionales as $author) {
            if (!is_null($author['nombre'])) {
                if (!is_null($author['id'] )) {
                    $authorTemp = AuthorInstitutional::find($author['id']);
                }
                else{
                    $authorTemp = new AuthorInstitutional([
                        'nombre' => $author['nombre'],
                    ]);
                    $authorTemp->save();
                }
                $registro->institutionalAuthors()->attach($authorTemp);
            }
        }
    }
    public function storeAuthorRegister(array $authors, Registro $registro)
    {
        foreach ($authors as $author) {
            if (!is_null($author['family'])) {
                if (!is_null($author['authorId'] )) {
                    $authorTemp = Author::find($author['authorId']);
                }
                else{
                    $authorTemp = new Author([
                        'given' => $author['given'],
                        'family' => $author['family'],
                        'email' => $author['email'],
                    ]);
                    $authorTemp->save();
                }
                $registro->authors()->attach($authorTemp);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Registro $registro
     * @return Response
     */
    public function show(Registro $registro)
    {
        $registro->load("authors", "documents", "subjects", "projects", "divisions", "validateAuthUserAttached:id");
        foreach ($registro->documents as $document) {
            $document->url = URL::to(Storage::url($document->url));
            $document->thumbnail = URL::to(Storage::url($document->thumbnail));
        }
        Meta::setCanonical($registro->route);
        Meta::setDescription($registro->abstract);
        return view('registros.show', ['registro' => $registro]);
    }

    public function latest()
    {
        $registros = Registro::where('eprint_status', 'archive')
            ->select('title', 'eprintid', 'id')
            ->where(
                'created_at', '>=', Carbon::now()->subDays(120)->firstOfMonth()->toDateTimeString()
            )
            ->with('authors')
            ->latest()->paginate(18);
        return view('registros.latest', ['registros' => $registros, 'title' => 'Ultimos Registros']);
    }

    public function year()
    {
        $years = DB::table('registros')
            ->where('eprint_status', 'archive')
            ->select('date_year')
            ->orderBy('date_year', 'DESC')
            ->distinct()
            ->get();
        return view('registros.year', ['years' => $years]);
    }

    public function yearShow($year)
    {
        $year = $year == "empty" ? "" : $year;
        $yearRegistro = Registro::where('eprint_status', 'archive')
            ->where('date_year', $year)
            ->select('title', 'eprintid', 'id')
            ->with('authors')
            ->paginate(21);
        return view('registros.index', ['registros' => $yearRegistro, 'title' => 'Registros por año ' . $year]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Registro $registro
     * @return Response
     */
    public function edit(Registro $registro)
    {
//        dd($registro);
        $registro->load(['documents','subjects', 'authors']);
        foreach ($registro->documents as $document) {
            $document->url = URL::to(Storage::url($document->url));
            $document->thumbnail = URL::to(Storage::url($document->thumbnail));
        }
        return view('registros.edit', ['registro'=>$registro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Registro $registro
     * @return Response
     */
    public function update(Request $request, Registro $registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Registro $registro
     * @return Response
     */
    public function destroy(Registro $registro)
    {
        //
    }

    public function subirImagen(UploadRegistroImageRequest $request)
    {
        $validated = $request->validated();
        /*
         * $validated have the variable file and nullable id. If id is null, the image is new, else the image is updated, check if id is null and then
         *
         */

        if (is_null($validated['id'])) {
        }
        $eprintid = $request->input('id');
        $registro = Registro::where('eprintid', $eprintid)->first();
        if (is_null($registro)) {
            $eprintid = $this->getNextEprintid();
            $registro = new Registro(['eprintid' => $eprintid, 'eprint_status' => 'inbox', 'user_deposito_id' => Auth::id()]);
        }
        $registro->user_edicion_id = Auth::id();
        $registro->save();
        $filePath = 'public/document/' . $eprintid;
        $service = new ImportService();
        $service->createRoute($filePath);
        $file = $request->file('file');
        $imageName = $request->file->getClientOriginalName();
        $path = $request->file->storeAs($filePath, $imageName);
        $document = new Document([
            'format' => $file->getMimeType(),
            'language' => 'es',
            'registro_id' => $registro->id,
            'eprintid' => $registro->eprintid,
            'pos' => 1,
            'security' => 'public',
            'license' => 'cc_by_nc_nd',
            'main' => $imageName,
            'filename' => $imageName,
            'filesize' => $file->getSize(),
            'hash' => sha1_file(Storage::path($filePath . "/" . $imageName)),
            'url' => $filePath . '/' . $imageName,
            'docid' => $this->getNextDocumentid()
        ]);
        $document->save();
        return response()->json(['success' => 'Subida exitosa', 'registro' => $registro, 'document' => $document]);
        return response()->json(['error' => "Tipo de archivo incompatible"]);
    }


    public function convertDivisionsIntoSubjects() {
        $registros = Registro::with('divisions')->get();
        //$registros foreach and get the divisions element. Get each division and transform into a subject
        foreach ($registros as $registro) {
            foreach ($registro->divisions as $division) {
                $subject = Subject::where('name', $division->name)->first();
                $registro->subjects()->attach($subject);
                $registro->divisions()->detach($division);
            }
        }
        dd($registros);
    }


    public function importFolders()
    {
        $folders = Folder::with(['register', 'register.documents'])
            ->latest()
            ->get();
        return view('import.index', ['folders' => $folders]);
    }

    public function massiveFolders(Request $request)
    {
        $service = new ImportService();
        switch ($request->process) {
            case 'search':
                $service->identifyFoldersToExplore();
                break;
            case 'scan':
                $service->scanRegister();
                break;
            case 'extract':
                $service->extractRegister();
                break;
            case 'subjects':
                $subjects = new ImportSubjectService();
                cache()->forget('subjectRegistros');
                $subjects->remove('ROOT');
                $subjects->colSub();
                break;
            case 'complete':
                $service->identifyFoldersToExplore();
                $service->scanRegister();
                $service->extractRegister();
                break;
            case 'documents':
                $documents = Document::where('format', 'application/pdf')
                    ->whereNull('thumbnail')
                    ->whereNotIn('eprintid', [395, 458, 503, 672, 1199, 799, 858])
                    ->cursor();
//                    ->take(10)
//                    ->get();
//            dd($documents);
                $documents->each(function ($document) {
                    $this->generateImageFromPDF($document);
                });
                break;
            default:
                break;
        }
        $folders = Folder::with(['register', 'register.documents'])
            ->orderBy('processid', 'DESC')
            ->orderBy('eprintid', 'DESC')
            ->paginate(30);
        return view('import.index', ['folders' => $folders]);
    }

    public function tiposRegistro()
    {
        $tipos_registro = TipoRegistro::all();
        return $tipos_registro;
    }

    public function camposTiposRegistro()
    {
        $campos_tipo_registro = RegistroTipoCampos::all();
        return response(['campos_tipos_registro' => $campos_tipo_registro, 'message' => 'Tipos de registro enviados correctamente'], 200);
    }

    private function moveRegisterFile(array $document, string $oldFileRoute, string $newFileRoute)
    {

    }

    public function generateImageFromPDF(Document $document)
    {
        $base = "public/document/" . $document->eprintid . '/' . $document->pos . "/";
        $thumbBase = $base . "thumbnail.jpg";
        $thumbnailRoute = storage_path("app/" . $thumbBase);
        if (!Storage::exists($thumbnailRoute)) {
            if (!Storage::exists("public/document/tmp")) {
                Storage::makeDirectory("public/document/tmp");
            }
            $pdfRoute = storage_path("app/" . $base . $document->filename);
            $pdf = new ImagickService($pdfRoute);
            $pdf->setResolution(60);
            $pdf->saveImage(storage_path("app/public/document/tmp/thumbnail.jpg"));
            $pdf->imagick->clear();
            $pdf->imagick->destroy();
//            dd(Storage::path("public\document\\tmp\\thumbnail.jpg"));
            rename(Storage::path("public/document/tmp/thumbnail.jpg"), Storage::path($thumbBase));
        }
        $document->thumbnail = $thumbBase;
        $document->save();
    }

    public function indexAdministrator()
    {
        return view('admin.registro.index');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        isset($query) ? $query : "";
        return view('search.simple', ['query' => $query]);
    }
}
