@extends('layouts.app')

@section('content')
    <h1>Adicionar Plano</h1>
    <form action="{{ route('plans.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="price">Preço:</label>
        <input type="number" step="0.01" id="price" name="price" required>
        
        <button type="submit">Salvar</button>
    </form>
@endsection
