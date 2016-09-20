<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Role;
use App\Permission;
class RoleController extends Controller
{
  public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        $roles=Role::all();
       return view('role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roles=Role::create($request->all());
        return redirect('role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role=Role::find($id);
        $role_permissions=$role->permissions;
        $permissions=Permission::all();
        return view('role.show',
        array(
            'role'=>$role,
            'role_permissions'=>$role_permissions,
            'permissions'=>$permissions
            ));
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
    {   $role=Role::find($id);
        $permission_id=$request->get('permission_id');
        $permission=Permission::find($permission_id);
        $role->givePermission($permission);
        return redirect('/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $role=Role::where('id',$id)->delete();
    if($role){
        return redirect('/role')->with('message',array('type' => 'success', 'content' => '删除成功！'));
       }else{
        return redirect('/role')->with('message',array('type' => 'danger', 'content' => '删除失败！'));
      }
    }

}
