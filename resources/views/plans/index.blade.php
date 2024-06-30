@extends('layouts.app')

@section('content')
    <h1>Planos</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <a href="{{ route('plans.create') }}">Adicionar Plano</a>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plans as $plan)
                <tr>
                    <td>{{ $plan->name }}</td>
                    <td>{{ $plan->price }}</td>
                    <td>
                        <a href="{{ route('plans.edit', $plan) }}">Editar</a>
                        <form action="{{ route('plans.destroy', $plan) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
