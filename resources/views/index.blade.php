<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{getenv('APP_URL')}}/csss/indexPage.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MinhaGAB</title>
</head>
<body>
    <header>
        <div class="container">
            <h1>MinhaGAB</h1>

            <nav>
                <ul>
                    <li><a href="{{route('login-page')}}">Login</a></li>
                    <li><a href="{{route('register-page')}}">Registrar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <?php
        #Sei q isso é uma gambiarra da porra, mas q se foda to com sono e preguiça agora
        $image = getenv('APP_URL')."/assetss/fundo.png";
        # {{getenv('APP_URL')}}/assetss/login_page.svg'");
    ?>

    <section class="cta" style="background-image: url('{{$image}}')">
        <div class="overflow">
            <h1>MinhaGAB</h1>
            <!--<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae tempora natus dicta error accusantium facilis dolor harum consectetur illo.
               Expedita delectus quibusdam quaerat aspernatur, ea at excepturi praesentium illo deserunt!
               Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae tempora natus dicta error accusantium facilis dolor harum consectetur illo.
               Expedita delectus quibusdam quaerat aspernatur, ea at excepturi praesentium illo deserunt!</p>-->
               <p>MinhaGAB é um sistema moderno e eficiente para o gerenciamento de documentos chamados GABs. A plataforma oferece uma solução completa para o controle e organização de GABs, usuários, permissões e demais funcionalidades relacionadas, otimizando os processos e garantindo segurança e praticidade na gestão da informação.</p>
        </div>
    </section>
</body>
</html>
