@extends('layouts.financial')
@section('content')
<div class="dash_page">
    <h1 class="page_title"><i class="fa-solid fa-piggy-bank"></i> Gerenciar Gabs da Requisição</h1>
    <h2>Descrição</h2>
    <p style="margin: 10px 0;">{{$request['description']}}</p>
    <table class="dash_table">
        <thead class="dash_table_header">
            <tr class="">
                <th>ID</th>
                <th>Status</th>
                <th>Nome</th>
                <th>Paciente</th>
                <th>Clinica</th>
                <th>Gerenciar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gabs as $gab)                
            <tr class="dash_table_column">
                <td>{{$gab['id']}}</td>
                @if ($gab['status'] == 'pendente')
                    <td class="tipo_alerta">{{strtoupper($gab['status'])}}</td>
                @elseif ($gab['status'] == 'emitida')
                    <td class="tipo_entrada">{{strtoupper($gab['status'])}}</td>
                @elseif ($gab['status'] == 'negada')
                    <td class="tipo_saida">{{strtoupper($gab['status'])}}</td>
                @endif
                <td>{{$gab['name']}}</td>
                
                <td>{{$patient['name']}}</td>
                <td>{{ $clinics[$gab['clinic_id']]->name ?? 'Clínica Indefinida' }}</td>
                <td><a href="{{route('registrar-gab',$gab['id'])}}">Gerenciar</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
