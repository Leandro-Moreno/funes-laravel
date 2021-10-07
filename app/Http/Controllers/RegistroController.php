<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Folder;
use App\Models\Registro;
use App\Models\TipoRegistro;
use App\Models\RegistroTipoCampos;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        return view('registros.index');
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
        // dd($todo);
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
        return view('registros.show', ['registro' => $registro]);
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
    public function massiveFiles(){
        $xmlString = file_get_contents(public_path('14.xml'));
        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);
        $userId = Auth::id();
        $phpArray['user_deposito_id'] = $userId;
        $phpArray['user_edicion_id'] = $userId;
        $phpArray['created_at'] = $this->modifyDate($phpArray['datestamp']);
        $phpArray['updated_at'] = $this->modifyDate($phpArray['lastmod']);
        $phpArray['status_changed'] = $this->modifyDate($phpArray['status_changed']);
        $registro = Registro::create($phpArray);
        $documents = $phpArray['documents'];
        if(!empty($documents))
        {
            $this->createDocuments($phpArray['documents'], $registro);
        }
    }
    private function loadXmlContent(String $route): Array
    {
        $xmlString = Storage::get($route);
        $xmlObject = simplexml_load_string($xmlString);
        $json = json_encode($xmlObject);
        $content = json_decode($json, true);
        return $content;
    }
    public function createRoute(String $path)
    {
        if(!Storage::exists($path)){
            Storage::makeDirectory($path);
        }
    }
    private function createDocuments(Array $xmlrevision, Registro $eprint)
    {
            //makeFolder
            $path = 'document/'.strval($xmlrevision['eprintid']);
            $this->createRoute($path);
            if(array_key_exists('pos',$xmlrevision['documents']['document'])){
                $documents = $xmlrevision['documents'];
            }
            else{
                $documents = $xmlrevision['documents']['document'];
            }
            //Temporal TODO
        $xmlrevision['dir'] = str_replace("disk0/00/01/02","disk0.00.01.02", $xmlrevision['dir']);

        foreach ($documents as $document)
            {
                $document['filename'] = $document['files']['file']['filename'];
                $document['filesize'] = $document['files']['file']['filesize'];
                $document['url'] = $document['files']['file']['url'];
                $path = $path . '/' . $document['pos'];
                $oldFileRoute = $xmlrevision['dir'] . '/'.str_pad($document['pos'], 2, "0", STR_PAD_LEFT) . '/' . $document['filename'];
                $this->createRoute($path);
                $newFileRoute = $path . '/' . $document['filename'];
                if(Storage::exists($oldFileRoute) && ! Storage::exists($newFileRoute))
                {
                    //TODO change for move // dejarlo por temas de pruebas de ejecución
                    Storage::copy($oldFileRoute, $newFileRoute);
//                    if(!array_key_exists('format', $document)){
//                        $document['format'] = mime_content_type( Storage::path($newFileRoute) );
//                    }
                    $document['hash'] = sha1_file(Storage::path($newFileRoute));
                    $document['eprintid'] = $eprint->eprintid;
                    $document['registro_id'] = $eprint->id;
                    $validator = Validator::make($document,[
                        'format' => ' required',
                        'language' => 'required',
                        'registro_id' => 'required',
                        'license' => 'required',
                        'main' => 'required',
                        'filename' => 'required',
                        'filesize' => 'required',
                        'hash' => 'required',
                        'url' => 'required',
                        'docid' => 'required',
                        'eprintid' => 'required',
                        'security' => 'required',
                        'pos' => 'required',
                        'license' => 'required'
                    ]);
                    if(!$validator->fails()){
                        $document = $validator->validated();
                        $document = Document::create($document);
                    }
                }
            }

    }
    private function moveRegisterFile(Array $document, String $oldFileRoute, String $newFileRoute)
    {

    }
    private function modifyDate(String $date): String
    {
        $strDate = str_replace("T"," ",$date);
        $strDate = str_replace("Z","",$strDate);
        $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $strDate);
        return $dateTime->toDateTimeString();
    }
    public function identifyFoldersToExplore(): Array
    {
        $folder_routes = collect();
        //TODO change disk.000 for testing purposes
        $directories = Storage::allFiles("disk0.00.01.02");
        foreach ($directories as $directory)
        {
            if(str_contains($directory, 'revisions'))
            {
                $folder_routes_temp = explode("/revisions", $directory);
                if(! $folder_routes->contains($folder_routes_temp[0])){
                    $folder_routes->push($folder_routes_temp[0]);
                    $folder = Folder::firstOrCreate(
                        ['route' => $folder_routes_temp[0] ]
                    );
                }
            }
        }
        return $directories;
    }
    public function massiveFolders()
    {
        Debugbar::startMeasure('render','identifyFoldersToExplore');
        $directories = $this->identifyFoldersToExplore();
        Debugbar::stopMeasure('render');
        Debugbar::startMeasure('render','scanRegister');
        $this->scanRegister();
        Debugbar::stopMeasure('render');
        Debugbar::startMeasure('render','extractRegister');
        $this->extractRegister();
        Debugbar::stopMeasure('render');
        return view('principal');
    }
    public function scanRegister(){
        $routes = Folder::where('scanned', false)->where('extracted',false)->get();
        foreach ($routes as $route)
        {
            $folderRoute = $route->route . "/revisions";
            $directories = Storage::allFiles($folderRoute);
            $main = $this->selectMainFromFolder($directories, $folderRoute);
            $fileRoute = $folderRoute . "/" . $main . '.xml';
            $phpArray = $this->loadXmlContent($fileRoute);

            $route->xmlRevision = $main;
            $route->eprintid = $phpArray['eprintid'];
            $route->scanned = true;
            $route->save();
        }
    }
    private function selectMainFromFolder(Array $files, String $folderRoute): int
    {
        $xmlNumber = Array();
        foreach ($files as $file)
        {
            $file = explode($folderRoute . "/", $file);
            $file = $file[1];
            $file = explode(".xml", $file);
            array_push($xmlNumber, $file[0]);
        }
        return max($xmlNumber);
    }
    public function extractRegister()
    {
        $routes = Folder::where('scanned', true)->where('extracted',false)->orderBy('eprintid')->get();
        foreach ($routes as $route)
        {
            $fileRoute = $route->route . "/revisions/" . $route->xmlRevision . '.xml';
            $phpArray = $this->loadXmlContent($fileRoute);

            $userId = Auth::id();
            $phpArray['user_deposito_id'] = $userId;
            $phpArray['user_edicion_id'] = $userId;
            $phpArray['created_at'] = $this->modifyDate(array_key_exists('datestamp', $phpArray)? $phpArray['datestamp'] : $phpArray['lastmod']);
            $phpArray['updated_at'] = $this->modifyDate($phpArray['lastmod']);
            $phpArray['status_changed'] = $this->modifyDate($phpArray['status_changed']);
            $registro = Registro::create($phpArray);
            $documents = $phpArray['documents'];
            if(!empty($documents)) {
                $this->createDocuments($phpArray, $registro);
            }
            $route->extracted = true;
            $route->save();
        }
//        dd("$routes");
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
}
