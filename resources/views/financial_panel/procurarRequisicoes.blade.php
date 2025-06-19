@extends('layouts.financial')
@section('content')
<div class="dash_page">
    <h1 class="page_title"><i class="fa-solid fa-piggy-bank"></i> Gerenciar Requisições</h1>
    <form method="GET" class="search-box" action="{{route('procurar-paciente')}}">
            <input type="text" name="query" placeholder="Digite o nome ou cpf do paciente" required>
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            <a class="voltar-btn" href="{{route('gerenciar-requisicao')}}">Voltar</a>
        </form>
    <table class="dash_table">
        <thead class="dash_table_header">
            <tr class="dash_table_column">
                <th>ID</th>
                <th>Data Emissão</th>
                <th>Quantidade de GABs</th>
                <th>Paciente</th>
                <th>Clinica</th>
                <th>Deletar/Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr class="dash_table_column">
                    <td>{{ $request['id'] }}</td>
                    <td>{{ $request['created_at']->format("d/m/Y") }}</td>
                    <td>{{ $request['gab_quant'] }}</td>

                    <!-- Verifica se existe a clínica com o clinic_id associado -->
                    <td>{{ $patients[$request['patient_id']]->name ?? 'Paciente Indefinido' }}</td>
                    <td>{{ $clinics[$request['clinic_id']]->name ?? 'Clínica Indefinida' }}</td>

                    <td><a href="{{ route('gerenciar-unica-req', $request['id']) }}">Gerenciar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
