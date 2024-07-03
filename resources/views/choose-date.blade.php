<!-- resources/views/choose-date.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Escolha uma Data</h1>

    <form id="dateForm" action="{{ route('redirect-to-report') }}" method="POST">
        @csrf <!-- Adicionar o token CSRF por segurança -->
        <label for="selectedDate">Selecione uma data:</label>
        <input type="date" id="selectedDate" name="selectedDate" required>
        <button type="submit">Selecionar Data</button>
    </form>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Adicionar um listener para enviar o formulário quando a data for selecionada
            document.getElementById('selectedDate').addEventListener('change', function() {
                document.getElementById('dateForm').submit();
            });
        });
    </script>
@endpush
