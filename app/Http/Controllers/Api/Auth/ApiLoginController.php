<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class ApiLoginController extends Controller
{
    /**
     * @throws AuthenticationException
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('username', 'password');
        if (!auth()->attempt($credentials)) {
            throw new AuthenticationException('Invalid credentials');
        }
    }
}
