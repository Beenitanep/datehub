@extends('backend/modules/master')

@section('content')
 {!! Form::open(array('url' => PREFIX.'users/addPost','files' => 'true', 'enctype' => 'multipart/form-data' )) !!}
        {{ csrf_field() }}
        <div class="form-group">
    <label for="exampleInputFirstName">First Name</label>
    <input type="text" name="first-name" class="form-control" id="first-name" value="{{ Input::old('first_name')}}">
    @if($errors->any())
    <p>{{ $errors->first('first_name') }}</p>
     @endif
  </div>
  <div class="form-group">
    <label for="exampleInputLastName">Last Name</label>
    <input type="text" name="last-name" class="form-control" id="last-name" value="{{ Input::old('last_name')}}">
    @if($errors->any())
    <p>{{ $errors->first('last_name') }}</p>
     @endif
  </div>
    <div class="form-group">
    <label for="exampleInputUsername">Username</label>
    <input type="text" name="username" class="form-control" id="username" value="{{ Input::old('name')}}">
    @if($errors->any())
    <p>{{ $errors->first('name') }}</p>
     @endif
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="{{ Input::old('email')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword">Password</label>
    <input type="password" class="form-control" name="password" id="password" value="{{ Input::old('password')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword">Confirm Password</label>
    <input type="password" class="form-control" name="confirm-password" id="confirm-password" value="{{ Input::old('password')}}">
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
