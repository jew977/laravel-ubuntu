@extends('layout.master')
@section('title','用户列表-盛康互动传媒域名管理系统')
@section('content')
@include('layout.nav')
<div class="container-fluid content-fluid content-slider">
<div class="row content-list">
@include('layout.left')
<div class="col-sm-10">
      <div class="content">
        <p><h3>用户列表</h3></p>
         <div class="row">
          <table class="table table-hover user-table">
             <th></th><th>id</th><th>账号</th><th>权限</th><th>管理</th>
            @foreach($users as $user)
             <tr>
              
                  <td><span class="glyphicon glyphicon-user"></span></td>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>
                   @if($user->role_id==1)
                   超级管理员
                   @elseif($user->role_id==2)
                   管理员　
                   @else
                   无权限
                   @endif
                  </td>

                  <td>
          
                   <a class="btn btn-primary" href="{{url('user',$user->id) }}">分配权限</a>
                   <form class="del-user" action="{{URL('user/'.$user->id) }}" method='POST'>
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
      {{ $users->links() }}
</div>
</div>
</div>
@stop