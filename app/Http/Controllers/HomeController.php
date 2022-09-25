<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $user = User::where('email', '=', "admin@example.com")->first();
        $token = $user->createToken('basic-token')->plainTextToken;

        return view('welcome', compact('token'));
    }
}
