@extends('layout')
@section('content')
<div class="profile-list">
<div class="container">
<div class="row">
<h1 class="text-center">Find Date</h1>
@php 
	$counter = 0;
@endphp
@foreach($getAllUser as $getalluser)
	<?php $counter++;
		if($counter%2)
		  $class = 	"blue";
		else
			$class="red";
	?>
<figure class="snip0057 {{$class}}">
  <figcaption>
    <h2>{{ $getalluser->first_name}} <span>{{ $getalluser->last_name}}</span></h2>
    <p>{{ $getalluser->name}}</p>
    <div class="icons"><a href="#"><i class="ion-ios-home"></i></a><a href="#"><i class="ion-ios-email"></i></a><a href="#"><i class="ion-ios-telephone"></i></a></div>
  </figcaption>
  <!-- @if($getalluser->image!='' && file_exists('uploads/users/profile/'.$getalluser->image))
  <div class="image"><img src="{{URL::asset('uploads/users/profile/'.$getalluser->image)}}" alt="{{ $getalluser->name}}"/></div>
   @else
   <div class="image"><img src="{{URL::asset('uploads/no-image.jpg')}}" alt="{{ $getalluser->name}}"/></div>
    @endif -->
    <div class="image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample4.jpg" alt="sample4"/></div>
  <div class="position">{{ $getalluser->email}}</div>
</figure>
 @endforeach
</div>
</div>
</div>
@stop