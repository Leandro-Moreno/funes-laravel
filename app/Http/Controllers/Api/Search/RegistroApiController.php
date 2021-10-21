<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registro;

class RegistroApiController extends Controller
{
    public function search(Request $request)
    {
        // En primer lugar definimos el mensaje de error que vamos a mostrar
        // si no existieran palabras clave o si no hay resultados.
        $error = ['error' => 'Sin resultados, ingrese otros campos para la búsqueda.'];

        // Si el usuario hizo una peticion e ingreso texto
        if($request->has('text')) {

            // Usando Laravel Scout para buscar en la tabla post.
            $posts = Registro::search($request->get('text'))->get();
            dd($posts);

            // If there are results return them, if none, return the error message.
            return $posts->count() ? $posts : $error;

        }

        // Retorna un mensaje de error si no existe
        return $error;
    }
}
