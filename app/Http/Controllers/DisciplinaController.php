<?php

namespace App\Http\Controllers;

use App\Models\disciplina;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DisciplinaController extends Controller
{
    public function index(){
        try{
            $disciplinas = disciplina::paginate(5) ?? [];
            return view('disciplina.index',['disciplinas'=> $disciplinas, 'type'=>'disciplina']);
        }catch(Exception $e){
            return response(['error'=>$e], 400);
        }
    }

    public function editStruture($id){
        try{
            $disciplinas = disciplina::create(['id'=> $id])->get() ?? [];
            $route       = Route('disciplina-update', ['id'=>$id]);
            return view('disciplina.create', ['disciplinas'=>$disciplinas, 'id'=>$id, 'route'=>$route]);
        }catch(Exception $e){
            return response(['error'=>$e], 400);
        }
    }

    public function createStruture(){
        try{
            $route = Route('disciplina-create');
            return view('disciplina.create', ['route'=>$route]);
        }catch(Exception $e){
            return response(['error'=>$e], 400);
        }
    }

    public function create(Request $request){
        try{
            DB::beginTransaction();
                disciplina::create([
                    'name' => $request['name'],
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
                disciplina::where(['id'=> $id])->update([
                    'name' => $request['name'],
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
                    disciplina::where(['id'=> $id])->delete();
                }
            DB::commit();
            return response('sucesso', 200);
        }catch(Exception $e){
            DB::rollBack();
            return response(['error'=>$e], 400);
        }
    }
}
