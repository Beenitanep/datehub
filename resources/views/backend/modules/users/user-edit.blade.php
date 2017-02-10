@extends('backend/modules/master')

@section('content')
{!! Form::open(array('url' => PREFIX.'users/editPost','files' => 'true', 'enctype' => 'multipart/form-data' )) !!}
    	  {{ csrf_field() }}
    	  <input type="hidden" name="id" id="id" value="{{ $editData->id}}">
        <h3>Edit {{ $editData->name }} Data</h3>
        <div class="form-group">
    <label for="exampleInputFirstName">First Name</label>
    <input type="text" name="first-name" class="form-control" id="first-name" value="{{ $editData->first_name}}">
  </div>
  <div class="form-group">
    <label for="exampleInputLastName">Last Name</label>
    <input type="text" name="last-name" class="form-control" id="last-name" value="{{ $editData->last_name}}">
  </div>
  <div class="form-group">
    <label for="exampleInputUsername">Username</label>
    <input type="text" name="username" class="form-control" id="username" value="{{ $editData->name}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="{{ $editData->email}}">
  </div>
  <!-- <div class="form-group">
    <label for="exampleInputPassword">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword">Confirm Password</label>
    <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="confirm password">
  </div> -->

    
  <!-- <div class="form-group">
 <label for="examplestatus">Status</label>
  <select class="form-control" name="status" id="status">
<option value="Publish" @if($editData->status=="Publish"){{"selected"}}@endif>Publish</option>
  <option value="Unpublish" @if($editData->status=="Unpublish"){{"selected"}}@endif>Un Publish</option>
</select>
 </div> -->
<br>
  <button type="submit" class="btn btn-default">Submit</button>

{!! Form::close() !!}
@stop