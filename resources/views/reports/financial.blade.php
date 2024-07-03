@extends('layouts.app')

@section('content')
    <h1>Relatório Financeiro</h1>

    @if (isset($revenue))
        <h2>Total de Receita: R$ {{ number_format($revenue, 2, ',', '.') }}</h2>
    @else
        <p>Nenhum dado de receita disponível.</p>
    @endif
@endsection

