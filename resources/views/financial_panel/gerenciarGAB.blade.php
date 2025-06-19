@extends('layouts.financial')
@section('content')
<div class="dash_page">
    <h1 class="page_title"><i class="fa-solid fa-piggy-bank"></i> Gerenciar GABs</h1>

    <table class="dash_table">
        <thead class="dash_table_header">
            <tr class="">
                <th>Status</th>
                <th>Expira em</th>
                <th>Paciente</th>
                <th>Clínica</th>
                <th>Deletar/Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gabs as $gab)                
            <tr class="dash_table_column">
                <td class="tipo_entrada">{{strtoupper($gab['status'])}}</td>
                <td>24h</td>
                <td>{{$patient[($gab['patient_id'])-1]['name']}}</td>
                <td>{{$patient[$gab['clinic_id']]['name']}}</td>
                <td><a href="#">Gerenciar</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
