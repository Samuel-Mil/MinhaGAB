<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function registerPage()
    {
        return view('pages.register');
    }

    public function loginPage(){
        return view('pages.login');
    }

    public function register(Request $request, string|null $role = "patient")
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'cpf_cnpj' => 'required|string',
            'password' => 'required|string',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['name'].'155151515',
            'cpf_cnpj' => $data['cpf_cnpj'],
            'password' => bcrypt($data['password']),
            'role' => $role,
        ]);

        return redirect()->back();
    }

    public function login(Request $request){
        $data = $request->validate([
            'cpf_cnpj' => 'required|string',
            'password' => 'required|string',
            'role' => 'required'
        ]);

        $user = User::where('cpf_cnpj', $data['cpf_cnpj'])->first();
        if(!$user || !Hash::check($data['password'], $user['password'])){
            return redirect()->back()->with('error','CPF ou senha inválidos');
        }

        if($data['role'] == 'financial'){
            Auth::login($user);
            return redirect()->route('financial');
        }else if($data['role'] == 'patient'){
            Auth::login($user);
            return redirect()->route('patient-page');
        }else if($data['role'] == 'clinic'){
            Auth::login($user);
            return redirect()->route('clinic-page');
        }else{
            return response()->redirectTo('/');
        }
    }

    public function logout(){
        Session::flush();

        Auth::logout();

        return redirect()->route('login-page');
    }

    public function editUserPage($id){
        $user = User::where("id", $id)->first();
        return view("financial_panel.editarUsuario", ["user"=> $user]);
    }

    public function editUser(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'cpf_cnpj' => 'required|string|max:20',
            'password' => 'nullable|string',
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->cpf_cnpj = $data['cpf_cnpj'];

        if (!empty($data['password'])) {
            $user->password = bcrypt($data['password']);
        }

        $user->save();

        return redirect()->route('gerenciar-clinica')->with('success', 'Usuário atualizado com sucesso.');
    }
}
