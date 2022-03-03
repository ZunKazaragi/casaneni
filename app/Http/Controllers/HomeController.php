<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            "username" => "required|string",
            "password" => "required|string",
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('username', $request->username)->first();
            return response()->json([
                'authorization' => true,
                'viewer' => $user
            ], 200);
        }

        return response()->json([
            'message' => 'Credential Not Found'
        ], 404);
    }
}
