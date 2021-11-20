<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Registro;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Searchable\Search;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $registros = Registro::latest()->take(5)->get(['id', 'eprintid', 'eprint_status', 'title', 'created_at']);
        $users = User::latest()->take(5)->get(['id', 'name', 'last_name', 'email', 'organization']);
        $registroArchiveCount = Registro::where('eprint_status', 'archive')->count();
        $registroCompleteCount = Registro::count();
        $userCount = User::count();
//        dd($registroCompleteCount);
        return view('admin.index', [
            'registros' => $registros,
            'usuarios' => $users,
            'registroCompleteCount' => $registroCompleteCount,
            'registroArchiveCount' => $registroArchiveCount,
            'userCount' => $userCount,
        ]);
    }

    public function personal()
    {
        $userID = Auth::id();
        $registros = Registro::where('user_deposito_id', $userID)
            ->where('user_edicion_id', $userID)
            ->paginate(30);
        return view('admin.registro.personal', [
            'registros' => $registros
        ]);
    }

    public function indexRegistro(?Request $request)
    {
        $eprint_status = '';
        if ($request->input('eprint_status')) {
            $eprint_status = $request->input('eprint_status');
        }
        $registros = Registro::select('id', 'eprintid', 'eprint_status', 'title', 'created_at', 'abstract')
            ->orderBy('created_at', 'DESC')
            ->where('eprint_Status', $eprint_status)
            ->paginate(25);
        return view('admin.registro.index', [
            'registros' => $registros,
        ]);
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
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *

     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Editorial $editorial
     * @return Response
     */
    public function destroy()
    {
        //
    }

}
