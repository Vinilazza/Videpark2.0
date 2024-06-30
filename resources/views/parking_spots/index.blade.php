@extends('layouts.app')

@section('content')
    <h1>Vagas de Estacionamento</h1>
    <table>
        <thead>
            <tr>
                <th>Número da Vaga</th>
                <th>Ocupada</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($parkingSpots as $spot)
    <tr>
        <td>{{ $spot->spot_number }}</td>
        <td>{{ $spot->is_occupied ? 'Sim' : 'Não' }}</td>
        <td>
            @if ($spot->is_occupied)
                <form action="{{ route('parking-usage.exit', ['id' => $spot->id]) }}" method="POST">
                    @csrf
                    <button type="submit">Registrar Saída</button>
                </form>
            @endif
        </td>
    </tr>
@endforeach
        </tbody>
    </table>
    <hr>
    <h2>Adicionar Nova Vaga</h2>
    <form action="{{ route('parking-spots.store') }}" method="POST">
        @csrf
        <label for="spot_number">Número da Vaga:</label>
        <input type="text" id="spot_number" name="spot_number" required>
        <button type="submit">Adicionar</button>
    </form>
@endsection
