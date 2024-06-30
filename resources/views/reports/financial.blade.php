@extends('layouts.app')

@section('content')
    <h1>Relatório Financeiro</h1>
    <form action="{{ route('reports.financial') }}" method="GET">
        <label for="from">Data Início:</label>
        <input type="date" id="from" name="from" required>
        <label for="to">Data Fim:</label>
        <input type="date" id="to" name="to" required>
        <button type="submit">Gerar Relatório</button>
    </form>

    @if(isset($totalRevenue))
        <h2>Total de Receita: {{ $totalRevenue }}</h2>
    @endif
@endsection
