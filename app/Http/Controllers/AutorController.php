<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Response;
use Spatie\Searchable\Search;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
      // dd($request);
      $searchterm = $request->input('query');

        $searchResults = (new Search())
                    ->registerModel(Autor::class, 'nombre', 'apellido', 'email')
                    ->perform($searchterm);
        return response()->json($searchResults);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Autor $autor
     * @return Response
     */
    public function show(Autor $autor)
    {
        var_dump("hola");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Autor $autor
     * @return Response
     */
    public function edit(Autor $autor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Autor $autor
     * @return Response
     */
    public function update(Request $request, Autor $autor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Autor $autor
     * @return Response
     */
    public function destroy(Autor $autor)
    {
        //
    }
}
