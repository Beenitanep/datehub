@extends('backend/modules/master')

@section('content')
 {!! Form::open(array('url' => PREFIX.'articles/pages/category/addPost','files' => 'true', 'enctype' => 'multipart/form-data' )) !!}
    	  {{ csrf_field() }}
    <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" name="title" class="form-control" id="title" value="{{ Input::old('title')}}">
    @if($errors->any())
    <p>{{ $errors->first('title') }}</p>
     @endif
  </div>
  <div class="form-group">
    <label for="exampleInputTitle">Slug</label>
    <input type="text" name="slug" class="form-control" id="title" value="{{ Input::old('slug')}}">
    @if($errors->any())
    <p>{{ $errors->first('slug') }}</p>
     @endif
  </div>
<br>
  <button type="submit" class="btn btn-default">Submit</button>
    {!! Form::close() !!}
@stop
