@if (isset($pedido->id))
    <form method="post" action="{{ route('pedido.update', ['pedido' => $pedido->id])}}">
        <input type="hidden" name="id" value="">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('pedido.store')}}">
        <input type="hidden" name="id" value="">
        @csrf
@endif
    <select name="cliente_id" class="borda-preta">
        <option>-- Selecione um Cliente -- </option>
        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id}}" {{ $pedido->cliente_id ?? old('cliente_id') == $cliente->id ? 'selected' : ''}}>{{$cliente->nome}}</option>
        @endforeach
    </select>
    {{ $errors->has('cliente_id') ? $errors-> first('cliente_id') : ''}}    
    <button type="submit" class="borda-preta">Cadastrar</button>

</form>