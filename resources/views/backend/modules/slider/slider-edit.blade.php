@extends('backend/modules/master')

@section('content')
{!! Form::open(array('url' => PREFIX.'slider/editPost','files' => 'true', 'enctype' => 'multipart/form-data' )) !!}
    	  {{ csrf_field() }}
    	  <input type="hidden" name="id" id="id" value="{{ $editData->id}}">
        <h3>Edit {{ $editData->title }}</h3>
    <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" name="title" class="form-control" id="title" value="{{ $editData->title}}">
  </div>
  <div class="form-group">
    <label for="exampleInputUrl">Url</label>
    <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="{{ $editData->url }}">
  </div>
  <div class="form-group">
 <label for="examplestatus">Status</label>
  <select class="form-control" name="status" id="status">
<option value="Publish" @if($editData->status=="Publish"){{"selected"}}@endif>Publish</option>
  <option value="Unpublish" @if($editData->status=="Unpublish"){{"selected"}}@endif>Un Publish</option>
</select>
 </div>
<br>
  <button type="submit" class="btn btn-default">Submit</button>

{!! Form::close() !!}
@stop