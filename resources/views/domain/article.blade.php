@extends('layout.master')
@section('title','主页-盛康互动传媒域名管理系统')
@section('content')
@include('layout.nav')
<div class="container-fluid content-fluid content-slider">
<div class="row content-list">
@include('layout.left')
<div class="col-sm-10">
      <div class="content">
        <p><h3 class="text-center domain-title">上海医博域名列表</h3></p>
         <div class="row">
          <table class="table table-hover user-table">
             <th></th><th>id</th><th>域名</th><th>域名注册商</th><th>域名类型</th><th>域名价格</th><th>域名状态</th><th>备案状态</th><th>域名用途</th><th>域名到期日期</th><th>项目备注</th><th>管理</th>
            @foreach($domains as $domain)
             <tr>
                  <td><input type="checkbox"></td>
                  <td>{{$domain->id}}</td>
                  <td>{{$domain->domain_name}}</td>
                  <td>{{$domain->domain_register}}</td>
                  <td>{{$domain->domian_style}}</td>
                  <td>{{$domain->domain_price}}</td>
                  <td>{{$domain->domain_status}}</td>
                  <td>{{$domain->beian_status}}</td>
                  <td>{{$domain->domain_use}}</td>
                  <td>{{$domain->dead_time}}</td>
                  <td>{{$domain->team_content}}</td>
                  <td>
                   <a class="btn btn-primary" href="{{url('domain/'. $domain->id . '/edit') }}">修改</a>
                   <form class="del-user" action="{{URL('domain/'.$domain->id) }}" method='POST'>
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