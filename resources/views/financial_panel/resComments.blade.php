@extends('layouts.financial')
@section('content')
<div class="dash_page">
    <h1 class="page_title"><i class="fa-solid fa-piggy-bank"></i> Gerenciar GABs</h1>

    <table class="dash_table">
        <thead>
            <tr class="dash_table_header">
                <th>Respondido</th>
                <th>Data Registro</th>
                <th>Paciente ID</th>
                <th>Comentário</th>
                <th>Responder</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr class="dash_table_column">
                    <td>
                        @if ($comment['status'] == 'aguardando')
                            <span class="tipo_saida">Não</span>
                        @else
                            <span class="tipo_entrada">Sim</span>
                        @endif
                    </td>
                    <td>{{$comment['created_at']->format('d/m/Y')}}</td>
                    <td>{{$patients[$comment->patient_id]->name}}</td>
                    <td>{{$comment['comment']}}</td>
                    <td><a href="{{route('responder', $comment['id'])}}">Responder</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
