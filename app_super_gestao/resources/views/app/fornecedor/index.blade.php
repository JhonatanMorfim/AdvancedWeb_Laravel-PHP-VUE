<h3> Fornecedor </h3>

@php

@endphp

@isset($fornecedores)
    @forelse ($fornecedores as $indíce => $fornecedor)
        Iteração atual: {{ $loop->iteration}}
        <br>
        Fornecedor: {{ $fornecedor['nome']}}
        <br>
        Status: {{ $fornecedor['status']}}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não foi preenchido'}}
        <br>
        Telefone: {{ $fornecedor['ddd'] ?? ''}} {{ $fornecedor['telefone'] ?? ''}}
        <br>
        @if($loop->first)
            Primeira Iteração do Loop
            <br>
            Total de registros: {{$loop->count}}
        @endif
        @if($loop->last)
            Última Iteração do Loop
            
        @endif
        <hr>
    @empty
        Não existem fornecedores cadastrados
    @endforelse
@endisset
