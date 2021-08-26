<?php

namespace App\Http\Controllers;

use App\Registro;
use App\TipoRegistro;
use App\RegistroTipoCampos;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

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
        return response()->json(['response'=>$ano_publicacion, 'prueba' => $prueba, 'todo' => $todo],200);
    }
    public function storeAuthorRegister(Array $autores, Registro $registro)
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
    public function subirImagen(Request $request){
      $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,doc,docx,ai,pdf|max:2048'
            ]);
      if($request->file()) {
        $tmp_name = Str::random(32).'.'.$request->file->getClientOriginalExtension();
        $imageName = $tmp_name;
        $request->file->move(public_path('images'), $imageName);
        return response()->json(['success'=>'Subida exitosa', 'funes_id'=>rand(0,9999), 'file_name_temp'=>$tmp_name]);
      }
      return response()->json(['error'=>"Tipo de archivo incompatible"]);
    }
    public function tiposRegistro(){
      $tipos_registro = TipoRegistro::all();
      return response(['tipos_registro' => $tipos_registro, 'message' => 'Tipos de registro enviados correctamente'],200);
    }
    public function camposTiposRegistro(){
      $campos_tipo_registro = RegistroTipoCampos::all();
      return response(['campos_tipos_registro' => $campos_tipo_registro, 'message' => 'Tipos de registro enviados correctamente'],200);
    }
}
