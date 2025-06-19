@extends('layouts.financial')
@section('content')
<style>
    /* Estilo para o preview */
    .search-results {
        border: 1px solid #ccc;
        margin-top: 5px;
        max-height: 200px;
        overflow-y: auto;
    }

    .search-results div {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        cursor: pointer;
    }

    .search-results div:hover {
        background-color: #f5f5f5;
    }
</style>
<div class="dash_page">
    <h1 class="page_title"><i class="fa-solid fa-building-columns"></i> Registrar Requisição de GABs</h1>

    <form class="page_form" method="POST" action="{{ route('registrar-multgabs-post') }}">
        @csrf

        @if ($errors->any())
        <div style="color: white; background-color: red; width: 100%; padding:20px; border-radius:10px;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('error'))
        <div style="color: white; background-color: red; width: 100%; padding:20px; border-radius:10px;">
            {{ session('error') }}
        </div>
        @endif

        @if (isset($quantidade) && $quantidade > 0)
            @for ($i = 0; $i < $quantidade; $i++)
            <div class="InputCollection" style="margin-bottom: 20px; border: 1px solid #ccc; padding: 10px;">
                <h3>GAB {{ $i + 1 }}</h3>

                <div class="input_box">
                    <label>Nome da GAB</label>
                    <input type="text" name="gabs[{{ $i }}][nome]" class="page_input" required>
                </div>

                <div class="input_box">
                    <label>Descrição</label>
                    <textarea name="gabs[{{ $i }}][descricao]" class="page_input" required></textarea>
                </div>

                <div class="input_box">
                    <label>Nome da Clínica</label>
                    <div>
                        <input type="text" id="search-clinic" name="gabs[{{ $i }}][clinic]" placeholder="Buscar por Nome ou CPF" class="page_input" onkeyup="searchClinic()" />
                        <div id="clinic-results" class="search-results"></div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="gabs[{{ $i }}][req_id]" value="{{$gabReqId}}">
            @endfor
        @else
        <p>Defina uma quantidade de GABs para exibir os campos.</p>
        @endif

        
        <div class="input_box">
            <input type="submit" value="Enviar GABs">
        </div>
    </form>
</div>

<script>
    const searchClinic = () => {
        const query = document.getElementById('search-clinic').value;
        let resultsContainer = document.getElementById('clinic-results');

        // Evitar buscas se o texto for muito curto
        if (query.length < 3) {
            resultsContainer.innerHTML = '';
            return;
        }

        // Envia a requisição para o servidor
        fetch(`/search-clinic?query=${encodeURIComponent(query)}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na resposta do servidor');
                }
                return response.json();
            })
            .then(users => {
                // Renderiza os resultados no HTML
                resultsContainer.innerHTML = users
                    .map(user => `<div onclick="fillClinicInput('${user.name}')">${user.name} - ${user.cpf_cnpj}</div>`)
                    .join('');
            })
            .catch(error => {
                console.error('Erro ao buscar usuários:', error);
                resultsContainer.innerHTML = `<div>Erro ao buscar usuários.</div>`;
            });
    };

    // Preenche o campo de pesquisa com o nome do usuário selecionado
    const fillClinicInput = (userName) => {
        document.getElementById('search-clinic').value = userName;

        // Limpa os resultados da busca
        document.getElementById('results').innerHTML = '';
    };

    const searchPatient = () => {
        const query = document.getElementById('search-patient').value;
        let resultsContainer = document.getElementById('patient-results');

        // Evitar buscas se o texto for muito curto
        if (query.length < 3) {
            resultsContainer.innerHTML = '';
            return;
        }

        // Envia a requisição para o servidor
        fetch(`/search-patient?query=${encodeURIComponent(query)}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na resposta do servidor');
                }
                return response.json();
            })
            .then(users => {
                // Renderiza os resultados no HTML
                resultsContainer.innerHTML = users
                    .map(user => `<div onclick="fillPatientInput('${user.name}')">${user.name} - ${user.cpf_cnpj}</div>`)
                    .join('');
            })
            .catch(error => {
                console.error('Erro ao buscar usuários:', error);
                resultsContainer.innerHTML = `<div>Erro ao buscar usuários.</div>`;
            });
    };

    // Preenche o campo de pesquisa com o nome do usuário selecionado
    const fillPatientInput = (userName) => {
        document.getElementById('search-patient').value = userName;

        // Limpa os resultados da busca
        document.getElementById('results').innerHTML = '';
    };
</script>
@endsection
