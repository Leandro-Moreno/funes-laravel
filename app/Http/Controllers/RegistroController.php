<?php

namespace App\Http\Controllers;

use App\Registro;
use App\TipoRegistro;
use App\RegistroTipoCampos;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('registros.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro $registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registro  $registro
     * @return \Illuminate\Http\Response
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
