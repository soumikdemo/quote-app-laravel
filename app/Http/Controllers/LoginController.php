<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'password' => 'required',
        ]);

        $accessPassword = Hash::make(config('app.password'));

        if (Hash::check($request->password, $accessPassword)) {
            session(['AccessKey' => $accessPassword]);
            return redirect()->route('home');
        }else{
            return back()->with("error", "Password don't match!");
        }

    }
}
