<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function logIn(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json([
                'message' => 'Credenciales incorrectas'
            ]);
        };

        $user = User::where('email', $request['email'])->firstOrFail();
        $user->createToken('auth_token')->plainTextToken;

        if($this->ip() == '127.0.0.1' && $user->role_id == 1){
            $cookie = cookie('origin_sesion', 'valor de la cookie', 60);
            return redirect('/home')->withCookie($cookie);
        }
        return redirect('/home');
    }

    public function ip()
    {
        $data = request()->ip();
        return $data;
    }
}
