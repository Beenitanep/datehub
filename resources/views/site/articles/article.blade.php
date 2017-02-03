@extends('layout')
@section('content')
<div class="datetips-list">
<div class="container">
<div class="row"> 
<h1 class="text-center">Article List</h1>
 
<div class="home-article">
<div class="container">
<div class="row">
<div class="col-md-12 col-md-offset-4">
  </div>
  @foreach($articleList as $article)
   <div class="col-md-3">
   @if($article->image!='' && file_exists('uploads/article/thumb/'.$article->image))
  <img src="{{URL::asset('uploads/article/thumb/' .$article->image)}}" class="img-responsive" alt="poonhillshort trek.jpg">
  @else
  <img src="{{URL::asset('uploads/no-image.jpg')}}" class="img-responsive" alt="poonhillshort trek.jpg">
  @endif
  <div class="articleblock">
  <h4>{{ $article->title}}</h4>
 <h5>Category:
  @php
  $tags = explode(',',$article->tags);
  @endphp
  @for($i=0; $i<count($tags); $i++)
  {{ $article->getCategoryTitleById($tags[$i]) }}
 @if ($i<count($tags)-1)
,  
 @endif 
  @endfor
<p>{{ $article->description}}</p>
  <a href="{{ URL::to('/articles/'.$article->slug)}}" class="btn-danger padbtn">Read More</a>
  </div>
  </div>
  @endforeach
  <ul class="list"> 
  {!! $articleList->render()!!}
  </ul>
</div>

  </div>
</div>
</div>
@stop