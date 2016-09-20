@extends('layout.master')
@section('title','权限列表-盛康互动传媒域名管理系统')
@section('content')
@include('layout.nav')
<div class="container-fluid content-fluid content-slider">
<div class="row content-list">
@include('layout.left')
<div class="col-sm-10">
      <div class="content">
        <p><h3 class="text-center domain-title">权限列表</h3></p>
          @if (Session::has('message'))
           <div class="am-alert am-alert-{{ Session::get('message')['type'] }} sk-message" data-am-alert>
             <p>{{ Session::get('message')['content'] }}</p>
           </div>
          @endif
         <div class="row">
          <table class="table table-hover user-table">
            <th></th><th>id</th><th>用户权限</th><th>权限描述</th><th>管理</th>
            @foreach($permissions as $permission)
             <tr>
                  <td><input type="checkbox"></td>
                  <td>{{$permission->id}}</td>
                  <td>{{$permission->name}}</td>
                  <td>{{$permission->label}}</td>
                  <td>
                   <a class="btn btn-primary" href="{{url('permission/'. $permission->id . '/edit') }}">修改</a>
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