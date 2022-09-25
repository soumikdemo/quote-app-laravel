<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Setup Token Authentication
Route::get('/setup', function(){
    $credentials = [
        "email" => "admin@example.com",
        "password" => "password",
    ];

    if(!Auth::attempt($credentials)){
        $user = new User();
        $user->name = "Admin";
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        $user->save();

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $basicToken = $user->createToken('basic-token');

            return [
                'token' => $basicToken->plainTextToken
            ];
        }
    }else{
        $user = Auth::user();
        $basicToken = $user->createToken('basic-token');

        return [
            'token' => $basicToken->plainTextToken
        ];
    }
});


//Protected with password
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('AuthenticateWithPassword');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
