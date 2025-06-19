@extends('layouts.financial')
@section('content')
<div class="dash_page">
    <h1 class="page_title"><i class="fa-solid fa-building-columns"></i> Editar Usuario</h1>

    <form class="page_form" method="post" action="{{route('edit-user', $user['id'])}}">
        @csrf
        @if ($errors->any())
        <div style="color: white;margin:10px 0; background-color: red; width: 100%; padding:10px;border-radius:10px;">
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
            <label for="">Nome:</label>
            <input type="text" name="name" class="page_input" value="{{$user['name']}}" placeholder="João Silva">
        </div>

        <div class="input_box">
            <label for="">Cnpj:</label>
            <input type="text" name="cpf_cnpj" class="page_input" value="{{$user['cpf_cnpj']}}" placeholder="00.000.000/0000-00">
        </div>

        <div class="input_box">
            <label for="">Email:</label>
            <input type="text" name="email" class="page_input" value="{{$user['email']}}" placeholder="joao.silva@gmail.com">
        </div>

        <div class="input_box">
            <label for="">Senha:</label>
            <input type="password" name="password" class="page_input" placeholder="******">
        </div>

        <div class="input_box">
            <label for="">Cargo:</label>
            <select name="role" class="page_input">
                @if($user['role'] == 'clinic')
                    <option value="clinic" selected>Clinica</option>
                    <option value="financial">Financeiro</option>
                    <option value="patient">Paciente</option>
                @elseif ($user['role'] == 'patient')
                    <option value="clinic">Clinica</option>
                    <option value="financial">Financeiro</option>
                    <option value="patient" selected>Paciente</option>
                @elseif ($user['role'] == 'financial')
                    <option value="clinic">Clinica</option>
                    <option value="financial" selected>Financeiro</option>
                    <option value="patient">Paciente</option>
                @endif
            </select>
        </div>

        <div class="input_box">
            <input type="submit" value="Atualizar">
        </div>
    </form>
</div>
@endsection