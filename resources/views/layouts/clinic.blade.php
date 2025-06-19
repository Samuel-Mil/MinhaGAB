<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{getenv('APP_URL')}}/csss/financial.css">
    <script defer src="https://kit.fontawesome.com/708b4765cf.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
</head>
<body>
    <aside class="sidebar">
        <header class="user_box">
           <h1>MinhaGAB</h1>
        </header>
        <main class="sidebar_blocks">
            <ul>
                <h3><i class="fa-solid fa-building-columns"></i> GAB's</h3>
                <li><a href="{{route('gerenciar-requisicao')}}">Gerenciar Requisições</a></li>
            </ul>
        </main>
    </aside>
    <header class="main_header">
        <h1>Painel da Clínica</h1>
        <div class="buttons_box">
            <a href="{{route('financial')}}"><i class="fa-solid fa-house" title="home"></i></a>
            <a href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket" title="logout"></i></a>
        </div>
    </header>

    <section class="page_box">
        @yield('content')
    </section>

    <div class="clear"></div>
</body>
</html>
