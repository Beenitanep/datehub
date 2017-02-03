<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <title>Online Date</title>
       <link rel="stylesheet" href="/css/style.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
       <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <!--  <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"> -->
       <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
      <link rel="stylesheet" href="{{URL::asset('site/css/font/fonts.css')}}">
       <link rel="stylesheet" href="{{URL::asset('site/css/style.css')}}">
       <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="{{URL::asset('site/img/logo/logoupdated.png')}}" class="img-responsive" alt="DateHub"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav padmenu">
        <?php 
        $url = Request::path();
        $liClass="";
        ?>
        @foreach ($homemenu as $menu)
             @if(!$menu->children->isEmpty())
              @php $liClass = "dropdown";@endphp
             @endif
            <li @if($url=='/'){{"class=active"}}@elseif($menu->slug==$url){{"class=active"}}@endif @if(!$menu->children->isEmpty()){{"class=dropdown"}}@endif
             >
            <a href="{{ URL::to('/'.$menu->slug) }}" @if(!$menu->children->isEmpty()) {{"class=dropdown-toggle data-toggle=dropdown role=button aria-haspopup=true aria-expanded=false"}}  @endif>{{ $menu->name }}<span class="sr-only">(current)</span> @if(!$menu->children->isEmpty())<span class="caret"></span>@endif</a>
            @if(!$menu->children->isEmpty())
            <ul class="dropdown-menu">
              @foreach ($menu->children as $submenu)
              <li><a href="#">{{$submenu->name }}</a></li>
              @endforeach 
            </ul>
            @endif
        @endforeach 
      </li>

         
      </ul>
      
       
      <ul class="nav navbar-nav navbar-right">
      <li><p>Hi, {{ Auth::user()->name}} </p></li>
      <!--  <li><a href="{{ URL::to('/account')}}">My Account</a></li> -->
      <li><a href="{{URL::to('/logout')}}">Log Out</a></li>
        <li><a href="#"></a><i class="fa fa-facebook"></i></li>
         <li><a href="#"><i class="fa fa-twitter"></i></a></li>
      </ul>
     <!--  <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="{{ URL::to('/') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::to('/') }}">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul> -->
       <?php //dd($menuName);?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
     </head>
    <body>
    <div class="container">
       @yield('content')
       </div>
      <footer id="footer">
      <div class="container">
<div class="row">
<div class="copyright-footer">
© Ekbana Pvt Ltd2016. All rights reserved.
</div>
</div>
</div>
       </footer>
    </body>
</html>
