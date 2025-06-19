@extends('layouts.financial')
@section('content')
<div class="dash_page">
    <h1 class="page_title"><i class="fa-solid fa-piggy-bank"></i> Gerenciar usuarios</h1>

    <table class="dash_table">
        <thead>
            <tr class="dash_table_header">
                <th>ID</th>
                <th>Cargo</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Deletar/Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clinics as $clinic)
            <tr class="dash_table_column">
                <td>{{$clinic['id']}}</td>
                @if($clinic['role'] == "financial")
                    <td>FINANCEIRO</td>
                @elseif ($clinic['role'] == "clinic")
                    <td>CLINICA</td>
                @elseif ($clinic['role'] == "patient")
                    <td>PACIENTE</td>
                @endif
                <td>{{$clinic['name']}}</td>
                <td>{{$clinic['cpf_cnpj']}}</td>
                <td><a href="{{route('edit-user-page', $clinic['id'])}}">Gerenciar</a></td>
            </tr>
            @endforeach
        </tbody>
</div>
@endsection
