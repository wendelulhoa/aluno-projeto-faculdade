<?php

namespace App\Http\Controllers;

use App\Models\aluno;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AlunoController extends Controller
{
    public function index(){
        try{
            $student = aluno::join('users','aluno.id', 'users.id')->select('aluno.*', 'users.image')->paginate(5) ?? [];
            return view('aluno.index',['students'=> $student, 'type'=>'aluno']);
        }catch(Exception $e){
            return response(['error'=>$e], 400);
        }
    }

    public function editStruture($id){
        try{
            $student = aluno::where(['id'=> $id])->get() ?? [];
            $route =  Route('aluno-update', ['id'=>$id]);
            $user  = User::where(['id'=>$id])->get(); 

            return view('aluno.create', ['student'=>$student, 'route'=>$route, 'id'=>$id, 'image'=> $user[0]->image ?? '']);
        }catch(Exception $e){
            return response(['error'=>$e], 400);
        }
    }

    public function createStruture(){
        try{
            $route = Route('aluno-create');
            return view('aluno.create', ['route'=> $route]);
        }catch(Exception $e){
            return response(['error'=>$e], 400);
        }
    }

    public function create(Request $request){
        try{
            if(isset($request['img'])){
                $path = $request['img']->store('user/photo');
            }else{
                $path = null;
            }

            DB::beginTransaction();
              User::create([
                'name' => $request['name'],
                'email'=> $request['email'],
                'password' => Hash::make('projeto123'),
                'active' => true,
                'image' => $path,
                'type_user'=> 0
              ]);
              aluno::create([
                  'name' => $request['name'],
                  'email'=> $request['email'],
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
                if(isset($request['img']) && !empty($request['img'])){
                    $path = $request['img']->store('user/photo');
                    $image = User::where(['id'=>$id])->get()[0]->image;
                    Storage::delete($image);
                    User::where(['id'=>$id])->update([
                        'name' => $request['name'],
                        'email'=> $request['email'],
                        'image'=> $path
                    ]);
                }else{
                    User::where(['id'=>$id])->update([
                        'name' => $request['name'],
                        'email'=> $request['email']
                    ]);
                }


                aluno::where(['id'=>$id])->update([
                    'name' => $request['name'],
                    'email'=> $request['email'],
                ]);
            DB::commit();
        }catch(Exception $e){
            Storage::delete($path);
            DB::rollBack();
            return response(['error'=>$e], 400);
        }
    }
    

    public function delete($id){
        try{
            DB::beginTransaction();
                if(Auth::check()){
                    aluno::where(['id'=> $id])->delete();
                }
            DB::commit();
            return response('sucesso', 200);
        }catch(Exception $e){
            DB::rollBack();
            return response(['error'=>$e], 400);
        }
    }
}
