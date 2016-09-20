    <div class="col-sm-2 left-slider">
      <div class="main-slider">
        <ul class="list-group list-menu">
          @can('user_management',Auth::user()->id)
          <li class="list-group-item"><a href="{{url('/control')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>控制台</a></li>
          
          <li class="list-group-item list-user">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>用户管理
            <ul class="list-group" style="display:none;">
              <li class="list-group-item"><a href="{{url('/user/create')}}">新增用户</a></li>
              <li class="list-group-item"><a href="{{url('/user')}}">用户列表</a></li>
            </ul>
          
          </li>
          @endcan
           <li class="list-group-item"><span class="glyphicon glyphicon-magnet" aria-hidden="true"></span>域名管理
            <ul class="list-group" style="display:none;">
             <li class="list-group-item"><a href="{{url('/domain/create')}}">新增域名</a></li>
              @can('user_management',Auth::user()->id)
              <li class="list-group-item"><a href="/domain">域名列表</a></li>
              
              <li class="list-group-item"><a href="{{url('domainRegister','create')}}">新增域名商</a></li>
              <li class="list-group-item"><a href="{{url('domainRegister')}}">域名商列表</a></li>
              @endcan
            </ul>
          </li>
          @can('team_management',Auth::user()->id)
          <li class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>项目管理
            <ul class="list-group" style="display:none;">
              <li class="list-group-item"><a href="/team">项目列表</a></li>
              <li class="list-group-item"><a href="{{url('/team/create')}}">新增项目组</a></li>
            </ul>
          </li>
          @endcan
          @can('permission_management',Auth::user()->id)
          <li class="list-group-item"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>权限管理
           <ul class="list-group" style="display:none;">
              <li class="list-group-item"><a href="{{url('role','create')}}">新增角色</a></li>
              <li class="list-group-item"><a href="{{url('permission','create')}}">新增权限</a></li>
              <li class="list-group-item"><a href="{{url('role')}}">角色列表</a></li>
              <li class="list-group-item"><a href="{{url('permission')}}">权限列表</a></li>
            </ul>
          </li>
          @endcan
          <li class="list-group-item"><a href="{{url('/loginout')}}"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>退出登录</a></li>
        </ul>
      </div>
    </div>