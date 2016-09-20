@extends('layout.master')
@section('title','域名查找-盛康互动传媒域名管理系统')
@section('content')
@include('layout.nav')
<div class="container-fluid content-fluid content-slider">
<div class="row content-list">
@include('layout.left')
<div class="col-sm-10">
      <div class="content">
        <p><h3 class="text-center domain-title">域名列表</h3></p>
          @if (Session::has('message'))
           <div class="am-alert am-alert-{{ Session::get('message')['type'] }} sk-message" data-am-alert>
             <p>{{ Session::get('message')['content'] }}</p>
           </div>
          @endif
         <div class="row">
          <table class="table table-hover user-table">
             <th></th><th>id</th><th>域名</th><th>所属项目组</th><th>域名注册商</th><th>域名类型</th><th>域名价格</th><th>域名状态</th><th>备案状态</th><th>域名用途</th><th>域名到期日期</th><th>项目备注</th><th>管理</th>
            @foreach($domains as $domain)
             <tr>
                  <td><input type="checkbox"></td>
                  <td>{{$domain->id}}</td>
                  <td>{{$domain->domain_name}}</td>
                  <td>{{$domain->groupname}}</td>
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
                  <td>{{empty($domain->team_content) ? '暂无' : $domain->team_content}}</td>
                  <td>
                   @if(Auth::user()->id==$domain->last_user_id)
                   <a class="btn btn-primary" href="{{url('domain/'. $domain->id . '/edit') }}">修改</a>
                   <form class="del-user" action="{{URL('domain/'.$domain->id) }}" method='POST'>
                       <input type="hidden" name="_method" value="DELETE"/>
                       <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                       <input type="submit" class="btn btn-danger" value="删除"/>
                   </form>
                   
                   @endif
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