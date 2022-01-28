<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\User;

class CountApiController extends Controller
{
    public function registros()
    {
        return response()->json([
            'registros' => Registro::where('eprint_status', 'archive')->count(),
            'users' => User::all()->count()
        ]);
    }
}
