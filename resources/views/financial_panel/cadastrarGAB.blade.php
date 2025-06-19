@extends('layouts.financial')
@section('content')
<div class="dash_page">
    <h1 class="page_title"><i class="fa-solid fa-building-columns"></i> Registrar GAB</h1>

    <form class="page_form" method="post" action="{{route('cadastrar-gab', request('id'))}}" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div style="color: white; background-color: red; width: 100%; padding:20px;border-radius:10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('error'))
            <div style="color: white; background-color: red; width: 100%; padding:20px;border-radius:10px;">{{ session('error') }}</div>
        @endif
        
        <div class="input_box">
            <label>GAB:</label>
            <input type="file" accept=".pdf" class="page_input" name="pdf" placeholder="Selecione a PDF..." required>
        </div>

        

        <div class="input_box">
            <input type="submit" value="Registrar">
        </div>
    </form>
    <form method="post" action="{{route('negar-gab', request('id'))}}">
        @csrf
        <div class="input_box">
            <label>Mensagem:</label>
            <textarea name="message" class="page_input" placeholder="Descreva aqui o porque dessa decisão..."></textarea>
        </div>
        <div class="input_box">
            <input type="submit" style="background-color: red;" value="Negar gab">
        </div>
    </form>
</div>
@endsection
