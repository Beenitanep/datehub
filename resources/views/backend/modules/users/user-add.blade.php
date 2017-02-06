@extends('backend/modules/master')

@section('content')
 {!! Form::open(array('url' => PREFIX.'users/addPost','files' => 'true', 'enctype' => 'multipart/form-data' )) !!}
        {{ csrf_field() }}
    <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" name="title" class="form-control" id="title" value="{{ Input::old('title')}}">
    @if($errors->any())
    <p>{{ $errors->first('title') }}</p>
     @endif
  </div>
  <div class="form-group">
    <label for="exampleInputUrl">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="{{ Input::old('email')}}">
  </div>
  <!-- <div class="form-group">
 <label for="examplestatus">Status</label>
  <select class="form-control" name="status" id="status">
  <option>Publish</option>
  <option>Unpublish</option>
</select>
</div> -->
<br>
  <button type="submit" class="btn btn-default">Submit</button>
    {!! Form::close() !!}
@stop
