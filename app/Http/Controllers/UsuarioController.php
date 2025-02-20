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
        //validação
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'senha' => 'required|min:6',
        ]);


        //salvar
       User::create([

            'name' => $request->nome,
            'email' => $request->email,
            'password' => bcrypt($request->senha),
       ]);
     

        //redirecionar
        return redirect('trabalho');
    }

    public function LoginUsuario(Request $request)
    {
        //validação
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
      
        //tentativa de login
        if (Auth::attempt($request->only('email', 'senha'))) {
            //return redirect()->route('trabalho');
            return redirect('trabalho');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    
    }
}
