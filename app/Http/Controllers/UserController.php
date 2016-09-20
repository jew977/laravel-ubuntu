<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Auth;
use App\Team;
use App\Role;
class UserController extends Controller
{
  public function __construct(){
        $this->middleware('auth',['only'=>['index','showHome','create','edit','update','store']]);
        $this->middleware('admin',['except'=>['getLogin','postLogin','Loginout']]);
    }
    public function index(){
     $users=User::paginate(12);
    return view('user.index',compact('users'));
    }
    public function create(){
        $teams=Team::all();
        return view('user.create',compact('teams'));
    }
    
    public function show($id){
        $user=User::find($id);
        $roles=Role::all();
        return view('user.show',
        array(
            'user'=>$user,
            'roles'=>$roles
            ));
    }
    public function edit($id){
     $users=User::findOrFail($id);
     return view('user.edit');   
    }
    public function update(Request $request, $id){
        
        $user=User::find($id);
        $role_id=$request->get('role_id');
        $role=Role::find($role_id);
        
        
        if($user->roles()->save($role)){
            User::where('id',$id)->update(['role_id' => $role_id]);
            return redirect('/user');
        }
        
        
    }
    public function destroy($id){
    User::where('id',$id)->delete();
    return redirect('/user')->with('message','删除成功!');
    }

    public function getLogin(){
        return view('user.login');
    }
    public function postLogin(Requests\UserLoginRequest $request){
        if(Auth::attempt([
            'name'=>$request->get('name'),
            'password'=>$request->get('password')
            ])){
            return redirect('/control');
        }else{
            return redirect('/login');
        }
    }

    public function postRegister(Requests\UserRegisterRequest $request){
     $team_id=$request->get('t_id');
     $team=Team::find($team_id);
     $user=User::create($request->all());
     if($user){
         $user->teams()->save($team);
         return redirect('/user');
     }else{
         return redirect('/user');
     }
     
    }
    
    
    public function Loginout(){
        Auth::logout();
        return redirect('/login');
    }
}
