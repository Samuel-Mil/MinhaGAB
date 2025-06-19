<?php

namespace App\Http\Controllers;

use App\Models\Gab;
use App\Models\GabsRequest;
use App\Models\User;
use Illuminate\Http\Request;

class GabRequestController extends Controller
{
    public function renderPanel()
    {
        $requests = GabsRequest::orderBy("created_at", "desc")->get();
        $patients = User::where('role', 'patient')->get()->keyBy('id');
        $clinics = User::where('role', 'clinic')->get()->keyBy('id');

        return view('financial_panel.gerenciarRequisicoes', [
            'requests' => $requests,
            'patients' => $patients,
            'clinics' => $clinics
        ]);
    }

    public function registerReqPage()
    {
        $clinicsList = User::where('role', 'clinic')->get();
        $patientsLists = User::where('role', 'patient')->get();

        return view('financial_panel.registrarRequisicao', [
            'clinics'  => $clinicsList,
            'patients' => $patientsLists
        ]);
    }

    public function registerReq(Request $request)
    {
        $data = $request->validate([
            'patient'  => 'required|string',
            'description' => 'required|string',
            'gab_quant'   => 'required|numeric',
        ]);

        $patient = User::where("name", $data['patient'])->first();
        // $clinic = User::where("name", $data['clinic'])->first();

        $request = GabsRequest::create([
            'patient_id'  => $patient->id,
            'description' => $data['description'],
            'gab_quant'   => $data['gab_quant'],
        ]);

        if ($request) {
            return redirect()->route("registrar-multgabs", $request->id);
        }
    }

    public function patientSearcher(Request $request)
    {
        $name = $request['query'];

        // Busca o paciente pelo nome ou CPF
        $patient = User::where("name", 'LIKE', "%{$name}%")
            ->orWhere("cpf_cnpj", 'LIKE', "%{$name}%")
            ->first();

        // Verifica se um paciente foi encontrado
        if (!$patient) {
            return redirect()->back()->with('error', 'Paciente não encontrado.');
        }

        // Busca as requisições do paciente na clínica do usuário autenticado
        $requests = GabsRequest::where('patient_id', $patient->id)->get();

        // Busca todas as clínicas e pacientes
        $clinics = User::where("role", "clinic")->get()->keyBy('id');
        $patients = User::where("role", "patient")->get()->keyBy('id');

        return view('financial_panel.procurarRequisicoes', [
            'requests' => $requests,
            'clinics' => $clinics,
            'patients' => $patients,
        ]);
    }
}
