@extends('layouts.app')

@section('content')
    <h1>Registrar Saída de Veículo</h1>
    <form action="{{ route('parking-usage.exit', $parkingUsage->id) }}" method="POST">
        @csrf
        <button type="submit">Registrar Saída</button>
    </form>
@endsection
