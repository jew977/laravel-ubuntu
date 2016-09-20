<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Team;
use App\Domain;
use Auth;
class TeamController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        //$teams=Team::all();
        $userlogin_id=Auth::user()->id;
        $teams=User::find($userlogin_id)->teams;
        if($teams){
        return view('team.index',compact('teams'));
        }else{
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $userlogin_id=1; ##超级管理员id
       $user=User::find($userlogin_id);
       $teamData=Team::create($request->all());
       if($teamData){
           
           $user->teams()->save($teamData);
           return redirect('/team');
       }else{
           return redirect('/team');
       }
        
    }



public function show_domainfo($id){
   $domain_total=count(Team::find($id)->domains);
   
   $domain_use=count(Team::find($id)->domains()->where('domain_status','1')->get());
   $domain_zwuse=count(Team::find($id)->domains()->where('domain_status','0')->get());
   $domain_beian=count(Team::find($id)->domains()->where('domain_status','2')->get());
   date_default_timezone_set('PRC');
   $time=date("Y-m-d H:i:s",time());
   $dead_time=count(Team::find($id)->domains()->where('dead_time','<',$time)->get());
   $domainfo=array();
   $domainfo['domain_total']=$domain_total;
   $domainfo['domain_use']=$domain_use;
   $domainfo['domain_zwuse']=$domain_zwuse;
   $domainfo['domain_beian']=$domain_beian;
   $domainfo['dead_time']=$dead_time;
   return $domainfo;
  
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
       $domains=Team::findOrFail($id)->domains;
       $domainfo=$this->show_domainfo($id);
       $team=Team::findOrFail($id);
       $userlogin_id=Auth::user()->id;
       $auther=User::where('t_id',$id)->get()->toArray();
       $users=$team->user->toArray();
       foreach($users as $user){
       $user_id[]=$user['id'];
         
       }
       
     if(in_array($userlogin_id,$user_id)){
        return view('team.show',array(
            'domains'=>$domains,
            'team'=>$team,
            'domainfo'=>$domainfo
            ));
     }else{
        return "没有权限查看别的组"; 
     }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::where('id',$id)->delete();
        return redirect('/team');
    }
    
    
    public function domainifo_use($id){
       $team=Team::find($id);
       $domains=Team::find($id)->domains()->where('domain_status','1')->get();
       $domainfo=$this->show_domainfo($id);
      return view('team.show',array(
            'domains'=>$domains,
            'team'=>$team,
            'domainfo'=>$domainfo
            ));
        
    }
    
    public function domainifo_nouse($id){
       $team=Team::find($id);
       $domains=Team::find($id)->domains()->where('domain_status','0')->get();
       $domainfo=$this->show_domainfo($id);
       return view('team.show',array(
            'domains'=>$domains,
            'team'=>$team,
            'domainfo'=>$domainfo
            ));
        
    }
    
     public function domainfo_beian($id){
       $team=Team::find($id);
       $domains=Team::find($id)->domains()->where('domain_status','2')->get();
       $domainfo=$this->show_domainfo($id);
       return view('team.show',array(
            'domains'=>$domains,
            'team'=>$team,
            'domainfo'=>$domainfo
            ));
        
    }
    
    
   public function domainfo_deadline($id){
       $team=Team::find($id);
       date_default_timezone_set('PRC');
       $time=date("Y-m-d H:i:s",time());
       $domains=Team::find($id)->domains()->where('dead_time','<',$time)->get();
       $domainfo=$this->show_domainfo($id);
       return view('team.show',array(
            'domains'=>$domains,
            'team'=>$team,
            'domainfo'=>$domainfo
            ));
        
    }
    
      public function domain_export($id){
          
        $file="domains";
        $data=Team::find($id)->domains->toArray();
        $controller = new ExcelController;
        $controller->export($file,$data);//传入两个参数
        
  }
    
    
}
