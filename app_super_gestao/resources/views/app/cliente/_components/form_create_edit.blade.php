@if (isset($cliente->id))
    <form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id])}}">
        <input type="hidden" name="id" value="">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('cliente.store')}}">
        <input type="hidden" name="id" value="">
        @csrf
@endif
    <input type="text" name="nome" value="{{$cliente->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta">
    {{ $errors->has('nome') ? $errors-> first('nome') : ''}}    
    <button type="submit" class="borda-preta">Cadastrar</button>

</form>