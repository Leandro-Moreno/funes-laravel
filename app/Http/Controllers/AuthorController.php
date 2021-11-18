<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Response;
use Spatie\Searchable\Search;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $authors = Author::withCount('registros')->orderBy('registros_count', 'desc')->paginate(20);
        return view('authors.index', ['authors' => $authors]);

    }

    public function search(Request $request)
    {
        $searchterm = $request->input('query');

        $searchResults = (new Search())
            ->registerModel(Author::class, 'given', 'family', 'email')
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
     * @param Author $author
     * @return Response
     */
    public function show(Author $author)
    {
        $registros = $author
            ->registros('eprintid', 'title')
            ->paginate(18);

        return view('registros.index', [
            'registros' => $registros,
            'title' => 'Registros por autores ' . $author->given . ' ' . $author->family
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Author $author
     * @return Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Author $author
     * @return Response
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return Response
     */
    public function destroy(Author $author)
    {
        //
    }
}
