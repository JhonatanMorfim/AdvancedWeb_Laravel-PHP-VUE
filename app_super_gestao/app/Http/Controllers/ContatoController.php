<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        $motivo_contatos= MotivoContato::all();       
        return view('site.contato', ['titulo' =>'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];
        
        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'Esse nome já foi utilizado para uma mensagem anterior',
            'email.email' => 'O e-mail inserido não é válido',
            'mensagem.max' => 'Você ultrapassou o limite de caracteres para o campo de mensagens',
            'required' => 'O campo :attribute deve ser preenchido'
        ];
        $request->validate(
                $regras,
                $feedback
        );
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
