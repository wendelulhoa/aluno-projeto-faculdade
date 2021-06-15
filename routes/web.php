<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TurmaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('template.index');
})->name('index');

/*Rotas de aluno.*/
Route::group(['prefix'=> 'aluno'],function(){
    /*rota de listar*/
    Route::get('', [AlunoController::class, 'index'])->name('aluno-index');
    
    /*rotas para editar e criar*/
    Route::get('struture/edit/{id}', [AlunoController::class, 'editStruture'])->name('aluno-edit-view');
    Route::get('struture/create', [AlunoController::class, 'createStruture'])->name('aluno-create-view');
    
    /*rotas para criar, atualizar e deletar*/
    Route::post('/create', [AlunoController::class, 'create'])->name('aluno-create');
    Route::delete('/delete/{id}', [AlunoController::class, 'delete'])->name('aluno-delete');
    Route::post('/update/{id}', [AlunoController::class, 'update'])->name('aluno-update');
});

/*Rotas de professor.*/
Route::group(['prefix'=> 'professor'],function(){
    /*rota de listar*/
    Route::get('', [ProfessorController::class, 'index'])->name('professor-index');
    
    /*rotas para editar e criar*/
    Route::get('struture/edit/{id}', [ProfessorController::class, 'editStruture'])->name('professor-edit-view');
    Route::get('struture/create', [ProfessorController::class, 'createStruture'])->name('professor-create-view');
    
    /*rotas para criar, atualizar e deletar*/
    Route::post('/create', [ProfessorController::class, 'create'])->name('professor-create');
    Route::delete('/delete/{id}', [ProfessorController::class, 'delete'])->name('professor-delete');
    Route::post('/update/{id}', [ProfessorController::class, 'update'])->name('professor-update');
});

/*Rotas de turma.*/
Route::group(['prefix'=> 'turma'],function(){
    /*rota de listar*/
    Route::get('', [TurmaController::class, 'index'])->name('turma-index');
    
    /*rotas para editar e criar*/
    Route::get('struture/edit/{id}', [TurmaController::class, 'editStruture'])->name('turma-edit-view');
    Route::get('struture/create', [TurmaController::class, 'createStruture'])->name('turma-create-view');
    
    /*rotas para criar, atualizar e deletar*/
    Route::post('/create', [TurmaController::class, 'create'])->name('turma-create');
    Route::delete('/delete/{id}', [TurmaController::class, 'delete'])->name('turma-delete');
    Route::post('/update/{id}', [TurmaController::class, 'update'])->name('turma-update');
});

/*Rotas de disciplina.*/
Route::group(['prefix'=> 'disciplina'],function(){
    /*rota de listar*/
    Route::get('', [DisciplinaController::class, 'index'])->name('disciplina-index');
    
    /*rotas para editar e criar*/
    Route::get('struture/edit/{id}', [DisciplinaController::class, 'editStruture'])->name('disciplina-edit-view');
    Route::get('struture/create', [DisciplinaController::class, 'createStruture'])->name('disciplina-create-view');
    
    /*rotas para criar, atualizar e deletar*/
    Route::post('/create', [DisciplinaController::class, 'create'])->name('disciplina-create');
    Route::delete('/delete/{id}', [DisciplinaController::class, 'delete'])->name('disciplina-delete');
    Route::post('/update/{id}', [DisciplinaController::class, 'update'])->name('disciplina-update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// rota que acessa as fotos salvas
Route::get('/images/user/photo/{args}', function ($args)
{
    $file = Storage::disk('local')->get("/user/photo/$args");
    if(strpos($args, 'jpeg')){
        return response()->make($file,200,[ 'Content-Type' => 'image/jpeg']);
    }else {
        return response()->make($file,200,[ 'Content-Type' => 'image/png']);
    }
    
});