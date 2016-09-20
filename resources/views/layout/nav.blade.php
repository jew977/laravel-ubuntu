<nav class="navbar navbar-default nav-top">
  <div class="container-fluid">
    <div class="navbar-header nav-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">展开</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="logo"><a class="navbar-brand nav-domain" href="#">盛康域名管理系统</a></div>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>-->
      </ul>
      <form class="navbar-form navbar-left" method="POST" action="{{url('search')}}" role="search">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <input type="text" class="form-control form-search" name="domain_name" placeholder="查找域名">
        </div>
        <button type="submit" class="btn btn-primary btn-search">搜索</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
        <li class="nav-info"><img src="/img/default_128.png"><a href="#">{{Auth::user()->name}}</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret glyphicon glyphicon-off" aria-hidden="true"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">修改密码</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/loginout">退出登陆</a></li>
          @endif
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid content-fluid">
  <div class="toolbar ">
    <div class="ui secondary menu">
        <div class="item">
          @if(Auth::check())
            <i class="home icon"></i>
            欢迎回来，{{Auth::user()->name}}     
            @endif
        </div>
    </div>
</div>
</div>