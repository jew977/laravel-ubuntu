<meta name="_token" content="{{ csrf_token() }}"/>
@extends('layout.master')
@section('title','域名列表页-盛康互动传媒域名管理系统')
@section('content')
@include('layout.nav')
<div class="container-fluid content-fluid content-slider">
<div class="row content-list">
@include('layout.left')
<div class="col-sm-10">
      <div class="content">
      
         <div class="row"> 
          <p class="domain_nav">
          <a href="{{url('team',$team->id)}}" class="btn domain-total">所有域名 {{$domainfo['domain_total']}}个</a>
          <a href="{{url('/team/'.$team->id.'/domainfo_use')}}" class="btn domain-use">正用域名 {{$domainfo['domain_use']}}个</a>
          <a href="{{url('/team/'.$team->id.'/domainfo_nouse')}}" class="btn domain-nouse">未用域名{{$domainfo['domain_zwuse']}}个</a>
          <a href="{{url('/team/'.$team->id.'/domainfo_beian')}}" class="btn domain-beian">备案域名 {{$domainfo['domain_beian']}}个</a>
          <a href="{{url('/team/'.$team->id.'/domainfo_deadline')}}" class="btn domain-update">到期域名{{$domainfo['dead_time']}}个</a>
          <a href="{{url('excel/'.$team->id.'/export')}}" class="btn domain-execl">导出EXECL</a></p>
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
                  <td>
                @if($domain->domain_status==0)
                   暂未使用
                   @elseif($domain->domain_status==1)
                   正在使用
                   @else
                   备案中
                   @endif
                   </td>
                  <td>
                @if($domain->beian_status==0)
                   个人备案
                   @elseif($domain->beian_status==1)
                   企业备案　
                   @else
                   无备案
                   @endif
                  
                  </td>
                  <td>
                 @if($domain->domain_use==0)
                   优化站
                   @elseif($domain->domain_use==1)
                   竞价站　
                   @else
                   未使用
                   @endif
                  
                  </td>
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