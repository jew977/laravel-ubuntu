@extends('layout.master')
@section('title','用户角色-盛康互动传媒域名管理系统')
@section('content')
@include('layout.nav')
<div class="container-fluid content-fluid content-slider">
<div class="row content-list">
@include('layout.left')
<div class="col-sm-10">
      <div class="content">
        <p><h3 class="text-center domain-title">用户角色列表</h3></p>
          @if (Session::has('message'))
           <div class="am-alert am-alert-{{ Session::get('message')['type'] }} sk-message" data-am-alert>
             <p>{{ Session::get('message')['content'] }}</p>
           </div>
          @endif
         <div class="row">
          <table class="table table-hover user-table">
             <th></th><th>id</th><th>用户角色</th><th>角色描述</th><th>管理</th>
            @foreach($roles as $role)
             <tr>
                  <td><input type="checkbox"></td>
                  <td>{{$role->id}}</td>
                  <td>{{$role->name}}</td>
                  <td>{{$role->label}}</td>
                  <td>
                   <a class="btn btn-primary" href="{{url('role',$role->id) }}">分配角色权限</a>
                   <form class="del-user" action="{{URL('role/'.$role->id) }}" method='POST'>
                       <input type="hidden" name="_method" value="DELETE"/>
                       <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                       <input type="submit" class="btn btn-danger" value="删除"/>
                   </form>
                  </td>
              </tr>
           @endforeach
          </table>
        </div>
      </div>
</div>
</div>
</div>
@stop