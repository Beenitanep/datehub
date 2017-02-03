@extends('layout')
@section('content')
<div class="datetips-list">
<div class="container">
<div class="row"> 
<h1 class="text-center">Date Tips</h1>
   <ul class="nav nav-tabs">
        <li class="nav active"><a href="#dateidea" data-toggle="tab">Date Ideas</a></li>
        <li class="nav"><a href="#dateadvice" data-toggle="tab">Date Advice</a></li>
        <li class="nav"><a href="#datefacts" data-toggle="tab">Date Facts</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade in active" id="dateidea">
        @foreach($dateIdea as $dateidea)
         <div class="col-md-6">
        <h3>{{ $dateidea->title}}</h3>
        @if($dateidea->image!='' && file_exists('uploads/date-tips/thumb/'.$dateidea->image))
        <img src="{{URL::asset('uploads/date-tips/thumb/'.$dateidea->image)}}" class="img-responsive" alt="{{ $dateidea->title }}">
        @else
        <img src="{{URL::asset('uploads/no-image.jpg')}}" class="img-responsive" alt="{{ $dateidea->title }}">
        @endif
      <p>{{ $dateidea->description }}</p>
      <a href="#" class="btn-danger padbtn">Read More</a>
      </div>
      @endforeach
        </div>
        <div class="tab-pane fade" id="dateadvice">
        @foreach($dateAdvice as $dateadvice)
         <div class="col-md-6">
        <h3>{{ $dateadvice->title}}</h3>
        @if($dateadvice->image!='' && file_exists('uploads/date-tips/thumb/'.$dateadvice->image))
        <img src="{{URL::asset('uploads/date-tips/thumb/'.$dateadvice->image)}}" class="img-responsive" alt="{{ $dateadvice->title }}">
        @else
        <img src="{{URL::asset('uploads/no-image.jpg')}}" class="img-responsive" alt="{{ $dateadvice->title }}">
        @endif
      <p>{{ $dateadvice->description }}</p>
      <a href="#" class="btn-danger padbtn">Read More</a>
      </div>
      @endforeach
        </div>
        <div class="tab-pane fade" id="datefacts">
        @foreach($datefacts as $datefacts)
         <div class="col-md-6">
        <h3>{{ $datefacts->title}}</h3>
        @if($datefacts->image!='' && file_exists('uploads/date-tips/thumb/'.$datefacts->image))
        <img src="{{URL::asset('uploads/date-tips/thumb/'.$datefacts->image)}}" class="img-responsive" alt="{{ $datefacts->title }}">
        @else
        <img src="{{URL::asset('uploads/no-image.jpg')}}" class="img-responsive" alt="{{ $datefacts->title }}">
        @endif
      <p>{{ $datefacts->description }}</p>
      <a href="#" class="btn-danger padbtn">Read More</a>
      </div>
      @endforeach
        </div>
    </div>
  </div>
</div>
</div>
@stop