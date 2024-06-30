@extends('layouts.app')

@section('content')
    <h1>Editar Plano</h1>
    <form action="{{ route('plans.update', $plan) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value="{{ $plan->name }}" required>
        
        <label for="price">Preço:</label>
        <input type="number" step="0.01" id="price" name="price" value="{{ $plan->price }}" required>
        
        <button type="submit">Atualizar</button>
    </form>
@endsection
