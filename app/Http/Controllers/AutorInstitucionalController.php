<?php

namespace App\Http\Controllers;

use App\Models\AutorInstitucional;
use Illuminate\Http\Response;
use Spatie\Searchable\Search;
use Illuminate\Http\Request;

class AutorInstitucionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $searchterm = $request->input('query');
        $searchResults = (new Search())
            ->registerModel(AutorInstitucional::class, 'nombre')
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
     * @param AutorInstitucional $autorInstitucional
     * @return Response
     */
    public function show(AutorInstitucional $autorInstitucional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AutorInstitucional $autorInstitucional
     * @return Response
     */
    public function edit(AutorInstitucional $autorInstitucional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param AutorInstitucional $autorInstitucional
     * @return Response
     */
    public function update(Request $request, AutorInstitucional $autorInstitucional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AutorInstitucional $autorInstitucional
     * @return Response
     */
    public function destroy(AutorInstitucional $autorInstitucional)
    {
        //
    }
}
