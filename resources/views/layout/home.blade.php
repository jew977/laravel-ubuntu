@include('layout.nav')
<div class="container-fluid content-fluid content-slider">
  <div class="row content-list">
@include('layout.left')
@yield('body_content')
  </div>
</div>