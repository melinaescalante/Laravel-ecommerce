<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function loginForm(){
    return view('auth.login-form');
    }

    public function loginProcess(Request $request){
        $credentials= $request->only(['email','password']);
        if (!auth()->attempt($credentials)) {
            return redirect()
            ->back(fallback: route('login'))
            ->withInput()
            ->with('feedback', [
                'message' => 'La credenciales ingresadas no coinciden con nuestros registros.',
                'alert' => 'danger'
            ]);
        

        }
        return redirect()
        ->route('games')
        
        ->with('feedback', [
            'message' => 'Inicio de sesion exitoso.',
            'alert' => 'success'
        ]);
        
        
    }
    public function logoutProcess(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()
        ->route('login')
      
        ->with('feedback', [
            'message' => 'Cierre de sesion exitoso.',

            'alert' => 'warning'
        ]);
        
    }

}
