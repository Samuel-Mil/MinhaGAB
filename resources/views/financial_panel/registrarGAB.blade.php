@extends('layouts.financial')
@section('content')
<div class="dash_page">
    <h1 class="page_title"><i class="fa-solid fa-building-columns"></i> Registrar GAB - Clinica</h1>

    <form class="page_form" method="post" action="{{route('cadastrar-gab')}}" enctype="multipart/form-data">
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
            <label for="">Selecionar clínica:</label>
            <select name="clinic_id" class="page_input" required>
                <option value="0">selecione</option>
                @foreach ($clinics as $clinic)
                    <option value="{{$clinic['id']}}">{{$clinic['name']}}</option>
                @endforeach
            </select>
        </div>

        <div class="input_box">
            <label for="">Selecionar paciente:</label>
            <select name="patient_id" class="page_input" required>
                <option value="0">selecione</option>
                @foreach ($patients as $patient)
                    <option value="{{$patient['id']}}">{{$patient['name']}}</option>
                @endforeach
            </select>
        </div>

        <div class="input_box">
            <label>GAB:</label>
            <input type="file" accept=".pdf" class="page_input" name="pdf" placeholder="Selecione a PDF..." required>
        </div>

        <div class="input_box">
            <input type="submit" value="Registrar">
        </div>
    </form>
</div>
@endsection
