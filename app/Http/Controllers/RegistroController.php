<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Jobs\importFolder;
use App\Models\Document;
use App\Models\Folder;
use App\Models\Registro;
use App\Models\Subject;
use App\Models\TipoRegistro;
use App\Models\RegistroTipoCampos;
use App\Services\ImportService;
use App\Services\ImportSubjectService;
use Carbon\Carbon;
use Database\Seeders\RegistroSeeder;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Debugbar;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $registros = Registro::where('eprint_status', 'archive')->orderBy('title')->paginate(18);
        return view('registros.index',['registros' => $registros, 'title'=> 'Todos los registros']);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // $registro = $request;
        $prueba = $request->prueba;
        $todo = $request->all();
        $registro = $todo['infoAdicional'];
        $ano_publicacion = $todo['infoAdicional']['ano_publicacion'];
        $registro = new Registro;
        $registro->firstOrCreate([
            'nombre' => $todo['nombre'],
            'tipo_de_documento' => $todo['tipo_de_documento'],
            'documento' => $todo['archivoEnviado']['response_file'],
            'resumen' => $todo['resumen'],
            'arbitrado' => $todo['infoAdicional']['arbitrado'],
            'estado_id' => $todo['infoAdicional']['estado_id'],
            'titulo_publicacion' => $todo['infoAdicional']['tipo_de_publicacion'],
            'issn' => $todo['infoAdicional']['issn'],
            'editor' => $todo['infoAdicional']['editor'],
            'año_publicacion' => $todo['infoAdicional']['ano_publicacion'],
            'mes_publicacion' => $todo['infoAdicional']['mes_publicacion'],
            'dia_publicacion' => $todo['infoAdicional']['dia_publicacion'],
            'tipo_de_fecha' => $todo['infoAdicional']['tipo_de_fecha'],
            'numero_serie' => $todo['infoAdicional']['numero_serie'],
            'pagina_hasta' => $todo['infoAdicional']['pagina_hasta'],
            'url_oficial' => $todo['infoAdicional']['url_oficial'],
            'volumen' => $todo['infoAdicional']['volumen'],
            'user_deposito_id' => 1,
            'user_edicion_id' => 1,
            'pagina_de' => $todo['infoAdicional']['pagina_de'],
            'numero_identificacion' => $todo['infoAdicional']['numero_identificacion']
        ]);
        $autores = $todo['autores'];
        // $this->storeAuthorRegister($autores, $registro);
        $autores_institucionales = $todo['autoresInstitucionales'];
        return response()->json(['response' => $ano_publicacion, 'prueba' => $prueba, 'todo' => $todo], 200);
    }

    public function storeAuthorRegister(array $autores, Registro $registro)
    {
        foreach ($autores as $autor => $value) {
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
        $registro->load("authors", "documents", "subjects", "projects", "divisions");
        foreach ($registro->documents as $document) {
            $document->url = URL::to(Storage::url($document->url));
        }
        return view('registros.show', ['registro' => $registro]);
    }

    public function latest()
    {
        $registros = Registro::where('eprint_status', 'archive')
            ->select('title','eprintid','id')
            ->with('authors')
            ->latest()->paginate(18);
        return view('registros.index', ['registros' => $registros, 'title'=> 'Ultimos Registros']);
    }
    public function year(){
        $years = Registro::where('eprint_status', 'archive')
            ->select('date_year')
            ->orderBy('date_year', 'DESC')->distinct()->get();
        return view('registros.year',['registros' => $years]);
    }
    public function yearShow($year){
        $year = $year=="empty"?"":$year;
        $yearRegistro = Registro::where('eprint_status', 'archive')
            ->where('date_year', $year)
            ->select('title','eprintid','id')
            ->with('authors')
            ->paginate(21);
        return view('registros.index',['registros' => $yearRegistro, 'title'=> 'Registros por año '.$year]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Registro $registro
     * @return Response
     */
    public function edit(Registro $registro)
    {
        //
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
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,doc,docx,ai,pdf|max:2048'
        ]);
        if ($request->file()) {
            $tmp_name = Str::random(32) . '.' . $request->file->getClientOriginalExtension();
            $imageName = $tmp_name;
            $request->file->move(public_path('images'), $imageName);
            return response()->json(['success' => 'Subida exitosa', 'funes_id' => rand(0, 9999), 'file_name_temp' => $tmp_name]);
        }
        return response()->json(['error' => "Tipo de archivo incompatible"]);
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
            case 'test':
                $subjects = new ImportSubjectService();
                $subjects->remove('ROOT');
                $subjects->colSub();
                break;
            case 'complete':
                $service->identifyFoldersToExplore();
                $service->scanRegister();
                $service->extractRegister();
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
        return response(['tipos_registro' => $tipos_registro, 'message' => 'Tipos de registro enviados correctamente'], 200);
    }

    public function camposTiposRegistro()
    {
        $campos_tipo_registro = RegistroTipoCampos::all();
        return response(['campos_tipos_registro' => $campos_tipo_registro, 'message' => 'Tipos de registro enviados correctamente'], 200);
    }

    private function moveRegisterFile(array $document, string $oldFileRoute, string $newFileRoute)
    {

    }
}
