<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contatoModel;

class SiteController extends Controller
{
    public function index(){
        return view('home');
    } 
    public function contato(){

        // buscar todos os registro
        //$contatos = ContatoModel::all();

        return view('contato');
    }
    public function salvar(Request $request){
       
        $dados_validados = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'mensagem' => 'required|min:5',
        ]);
        
        ContatoModel::create($dados_validados);

        return redirect()->route('site.contato')->with('sucesso', 'Mensagem recebida!');
    }
    
}
