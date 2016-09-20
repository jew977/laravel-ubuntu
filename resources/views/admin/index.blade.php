@extends('layout.master')
@section('title','主页-盛康互动传媒域名管理系统')
@section('content')
@include('layout.nav')
<div class="container-fluid content-fluid content-slider">
<div class="row content-list">
@include('layout.left')
<div class="col-sm-10">
   @can('user_management',Auth::user()->id)
      <div class="content">
        <p><h3>控制面板 概述</h3></p>
         <div class="row">
          <div class="col-sm-3 col-xs-6">
            <div class="thumbnail domain-use">
              <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
              <div class="caption">
                <h3>{{$domain_use}}个</h3>
                <p>正在使用域名</p>
                <p><a href="{{url('domain_use')}}" class="btn btn-primary" role="button">查看更多信息</a></p>
              </div>
            </div>
          </div>
         <div class="col-sm-3 col-xs-6">
            <div class="thumbnail domain-nouse">
              <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
              <div class="caption">
                <h3> {{$domain_zwuse}}个</h3>
                <p>暂未使用域名</p>
                <p><a href="{{url('domain_zwuse')}}" class="btn btn-primary" role="button">查看更多信息</a></p>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-xs-6">
            <div class="thumbnail domain-beian">
             <span class="glyphicon glyphicon-cloud" aria-hidden="true"></span>
              <div class="caption">
                <h3>{{$domain_beian}}个</h3>
                <p>正在备案域名</p>
                <p><a href="{{url('domain_beian')}}" class="btn btn-primary" role="button">查看更多信息</a></p>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-xs-6">
            <div class="thumbnail domain-update">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
              <div class="caption">
                <h3>{{$dead_time}}个</h3>
                <p>域名到期</p>
                <p><a href="{{url('domain_deadtime')}}" class="btn btn-primary" role="button">查看更多信息</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endcan
      <div class="content">
        <div class="row">
          <div class="col-sm-3 col-xs-6">
            <div class="thumbnail domain-gonggao">
              <div class="caption">
                <h3>系统公告</h3>
                <p>［预算系统］现已迁入OA中，部门主管请检查数据是否有误（一般情况下是没有的）。出现权限问题请联系管理员修改。</p>
                <p></p>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-xs-6">
            <div class="thumbnail domain-env">
              <div class="caption">
                <p>服务器操作系统：Ubuntu 14.04.3 LTS</p>
                <p>php版本/运行方式:PHP 5.5.9-1ubuntu4.17</p>
                <p>缓存驱动:redis</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

