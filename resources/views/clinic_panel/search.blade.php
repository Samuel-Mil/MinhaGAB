<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{getenv('APP_URL')}}/csss/financial.css">
    <script defer src="https://kit.fontawesome.com/708b4765cf.js" crossorigin="anonymous"></script>
    <title>Painel do paciente</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            overflow: auto;
        }
    </style>
</head>
<body>
    <header class="main_header" style="width: 100%;">
        <h1>Painel da Clínica</h1>
        <div class="buttons_box">
            <a href="{{route('logout')}}"><i class="fa-solid fa-right-from-bracket" title="logout"></i></a>
        </div>

    </header>

    <section class="gabs">
    <br>
        <br>
        <br>
        <h1 class="page_title" style="color: #444;margin:15px 0;padding: 10px;">GABs da Clńica: {{auth()->user()->name}}</h1>
        <form method="GET" class="search-box" action="{{route('clinic-search-page')}}">
            <input type="text" name="query" placeholder="Digite o nome ou cpf do paciente" required>
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            <a class="voltar-btn" href="{{route('clinic-page')}}">Voltar</a>
        </form>
        <table class="dash_table">
        <thead class="dash_table_header">
            <tr class="">
                <th>ID</th>
                <th>Data Emissão</th>
                <th>Status</th>
                <th>Paciente</th>
                <th>Mensagem</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($requests as $req)
        @if (isset($gabs[$req->id])) <!-- Verifica se há gabs para o request atual -->
            @foreach ($gabs[$req->id] as $gab) <!-- Itera sobre os gabs relacionados -->
                <tr class="dash_table_column">
                    <td>{{ $gab['id'] }}</td>
                    <td>{{ $gab['updated_at']->format("d/m/Y") }}</td>
                    @if ($gab['status'] == 'pendente')
                        <td class="tipo_alerta">{{ strtoupper($gab->status) }}</td>
                    @elseif ($gab['status'] == 'emitida')
                        <td class="tipo_entrada">{{ strtoupper($gab->status) }}</td>
                    @elseif ($gab['status'] == 'negada')
                        <td class="tipo_saida">{{ strtoupper($gab->status) }}</td>
                    @endif
                    <!-- Obtendo o nome da clínica usando o clinic_id do request atual -->
                    <td>{{ $clinics[$req->patient_id]->name ?? 'Paciente Indefinida' }}</td>
                    @if ($gab['status'] == 'negada')
                        <td>{{ $gab['message'] }}</td>
                    @else
                        <td>----------</td>
                    @endif
                    @if ($gab['status'] == 'emitida')
                        <td><a href="{{ route('download', $gab->id) }}">Download</a></td> 
                    @else
                        <td><p style="cursor: not-allowed;">Indisponivel</p></td>     
                    @endif
                </tr>
            @endforeach
        @endif
    @endforeach
</tbody>
    </table>
    </section>
</body>
</html>