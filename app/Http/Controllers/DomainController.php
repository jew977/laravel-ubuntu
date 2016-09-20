<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Domain;
use App\Team;
use Searchy;
use App\Domainreg;
use Cache;
class DomainController extends Controller
{  
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin',['only'=>['index']]);
    }
    
    public function index()
    {

        $domainList=new Domain();
        $domains=$domainList->getDomainList();
        return view('domain.index',compact('domains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams=Team::all();
        $domainregs=domainreg::all();
        return view('domain.create',array(
        'teams'=>$teams,
        'domainregs'=>$domainregs
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $team_id=$request->get('team_id');
        $team=Team::find($team_id);
        $data=[
        'last_user_id'=>Auth::user()->id,
        'domian_style'=>$this->getExt($request->get('domain_name')),
        'groupname'=>$team->teamname,
        ];
       
        if(Domain::create(array_merge($request->all(),$data))){
            return redirect('/team')->with('message',array('type' => 'success', 'content' => '添加成功！'));
        }else{
            
          return redirect('/team')->with('message',array('type' => 'danger', 'content' => '添加失败！'));
        }
        
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $domain=Domain::findOrFail($id);
        return view('domain.show',compact('domain'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $domain=Domain::findOrFail($id);
        $team=Team::find($domain->team_id);
        return view('domain.edit',array(
            'domain'=>$domain,
            'team'=>$team
            ));
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

        $domain=Domain::findOrFail($id);
        $data=[
        'last_user_id'=>Auth::user()->id,
        'domian_style'=>$this->getExt($request->get('domain_name'))
        ];
        $domain->update(array_merge($request->all(),$data));
        return redirect()->action('DomainController@show',['id'=>$domain->id]);
       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    Domain::where('id',$id)->delete();
    return redirect('/domain')->with('message',array('type' => 'success', 'content' => '删除成功！'));
    }
    
    
   public function getExt($domain){
    preg_match("/[^\.\/]+$/",$domain,$match);
    $ext=implode("",$match);
    return $ext;
  }
  
  public function postSearch(Request $request){
      $site=$request->get('domain_name');
      $domains=Searchy::domains('domain_name')->query($site)->get();
      if($domains){
          return view('search.index',compact('domains'));
      }else{
          
          return abort(404,"404");
      }
     
    }
    
    public function showHome(){
       $domain_use=count(Domain::where('domain_status','1')->get());
       $domain_zwuse=count(Domain::where('domain_status','0')->get());
       $domain_beian=count(Domain::where('domain_status','2')->get());
       date_default_timezone_set('PRC');
       $time=date("Y-m-d H:i:s",time());
       $dead_time=count(Domain::where('dead_time','<',$time)->get());
        return view('admin.index',array(
            'domain_use'=>$domain_use,
            'domain_zwuse'=>$domain_zwuse,
            'domain_beian'=>$domain_beian,
            'dead_time'=>$dead_time,
            ));
    }
    
    public function domain_use(){
        $domains=Domain::where('domain_status','1')->paginate(10);
     // dd($domains);exit();
        return view('domain.index',compact('domains'));
    }
    
        public function domain_zwuse(){
        $domains=Domain::where('domain_status','0')->paginate(10);
        return view('domain.index',compact('domains'));
    }
    
    public function domain_beian(){
        $domains=Domain::where('domain_status','2')->paginate(10);
        return view('domain.index',compact('domains'));
    }
    
     public function domain_deadtime(){
        date_default_timezone_set('PRC');
        $time=date("Y-m-d H:i:s",time());
        $domains=Domain::where('dead_time','<',$time)->paginate(10);
        return view('domain.index',compact('domains'));
    }
  
  

}
