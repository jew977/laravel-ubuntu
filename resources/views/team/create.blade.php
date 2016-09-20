@extends('layout.master')
@section('title','添加用户-盛康互动传媒域名管理系统')
@section('content')
@include('layout.nav')
<div class="container-fluid content-fluid content-slider">
<div class="row content-list">
@include('layout.left')
<div class="col-sm-10">
      <div class="content">
        <p><h3></h3></p>
         <div class="row">
          <div class="col-xs-4 col-xs-offset-3">
              <form class="form-horizontal" method="post" action="{{url('/team')}}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-group">
                     <label for="" class="col-sm-3">项目组名称</label>
                     <div class="col-sm-9">
                         <input type="text" name="teamname" class="form-control">
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="" class="col-sm-3"></label>
                     <div class="col-sm-9">
                       <input type="submit" value="保存提交" class="form-control btn btn-primary">   
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