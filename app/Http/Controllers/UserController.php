<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
            'message' => 'Welcome to your home page'
        ]);
    }
}