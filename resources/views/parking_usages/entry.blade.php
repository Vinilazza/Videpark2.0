@extends('layouts.app')

@section('content')
    <h1>Registrar Entrada de Veículo</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif
    <form action="{{ route('parking-usage.entry') }}" method="POST">
        @csrf
        <label for="parking_spot_id">Número da Vaga:</label>
        <select id="parking_spot_id" name="parking_spot_id" required>
            @foreach($availableSpots as $spot)
                <option value="{{ $spot->id }}">{{ $spot->spot_number }}</option>
            @endforeach
        </select>
        <label for="plan_id">Plano:</label>
        <select id="plan_id" name="plan_id" required>
            @foreach($plans as $plan)
                <option value="{{ $plan->id }}">{{ $plan->name }}</option>
            @endforeach
        </select>
        <button type="submit">Registrar Entrada</button>
    </form>
@endsection
