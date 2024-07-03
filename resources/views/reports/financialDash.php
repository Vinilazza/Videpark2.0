<!-- resources/views/financialDash.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Financial Dashboard</h1>

    <!-- Incluir o calendário FullCalendar e scripts necessários -->
    <div id="calendar"></div>

    <!-- Exibição dos dados do relatório -->
    <h2>Relatório Financeiro para {{ $selectedDate }}</h2>
    <h3>Total de Receita: R$ {{ number_format($totalRevenue, 2, ',', '.') }}</h3>
@endsection

@section('scripts')
    <script src="{{ asset('js/calendar.js') }}"></script>
@endsection
