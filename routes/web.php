<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TurmaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
});

/*Rotas de aluno.*/
Route::group(['prefix'=> 'aluno'],function(){
    /*rota de listar*/
    Route::get('', [AlunoController::class, 'index'])->name('aluno-index');
    
    /*rotas para editar e criar*/
    Route::get('struture/edit/{id}', [AlunoController::class, 'editStruture'])->name('');
    Route::get('struture/create', [AlunoController::class, 'createStruture'])->name('aluno-create-view');
    
    /*rotas para criar, atualizar e deletar*/
    Route::post('/create', [AlunoController::class, 'create'])->name('aluno-create');
    Route::delete('/delete/{id}', [AlunoController::class, 'delete'])->name('aluno-delete');
    Route::put('/update/{id}', [AlunoController::class, 'update'])->name('aluno-update');
});

/*Rotas de professor.*/
Route::group(['prefix'=> 'professor'],function(){
    /*rota de listar*/
    Route::get('', [ProfessorController::class, 'index']);
    
    /*rotas para editar e criar*/
    Route::get('struture/edit/{id}', [ProfessorController::class, 'editStruture']);
    Route::get('struture/create', [ProfessorController::class, 'createStruture']);
    
    /*rotas para criar, atualizar e deletar*/
    Route::post('/create', [ProfessorController::class, 'create']);
    Route::delete('/delete/{id}', [ProfessorController::class, 'delete']);
    Route::put('/update/{id}', [ProfessorController::class, 'update']);
});

/*Rotas de turma.*/
Route::group(['prefix'=> 'turma'],function(){
    /*rota de listar*/
    Route::get('', [TurmaController::class, 'index']);
    
    /*rotas para editar e criar*/
    Route::get('struture/edit/{id}', [TurmaController::class, 'editStruture']);
    Route::get('struture/create', [TurmaController::class, 'createStruture']);
    
    /*rotas para criar, atualizar e deletar*/
    Route::post('/create', [TurmaController::class, 'create']);
    Route::delete('/delete/{id}', [TurmaController::class, 'delete']);
    Route::put('/update/{id}', [TurmaController::class, 'update']);
});

/*Rotas de disciplina.*/
Route::group(['prefix'=> 'disciplina'],function(){
    /*rota de listar*/
    Route::get('', [DisciplinaController::class, 'index']);
    
    /*rotas para editar e criar*/
    Route::get('struture/edit/{id}', [DisciplinaController::class, 'editStruture']);
    Route::get('struture/create', [DisciplinaController::class, 'createStruture']);
    
    /*rotas para criar, atualizar e deletar*/
    Route::post('/create', [DisciplinaController::class, 'create']);
    Route::delete('/delete/{id}', [DisciplinaController::class, 'delete']);
    Route::put('/update/{id}', [DisciplinaController::class, 'update']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
