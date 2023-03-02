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
        return response()->json($authors);

    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $searchterm = $request->input('query');

        $searchResults = (new Search())
            ->registerModel(Author::class, 'given', 'family', 'email')
            ->perform($searchterm);
        return response()->json($searchResults);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'given' => ['required', 'string'],
            'family' => ['required', 'string'],
            'email' => ['nullable', 'email']
        ]);

        $author = Author::create($validatedData);

        return response()->json(['message' => 'Author created successfully', 'author' => $author]);
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

        return response()->json([
            'registros' => $registros,
            'title' => 'Registros por autores ' . $author->given . ' ' . $author->family
        ]);
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
        $validatedData = $request->validate([
            'given' => ['required', 'string'],
            'family' => ['required', 'string'],
            'email' => ['nullable', 'email']
        ]);

        $author->update($validatedData);

        return response()->json(['message' => 'Author updated successfully', 'author' => $author]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return Response
     */
    public function destroy(Author $author)
    {
        $author->registros()->detach();
        $author->delete();
        return response()->json(['message' => 'Author deleted successfully']);
    }
}
