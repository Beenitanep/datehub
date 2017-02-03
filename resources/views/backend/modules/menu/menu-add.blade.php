@extends('backend/modules/master')

@section('content')
 {!! Form::open(array('url' => PREFIX.'menu/addPost','files' => 'true', 'enctype' => 'multipart/form-data' )) !!}
    	  {{ csrf_field() }}
    <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" name="name" class="form-control" id="name" value="{{ Input::old('name')}}">
    @if($errors->any())
    <p>{{ $errors->first('title') }}</p>
     @endif
  </div>
   <div class="form-group">
    <label for="exampleInputSlug">Slug</label>
    <input type="text" class="form-control" name="slug" id="slug" value="{{ Input::old('slug')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputParentid">Parent Id</label>
    <input type="text" class="form-control" name="parentid" id="parentid" value="{{ Input::old('parentid')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputParentid">Position</label>
    <input type="text" class="form-control" name="position" id="position" value="{{ Input::old('position')}}">
  </div>
  <div class="form-group">
 <label for="examplestatus">Status</label>
  <select class="form-control" name="status" id="status">
  <option>Publish</option>
  <option>Unpublish</option>
</select>
</div>
<br>
  <button type="submit" class="btn btn-default">Submit</button>
    {!! Form::close() !!}
@stop
