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
            <h1><i class="fa-solid fa-folder"></i> MinhaGAB</h1>
        </header>
        <main class="sidebar_blocks">
            <ul>
                <li data-id="{{ route('financial') }}">
                    <a href="{{ route('financial') }}">
                        <i class="fa-solid fa-house" title="home"></i> Home
                    </a>
                </li>
                <li data-id="{{ route('registrar-requisicao') }}">
                    <a href="{{ route('registrar-requisicao') }}">
                        <i class="fa-solid fa-file-circle-plus"></i> Cadastrar Requesição
                    </a>
                </li>
                <li data-id="{{ route('gerenciar-requisicao') }}">
                    <a href="{{ route('gerenciar-requisicao') }}">
                        <i class="fa-solid fa-file-circle-check"></i> Gerenciar Requisições e GABs
                    </a>
                </li>
                <li data-id="{{ route('registrar-clinica') }}">
                    <a href="{{ route('registrar-clinica') }}">
                        <i class="fa-solid fa-user-plus"></i> Registrar Usuário
                    </a>
                </li>
                <li data-id="{{ route('gerenciar-clinica') }}">
                    <a href="{{ route('gerenciar-clinica') }}">
                        <i class="fa-solid fa-users-gear"></i> Gerenciar Usuários
                    </a>
                </li>
                <li data-id="{{ route('comentarios') }}">
                    <a href="{{ route('comentarios') }}">
                        <i class="fa-solid fa-comments"></i> Responder Comentários
                    </a>
                </li>
            </ul>
        </main>
        <div class="sidebar_footer">
            <p title="EM BREVE"><a href="#">Suporte MinhaGAB</a></p>
        </div>
    </aside>


    <header class="main_header">
        <h1> Painel do financeiro</h1>
        <div class="buttons_box">
            <a href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket" title="logout"></i></a>
        </div>
    </header>

    <section class="page_box">
        @yield('content')
    </section>

    <div class="clear"></div>

    <script defer>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebarItems = document.querySelectorAll('.sidebar ul li');

            // Recupera o link ativo do localStorage
            const activeLink = localStorage.getItem('activeSidebarItem');
            if (activeLink) {
                const savedItem = document.querySelector(`.sidebar ul li[data-id="${activeLink}"]`);
                if (savedItem) {
                    savedItem.querySelector("a").style.color = '#1955b2'
                    savedItem.style.backgroundColor = '#fff';
                    savedItem.style.color = '#1955b2';
                }
            }

            sidebarItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove o estilo dos itens ativos anteriormente
                    sidebarItems.forEach(el => {
                        el.style.backgroundColor = '#1955b2';
                        el.style.color = '#fff';
                    });

                    // Adiciona o estilo ao item clicado
                    this.style.backgroundColor = '#fff';
                    this.style.color = '#1955b2';

                    // Salva o item ativo no localStorage
                    const link = this.querySelector('a').getAttribute('href');
                    localStorage.setItem('activeSidebarItem', link);
                });
            });
        });
    </script>
</body>

</html>