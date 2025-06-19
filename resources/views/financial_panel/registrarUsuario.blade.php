@extends('layouts.financial')
@section('content')
<div class="dash_page">
    <h1 class="page_title"><i class="fa-solid fa-building-columns"></i> Registrar Usuario</h1>

    <form class="page_form" method="post" action="{{route('cadastrar-clinica')}}">
        @csrf
        <div class="input_box">
            <label for="">Nome:</label>
            <input type="text" name="name" class="page_input" placeholder="João Silva" required>
        </div>

        <div class="input_box">
            <label for="">Cnpj:</label>
            <input type="text" name="cpf_cnpj" class="page_input" placeholder="00.000.000/0000-00" required>
        </div>

        <div class="input_box">
            <label for="">Email:</label>
            <input type="text" name="email" class="page_input" placeholder="joao.silva@gmail.com" required>
        </div>

        <div class="input_box">
            <label for="">Senha:</label>
            <input type="password" name="password" class="page_input" placeholder="******" required>
        </div>

        <div class="input_box">
            <label for="">Cargo:</label>
            <select name="role" class="page_input">
                <option value="clinic">Clinica</option>
                <option value="financial">Financeiro</option>
                <option value="patient">Paciente</option>
            </select>
        </div>

        <div class="input_box">
            <input type="submit" value="Registrar">
        </div>
    </form>
</div>
@endsection
