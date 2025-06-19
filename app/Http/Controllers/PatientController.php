<?php

namespace App\Http\Controllers;

use App\Models\Gab;
use App\Models\GabsRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function patientPage(){
        $requests = GabsRequest::where('patient_id', auth()->user()->id)->get();
        $gabs = Gab::all()->groupBy('request_id');
        $clinics = User::all()->keyBy('id');
    
        return view('patient_panel.index', [
            'gabs' => $gabs,
            'clinics' => $clinics,
            'requests' => $requests
        ]);
    }
}
