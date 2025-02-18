<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class UsuarioController extends Controller
{
    public function CadasroUsuario()
    {
        return view('site/CadastroUsuario');
    }

    public function SalvarUsuario(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'senha' => 'required|min:6',
        ]);

       User::created([

            'name' => $request->nome,
            'email' => $request->email,
            'password' => bcrypt($request->senha),
       ]);

        return redirect('trabalho');
    }

    public function LoginUsuario()
    {
        return view('site/LoginUsuario');
    }
    public function AutenticarUsuario(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|min:6',
        ]);
        
        if (Auth::attempt($request->only('email', 'senha'))) {
            return redirect('trabalho');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }
}
