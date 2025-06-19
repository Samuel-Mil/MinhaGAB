@extends('layouts.financial')
@section('content')
<div class="dash_page">
    <h1 class="page_title"><i class="fa-solid fa-building-columns"></i> Registrar Clinica</h1>

    <form class="page_form" method="post" action="{{route('responderr', $id)}}">
        @csrf

        <h2>Comentario:</h2>
        <p>{{$comment['comment']}}</p>

        <div class="input_box">
            <label for="">Resposta:</label>
            <input type="text" name="answer" class="page_input" placeholder="Sua resposta" required>
        </div>

        <div class="input_box">
            <input type="submit" value="Registrar">
        </div>
    </form>
</div>
@endsection
