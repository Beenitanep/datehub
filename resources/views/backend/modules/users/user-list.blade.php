@extends('backend/modules/master')
@section('content')
{!! Form::open(array('url' => PREFIX.'users/search','files' => 'true', 'enctype' => 'multipart/form-data' 'method' => 'post')) !!}
<div class="form-group">
    <label for="exampleInputImage">Search By User Name:</label>
    <input type="text" name="title" id="title">
     <button type="submit" class="btn btn-default">Submit</button>
  </div>
{!! Form::close() !!}
@stop