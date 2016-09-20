@extends('layout.master')
@section('title','添加用户-盛康互动传媒域名管理系统')
@section('content')
@include('layout.nav')
<div class="container-fluid content-fluid content-slider">
<div class="row content-list">
@include('layout.left')
<div class="col-sm-10">
      <div class="content">
        <p><h3>添加用户</h3></p>
         <div class="row">
          <div class="col-xs-4 col-xs-offset-3">
              <form class="form-horizontal" method="post" action="/user/register">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-group">
                     <label for="" class="col-sm-2">用户名</label>
                     <div class="col-sm-10">
                         <input type="text" name="name" class="form-control">
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="" class="col-sm-2">所属项目</label>
                     <div class="col-sm-10">
                         <select name="t_id" id=""  class="form-control">
                              @foreach($teams as $team)
                             <option value="{{$team->id}}">{{$team->teamname}}</option>
                              @endforeach
                         </select>
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="" class="col-sm-2">密码</label>
                     <div class="col-sm-10">
                         <input type="password" name="password" class="form-control">
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="" class="col-sm-2">确认密码</label>
                     <div class="col-sm-10">
                         <input type="password" name="password" class="form-control">
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="" class="col-sm-2"></label>
                     <div class="col-sm-10">
                       <input type="submit" value="添加用户" class="form-control btn btn-primary">   
                     </div>
                 </div>
              </form>
          </div>
        </div>
      </div>
</div>
</div>
</div>
@stop