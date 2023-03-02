<?php

namespace App\Http\Controllers;

use App\Models\Routes;
use Illuminate\Http\Request;
use Auth;


class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'route_alias' => 'required|unique:routes|max:255',
            'position' => 'required|integer',
            'role_id' => 'required|exists:roles,id',
        ]);

        $route = Routes::create($validatedData);
        return response()->json(['message' => 'Ruta creada correctamente', 'route' => $route]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function show(Routes $routes)
    {
        $role_tmp = 4;
        if(Auth::check()){
            $role_tmp = Auth::user()->role_id;
        }
        $routes = Routes::where('role_id', '>=', $role_tmp)->get();
        return response()->json([
            'routes' => $routes,
            'auth' => Auth::check()
        ]);
    }

    public function edit(Routes $route)
    {
        $roles = Role::all();
        return response()->json(['route' => $route, 'roles' => $roles]);
    }

    public function update(Request $request, Routes $route)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'route_alias' => ['required', 'max:255', Rule::unique('routes')->ignore($route->id)],
            'position' => 'required|integer',
            'role_id' => 'required|exists:roles,id',
        ]);

        $route->update($validatedData);
        return response()->json(['message' => 'Route updated successfully', 'route' => $route]);
    }

    public function destroy(Routes $route)
    {
        $route->delete();
        return response()->json(['message' => 'Route deleted successfully']);
    }
}
