@extends('layouts.app')

@section('content')
    <h1>Registrar Entrada de Veículo</h1>
    <form action="{{ route('parking-usage.register-entry') }}" method="POST">
        @csrf
        <label for="parking_spot_id">Escolha a Vaga:</label>
        <select id="parking_spot_id" name="parking_spot_id" required>
            @foreach($availableSpots as $spot)
                <option value="{{ $spot->id }}">{{ $spot->spot_number }}</option>
            @endforeach
        </select>
        
        <label for="plan_id">Escolha o Plano:</label>
        <select id="plan_id" name="plan_id" required>
            @foreach($plans as $plan)
                <option value="{{ $plan->id }}">{{ $plan->name }}</option>
            @endforeach
        </select>

        <button type="submit">Registrar Entrada</button>
    </form>

    <h1>Vagas Ocupadas</h1>
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
                    @if ($spot->is_occupied)
                        <td>
                            <form action="{{ route('parking-usage.exit', ['id' => $spot->id]) }}" method="POST">
                                    @csrf
                                <button type="submit">Registrar Saída</button>
                            </form>
                        </td>
                    @else
                        <td>Vaga Livre</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
