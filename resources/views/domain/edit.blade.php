@extends('layout.master')
@section('title','编辑域名-盛康互动传媒域名管理系统')
@section('content')
@include('layout.nav')
<div class="container-fluid content-fluid content-slider">
<div class="row content-list">
@include('layout.left')
<script type="text/javascript" src="/js/laydate.dev.js"></script>
<div class="col-sm-10">
      <div class="content">
        <p><h3 class="text-center domain-title"></h3></p>
         <div class="row">
          <div class="col-xs-4 col-xs-offset-3">
              <form class="form-horizontal" method="POST" action="{{url('domain',$domain->id)}}">
                  <input name="_method" type="hidden" value="PATCH">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-group">
                     <label for="" class="col-sm-3">域名</label>
                     <div class="col-sm-9">
                         <input type="text" name="domain_name" value="{{$domain->domain_name}}" class="form-control">
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="" class="col-sm-3">域名注册商</label>
                     <div class="col-sm-9">
                         <input type="text" name="domain_register" value="{{$domain->domain_register}}" class="form-control">

                     </div>
                 </div>
                 <div class="form-group">
                     <label for="" class="col-sm-3">域名价格</label>
                     <div class="col-sm-9">
                         <input type="text" name="domain_price" value="{{$domain->domain_price}}" class="form-control">
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="" class="col-sm-3">域名状态</label>
                     <div class="col-sm-9">
                        <label class="domain_radio"><input type="radio" name="domain_status" value="0">暂未使用</label>
                        <label class="domain_radio"><input type="radio" name="domain_status" value="1">正在使用</label>
                        <label class="domain_radio"><input type="radio" name="domain_status" value="2">备案中</label>
                        
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="" class="col-sm-3">备案状态</label>
                     <div class="col-sm-9">
                        <label class="domain_radio"><input type="radio" name="beian_status" value="0">个人备案</label>
                        <label class="domain_radio"><input type="radio" name="beian_status" value="1">企业备案</label>
                        <label class="domain_radio"><input type="radio" name="beian_status" value="2">无备案</label>
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="" class="col-sm-3">域名用途</label>
                     <div class="col-sm-9">
                        <label class="domain_radio"><input type="radio" name="domain_use" value="0">优化站　</label>
                        <label class="domain_radio"><input type="radio" name="domain_use" value="1">竞价站　</label>
                        <label class="domain_radio"><input type="radio" name="domain_use" value="2">未使用　</label>
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="" class="col-sm-3">域名到期时间</label>
                     <div class="col-sm-9">
                         <input type="text" name="dead_time" id="J-xl"  value="{{$domain->dead_time}}" class="form-control">
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="" class="col-sm-3">域名备注</label>
                     <div class="col-sm-9">
                         <input type="text" name="team_content" value="{{$domain->team_content}}" class="form-control">
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="" class="col-sm-3">所属项目</label>
                     
                     <div class="col-sm-9">
                        
                         <select name="team_id" id=""  class="form-control">
                         
                           <option value="{{$team->id}}">{{$team->teamname}}</option>
                        
                         </select>
                        
                     </div>
                     
                 </div>

                 <div class="form-group">
                     <label for="" class="col-sm-3"></label>
                     <div class="col-sm-9">
                       <input type="submit" value="保存添加" class="form-control btn btn-primary">   
                     </div>
                 </div>
              </form>
          </div>
        </div>
      </div>
</div>
	<script type="text/javascript">
        laydate({
            elem: '#J-xl'
        });
        (function(){
            var status="{{$domain->domain_status}}";
             document.getElementsByName("domain_status")[status].checked="checked";
             var beian="{{$domain->beian_status}}";
             document.getElementsByName("beian_status")[beian].checked="checked";
             var use="{{$domain->domain_use}}";
             document.getElementsByName("domain_use")[use].checked="checked";
        })();
       
    </script>
</div>
</div>
@stop