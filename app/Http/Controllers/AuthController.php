<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function loginForm()
    {
        return view('auth.login-form');
    }
    public function singUpForm()
    {
        return view('auth.singUp-form');

    }
    public function loginProcess(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
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
    public function singUpProcess(Request $request)
    {
        // $email= $request->email;
        // $name= $request->name;
        // $password= $request->password;
        $input = $request->all();
        $userCreate = User::create($input);
        // $credentials= $request->only(['email','password']);
        if (!$userCreate) {
            return redirect()
                ->back(fallback: route('singUp'))
                ->withInput()
                ->with('feedback', [
                    'message' => 'Hubo un error al registrarse.Intente de nuevo',
                    'alert' => 'danger'
                ]);


        }
        return redirect()
            ->route('login')

            ->with('feedback', [
                'message' => 'Registro exitoso.',
                'alert' => 'success'
            ]);


    }
    public function logoutProcess(Request $request)
    {
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
