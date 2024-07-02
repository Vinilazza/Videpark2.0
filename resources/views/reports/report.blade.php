@extends('layouts.app')

@section('content')
    <h1>Relatório Financeiro de Estacionamento</h1>
    <table>
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Plano</th>
                <th>Entrada</th>
                <th>Saída</th>
                <th>Duração (min)</th>
                <th>Custo (R$)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($report as $item)
                <tr>
                    <td>{{ $item['user_id'] }}</td>
                    <td>{{ $item['plan'] }}</td>
                    <td>{{ $item['entry_time'] }}</td>
                    <td>{{ $item['exit_time'] }}</td>
                    <td>{{ $item['duration_minutes'] }}</td>
                    <td>{{ $item['cost'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
