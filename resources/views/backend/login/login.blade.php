@extends('backend.login.master')
@section('content')
<body style="background-color:#FFB6C1">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<h1>Login Panel</h1>
    	
    	<!-- <form class="form-horizontal" role="form" method="POST" action="{{ url('cms/login') }}"> -->
    	 {!! Form::open(['url'=>PREFIX.'login']) !!}
    	  {{ csrf_field() }}
			<div class="f_goup">
	          <b>NAME</b>
	          <input type="text" name="username" class="form-control">
	        </div>
	        <div class="clearfix"></div>
	        <div class="f_goup">
	          <b>PASSWORD</b>
	          <input type="password" name="password" class="form-control" >
	        </div>
	        <div class="log_in">
          <button type="login" class="btn login">LOGIN</button>
        </div>
        {!! Form::close() !!}
        
	    </div>

    
  </div><!-- end of row -->
</div><!----end of container------->
@stop

