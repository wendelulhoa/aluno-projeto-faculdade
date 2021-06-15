<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turma extends Model
{
    use HasFactory;
    public $fillable = ['cod_aluno', 'cod_professor', 'cod_disciplina', 'carga_horaria'];
    public $table    = 'turma';
}
