@extends('layout.master')
@section('title','域名注册商列表-盛康互动传媒域名管理系统')
@section('content')
@include('layout.nav')
<div class="container-fluid content-fluid content-slider">
<div class="row content-list">
@include('layout.left')
<div class="col-sm-10">
      <div class="content">
        <p><h3>域名注册商列表</h3></p>
         <div class="row">
          <table class="table table-hover user-table">
             <th></th><th>id</th><th>域名注册商</th><th>权限</th><th>管理</th>
            @foreach($domainregs as $domainreg)
             <tr>
                  <td><input type="checkbox"></td>
                  <td>{{$domainreg->id}}</td>
                  <td>{{$domainreg->domainreg_name}}</td>
                  <td>是</td>
                  <td>
                   <a class="btn btn-primary" href="{{url('domainreg/'. $domainreg->id . '/edit') }}">修改</a>
                   <form class="del-user" action="{{URL('domainreg/'.$domainreg->id) }}" method='POST'>
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
      {{ $domainregs->links() }}
</div>
</div>
</div>
@stop