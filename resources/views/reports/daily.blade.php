
@extends('layouts.app')

@section('content')
    <h1>Relatório Diário - {{ $date }}</h1>

    <h2>Total de Receita: R$ {{ number_format($totalRevenue, 2, ',', '.') }}</h2>
@endsection