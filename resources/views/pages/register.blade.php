@extends('layouts.auth')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Login - MinhaGAB</title>
</head>
<?php
      #Sei q isso é uma gambiarra da porra, mas q se foda to com sono e preguiça agora
      $image = getenv('APP_URL')."/assetss/fundo.png";
?>
<body style="background-image: url({{$image}});">
    <header>
        <div class="top">
            <div class="top-logo">
            <img src="{{getenv('APP_URL')}}/assetss/fab-logo.png" width="100px">
            <h1>FORÇA AÉREA BRASILEIRA</h1>
            <img src="{{getenv('APP_URL')}}/assetss/fab-logo.png" width="100px">
            </div>
            <h2>MinhaGAB</h2>
        </div>
    </header>
    <div class="login-container">
        <h1>REGISTRAR PACIENTE</h1>
        <form method="POST" action="{{route('register')}}">
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
            <div class="input-group">
                <img src="{{getenv('APP_URL')}}/assetss/HFAB.png" width="30px">
                <div class="input-wrapper">
                    <i class="fas fa-user icon"></i> 
                    <input type="text" id="name" name="name" placeholder="Digite seu nome" required>
                </div>
                <img src="{{getenv('APP_URL')}}/assetss/CINDACTA.png" width="30px">
            </div>
            <div class="input-group">
                <img src="{{getenv('APP_URL')}}/assetss/HFAB.png" width="30px">
                <div class="input-wrapper">
                <i class="fa-solid fa-id-card icon"></i>
                    <input type="text" id="cpf" name="cpf_cnpj" placeholder="Digite seu CPF" required>
                </div>
                <img src="{{getenv('APP_URL')}}/assetss/CINDACTA.png" width="30px">
            </div>
            <div class="input-group">
                <img src="{{getenv('APP_URL')}}/assetss/HFAB.png" width="30px">
                <div class="input-wrapper">
                     <i class="fa-solid fa-envelope icon"></i>
                    <input type="text" id="cpf" name="email" placeholder="Digite seu email" required>
                </div>
                <img src="{{getenv('APP_URL')}}/assetss/CINDACTA.png" width="30px">
            </div>
            <div class="input-group">
                <img src="{{getenv('APP_URL')}}/assetss/HFAB.png" width="30px">
                <div class="input-wrapper">
                    <i class="fas fa-key icon"></i>
                    <input type="password" id="codigo" name="password" placeholder="Digite seu código de acesso" required>
                </div>
                <img src="{{getenv('APP_URL')}}/assetss/CINDACTA.png" width="30px">
            </div>
            
            <button type="submit" class="btn-login">Entrar</button>
            <div class="forgot-link">
                <a href="{{route('login-page')}}">Tenho uma conta/Entre aqui</a>
            </div>
        </form>
    </div>
    
</body>
</html>
@endsection
