@extends('layout')

@section('title', 'Online Date Artilce Detail Page')
@section('description', 'Share text and photos with your friends and have fun')
@section('keywords', 'sharing, sharing text, text, sharing photo, photo,')
@section('robots', 'index, follow')
@section('revisit-after', 'content="3 days')

@section('content')
<div class="datetips-list">
<div class="container">
<div class="row"> 
<h1 class="text-center">Article Details</h1>
 
<div class="home-article">
<div class="container">
<div class="row">
<div class="col-md-12 col-md-offset-4">
  </div>
<div class="home-about">
<div class="row">
</div>
</div>

<div class="home-about">
<div class="row">
  <div class="col-md-4">
  @if($articleDetails->image!='' && file_exists('uploads/article/cover/'.$articleDetails->image))
    <img src="{{URL::asset('uploads/article/cover/' .$articleDetails->image)}}" class="img-responsive" alt="{{ $articleDetails->title }}">
    @else
<img src="{{URL::asset('uploads/uploads/no-image.jpg')}}" class="img-responsive" alt="poonhillshort trek.jpg">
@endif
  </div>
  <div class="col-md-8">
    <h3>{{ $articleDetails->title }}</h3>
    <p>{{ $articleDetails->description }}</p>
  </div>
</div>
</div>

  
</div>

  </div>
</div>
</div>
@stop