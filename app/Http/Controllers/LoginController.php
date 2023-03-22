<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function autentificacion(Request $request)
    {
        if(Auth::attempt(request(['email','password'])) == false)
        {
            return back()->withErrors([
                'message' => 'Email o Password incorrecto, por favor intente de nuevo.'
            ]);
        }

        $carrito = Carrito::getCarritoSession();
        $carrito->update([
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('home');
    }

    public function destroy()
    {
        Session::forget('carrito_id');
        Auth::logout();
        return redirect()->route('home');
    }
}
