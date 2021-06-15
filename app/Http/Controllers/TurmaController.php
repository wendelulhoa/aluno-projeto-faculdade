<?php

namespace App\Http\Controllers;

use App\Models\aluno;
use App\Models\disciplina;
use App\Models\professor;
use App\Models\turma;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    public function index(){
        try{
            $turmas = turma::join('aluno', 'turma.cod_aluno', 'aluno.id')
            ->join('professor', 'turma.cod_professor', 'professor.id')
            ->join('disciplina', 'turma.cod_disciplina', 'disciplina.id')
            ->select('aluno.name as nome_aluno', 'professor.name as nome_prof', 'turma.carga_horaria', 
                     'turma.created_at', 'turma.id', 'disciplina.name as nome_disciplina')
            ->orderBy('aluno.id')->paginate();
            return view('turma.index',['turmas'=> $turmas, 'type'=>'turma']);
        }catch(Exception $e){
            return response(['error'=>$e], 400);
        }
    }

    public function editStruture($id){
        try{
            $turma       = turma::where(['id'=> $id])->get() ?? [];
            $alunos      = aluno::all() ?? [];
            $disciplinas = disciplina::all() ?? [];
            $professores = professor::all() ?? [];
            $route       = Route('turma-update', ['id'=>$id]);
            
            return view('turma.create', ['alunos'=> $alunos, 'disciplinas'=>$disciplinas, 'professores'=>$professores, 'turma'=> $turma, 'id'=> $id, 'route'=>$route]);
        }catch(Exception $e){
            return response(['error'=>$e], 400);
        }
    }

    public function createStruture(){
        try{
            $alunos      = aluno::all();
            $disciplinas = disciplina::all();
            $professores = professor::all() ?? [];
            $route       = Route('disciplina-create');
            
            return view('turma.create', ['alunos'=> $alunos, 'disciplinas'=>$disciplinas, 'professores'=>$professores, 'route'=>$route]);
        }catch(Exception $e){
            return response(['error'=>$e], 400);
        }
    }

    public function create(Request $request){
        try{
            DB::beginTransaction();
                turma::create([
                    'cod_aluno'     =>$request['aluno'], 
                    'cod_professor' =>$request['professor'], 
                    'carga_horaria' =>$request['carga'],
                    'cod_disciplina'=>$request['disciplina']
                ]);
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            dd($e);
            return response(['error'=>$e], 400);
        }
    }
    
    public function update($id, Request $request){
        try{
            DB::beginTransaction();
                turma::where(['id'=> $id])->update([
                    'cod_aluno'     =>$request['aluno'], 
                    'cod_professor' =>$request['professor'], 
                    'carga_horaria' =>$request['carga'],
                    'cod_disciplina'=>$request['disciplina']
                ]);
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            return response(['error'=>$e], 400);
        }
    }
    

    public function delete($id){
        try{
            DB::beginTransaction();
                if(Auth::check()){
                    turma::where(['id'=> $id])->delete();
                }
            DB::commit();
            return response('sucesso', 200);
        }catch(Exception $e){
            DB::rollBack();
            return response(['error'=>$e], 400);
        }
    }
}
