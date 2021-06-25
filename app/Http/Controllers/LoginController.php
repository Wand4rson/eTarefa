<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //

    //Abre Form Login
    public function loginForm()
    {
        return view('login.login');
    }

    //Recupera dados do form e faz login
    public function loginFormAction(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) 
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        else
        {
            return redirect()->route('login')->with(['msgErro' => 'Usuário ou senha Inválido.']);
        }

    }

    //Abre Form Registro Usuario
    public function loginRegisterForm()
    {
        return view('login.register');
    }

     //Recupera dados do form e faz cadastro
     public function loginRegisterFormAction(Request $request)
     {

        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'password' => ['required','min:4'],
            'password_confirmation' => ['required','min:4','same:password']
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        

        return redirect()->route('login');
     }


     //Logout
     public function logoutAction()
     {
        Auth::logout();
       return redirect()->route('login');
     }

}
