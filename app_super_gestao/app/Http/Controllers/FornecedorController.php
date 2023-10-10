<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor1', 
                'status' =>'N', 
                'cnpj' => '00',
                'ddd' =>'11',
                'telefone'=> '1456-7893'
            ],
            1 => [
                'nome' => 'Fornecedor 2', 
                'status' =>'S', 
                'cnpj' => null,
                'ddd' =>'47',
                'telefone'=> '3465-7045'

            ],
            2 => [
                'nome' => 'Fornecedor 3', 
                'status' =>'S', 
                'cnpj' => '000.0000.0000/0000-00',
                'ddd' =>'48',
                'telefone'=> '99289898583'
            ]
        ];

        
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
