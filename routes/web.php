<?php

use App\Http\Controllers\ClinicController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\GabController;
use App\Http\Controllers\GabRequestController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Main
Route::get('/', function(){
    return view("index");
});

// Authentication
Route::get('/register', [UserController::class, 'registerPage'])->name('register-page');
Route::post('/register-user', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'loginPage'])->name('login-page');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/do-login', [UserController::class, 'login'])->name('login');


// Financial Panel
Route::get('/financial', [FinancialController::class, "index"])->name('financial');

Route::get('/registrar-clinica', [FinancialController::class, "reg_clin_page"])->name("registrar-clinica");
Route::post('/casdastrar-clinica', [FinancialController::class, "registerClinic"])->name("cadastrar-clinica");
Route::get('/gerenciar-clinica', [FinancialController::class, 'gerenciarClinicaPage'])->name("gerenciar-clinica");
Route::get("/edit-user/{id}", [UserController::class, "editUserPage"])->name("edit-user-page");
Route::post("/edit-user/{id}", [UserController::class, "editUser"])->name("edit-user");
Route::get("/registrar-mult-gabs/{id}", [FinancialController::class, "registrarMultipasGabsPage"])->name("registrar-multgabs");
Route::post("/registrar-mult-gabs", [FinancialController::class, "registrarMultiplasGabs"])->name("registrar-multgabs-post");

// Gabs Requests
Route::get('/registrar-requisicao', [GabRequestController::class, 'registerReqPage'])->name("registrar-requisicao");
Route::post('/registrar-requisicao', [GabRequestController::class, 'registerReq'])->name("cadastrar-requisicao");

Route::get('/gerenciar-requisicao', [GabRequestController::class, 'renderPanel'])->name("gerenciar-requisicao");
Route::get('/gerenciar-requisicao/search', [GabRequestController::class, 'patientSearcher'])->name("procurar-paciente");
Route::get('/gerenciar-requisicao/{id}', [GabController::class, 'getGabs'])->name("gerenciar-unica-req");

// Gabs
Route::get('/registrar-gab/{id}', [GabController::class, 'registerGabPage'])->name("registrar-gab");
Route::post('/negar-gab/{id}', [GabController::class, 'negarGab'])->name("negar-gab");
Route::post('/registrar-gab/{id}', [GabController::class, 'registerGab'])->name("cadastrar-gab");

// Comments
Route::get("/comments", [CommentController::class, 'res_com_page'])->name("comentarios");
Route::get("/res-comment/{id}", [CommentController::class, 'res_com'])->name("responder");
Route::post("/registar-resposta/{id}", [CommentController::class, 'responder'])->name("responderr");
Route::post('/comment', [CommentController::class, 'comment'])->name("comment");

// Patient
Route::get('/patient', [PatientController::class, 'patientPage'])->name("patient-page");
Route::get('/download_pdf/{id}', [GabController::class, 'download'])->name("download");

// Clinica
Route::get('/clinic', [ClinicController::class, 'clinicPage'])->name("clinic-page");
Route::get('/clinic/search', [ClinicController::class, 'clinicPageSearcher'])->name("clinic-search-page");

Route::get('/search-clinic', [FinancialController::class, 'searchClinic']);
Route::get('/search-patient', [FinancialController::class, 'searchPatient']);
