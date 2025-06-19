<?php

namespace App\Http\Controllers;

use App\Models\Gab;
use App\Models\GabsRequest;
use App\Models\User;
use Illuminate\Http\Request;

class GabController extends Controller
{

    public function getGabs($id){
        $request = GabsRequest::where('id', $id)->first();
        $gabs = Gab::where('request_id', $id)->get();
        $patient = User::where('id', $request['patient_id'])->first();
        $clinics = User::where('role', 'clinic')->get()->keyBy('id');

        return view('financial_panel.gerenciarGABS', [
            'gabs' => $gabs,
            'request' => $request,
            'patient' => $patient,
            'clinics' => $clinics
        ]);
    }

    public function registerGabPage($id){
        $gab = Gab::where('id', $id)->first();
        return view('financial_panel.cadastrarGAB', [
            'gab'=>$gab
        ]);
    }

    public function registerGab(Request $request, $id){
        try {
            $data = $request->validate([
                'message'    => 'string',
                'pdf'        => 'required|mimes:pdf',
            ]);
    
            if ($request->hasFile('pdf')) {
                $pdfFile = $request->file('pdf');
                $pdfContent = file_get_contents($pdfFile);
                $status = "emitida";

                if(!$pdfContent || $pdfContent == ""){
                    $status = "pendente";
                }
    
                $gab = Gab::where('id', $id)->update([
                    'path'       => $pdfContent,
                    'status'     => 'emitida'
                ]);
    
                if ($gab) {
                    return redirect()->route('gerenciar-requisicao');
                }
            }
        } catch (\Illuminate\Database\QueryException $e) {
            // Exibe o erro SQL para debug
            dd($e->getMessage());
        }
    }

    public function negarGab(Request $request, $id){
        $data = $request->validate([
            'message'    => 'required|string',
        ]);

        $gab = Gab::where('id', $id)->update([
            'status'     => 'negada',
            'message' => $data['message']
        ]);

        if($gab){
            return redirect()->route('gerenciar-requisicao');
        }
    }

    public function download($id)
    {
        $gab = Gab::findOrFail($id);

        return response($gab->path)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="document.pdf"');
    }

}
