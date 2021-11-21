<?php

namespace App\Http\Controllers;

use App\Exceptions\ImagickException;
use App\Http\Requests\DocumentRequest;
use App\Http\Requests\RegistroRequest;
use App\Jobs\importFolder;
use App\Models\Author;
use App\Models\Document;
use App\Models\Folder;
use App\Models\Registro;
use App\Models\Subject;
use App\Models\TipoRegistro;
use App\Models\RegistroTipoCampos;
use App\Services\ImagickService;
use App\Services\ImportService;
use App\Services\ImportSubjectService;
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
        $this->middleware('auth')->except(['index', 'show', 'year', 'yearShow', 'latest', 'editorial', 'publication']);
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
    public function index()
    {
        return view('registros.index-main', ['title' => 'Todos los registros']);
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
        $registroInput = $request->validated();
        $registroInput = $registroInput['registro'];
        if (is_null($registroInput['eprintid'])) {
            $registroInput['eprintid'] = $this->getNextEprintid();
        }
        $registroInput['user_deposito_id'] = Auth::id();
        $registroInput['user_edicion_id'] = Auth::id();
        $registro = new Registro;
        $registro = $registro->firstOrCreate($registroInput);
        $authors = $request['registro']['authors'];
        $this->storeAuthorRegister($authors, $registro);
//        $autores_institucionales = $todo['autoresInstitucionales'];
        return response()->json(['success' => 'Subida exitosa', 'registro' => $registro]);
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
        return view('registros.show', ['registro' => $registro]);
    }

    public function latest()
    {
        $registros = Registro::where('eprint_status', 'archive')
            ->select('title', 'eprintid', 'id')
            ->with('authors')
            ->latest()->paginate(18);
        return view('registros.index', ['registros' => $registros, 'title' => 'Ultimos Registros']);
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
        $registro->with(['documents','subjects', 'authors'])->get();
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

    public function subirImagen(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,doc,docx,ai,pdf|max:128048'
        ]);
        if ($request->file()) {
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
                'license' => 'cc_bync_nd',
                'main' => $imageName,
                'filename' => $imageName,
                'filesize' => $file->getSize(),
                'hash' => sha1_file(Storage::path($filePath . "/" . $imageName)),
                'url' => $filePath . '/' . $imageName
            ]);
            $document->save();
            return response()->json(['success' => 'Subida exitosa', 'registro' => $registro, 'document' => $document]);
        }
        return response()->json(['error' => "Tipo de archivo incompatible"]);
    }

    public function getNextEprintid()
    {
        $id = Registro::select('eprintid')->latest('eprintid')->first();
        return (int)$id->eprintid + 1;
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
}
