@extends('layout.master')
@section('title','登陆-盛康互动传媒域名管理系统')
@section('content')
<div class="main masthead">
   <div class="container login-header">
    <div class="row">
        <h1>SENKON</h1>
        <h2>域名管理系统</h2>
    </div>
    <div class="row">
        <form class="form-horizontal" action="/login" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="" class="col-sm-4 col-sm-offest-4 control-label">账号：</label>
                <div class="col-sm-4 ">
                    <input type="text" name="name" class="form-control">
                </div>
                
            </div>
            <div class="form-group">
                <label for="" class="col-sm-4 col-sm-offest-4 control-label">密码：</label>
                <div class="col-sm-4">
                    <input type="password" name="password" class="form-control"/>
                </div>
            </div>
          <div class="form-group">
              <label for="" class="col-sm-4 col-sm-offest-4 control-label"></label>
                <div class="col-sm-4">
                    <input type="submit" value="登陆" class="form-control btn btn-primary"/>
                </div>
          </div>
        </form>
        
        <div class="col-sm-6 col-sm-offset-3">
            @if($errors->any())
            <ul class="list-group">
                @foreach($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
   </div> 
</div>
@stop