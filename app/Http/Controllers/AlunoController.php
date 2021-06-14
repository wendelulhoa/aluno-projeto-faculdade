<?php

namespace App\Http\Controllers;

use App\Models\aluno;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    public function index(){
        try{
            $student = aluno::paginate(5) ?? [];
            return view('aluno.index',['student'=> $student]);
        }catch(Exception $e){
            return response(['error'=>$e], 400);
        }
    }

    public function editStruture($id){
        try{
            
        }catch(Exception $e){
            return response(['error'=>$e], 400);
        }
    }

    public function createStruture(){
        try{
            return view('aluno.create');
        }catch(Exception $e){
            return response(['error'=>$e], 400);
        }
    }

    public function create(Request $request){
        try{
            
            if(isset($request['file'])){
                $path = $request->file->store('user/photo');
            }else{
                $path = null;
            }

            DB::beginTransaction();
              aluno::create([
                  'name' => $request['name'],
                  'email'=> $request['email'],
                  'image'=> $path
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
              
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            return response(['error'=>$e], 400);
        }
    }
    

    public function delete($id){
        try{
            DB::beginTransaction();

            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            return response(['error'=>$e], 400);
        }
    }
}
