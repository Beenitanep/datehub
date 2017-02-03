@extends('backend/modules/master')

@section('content')
{!! Form::open(array('url' => PREFIX.'menu/editPost','files' => 'true', 'enctype' => 'multipart/form-data' )) !!}
    	  {{ csrf_field() }}
    	  <input type="hidden" name="id" id="id" value="{{ $editData->id}}">
        <h3>Edit {{ $editData->name }}</h3>
    <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" name="name" class="form-control" id="name" value="{{ $editData->name}}">
  </div>
  <div class="form-group">
    <label for="exampleInputSlug">Slug</label>
    <input type="text" class="form-control" name="slug" id="slug" value="{{ $editData->slug}}">
  </div>
  <div class="form-group">
    <label for="exampleInputparentid">Parent Id</label>
    <input type="text" class="form-control" name="parentid" id="parentid" value="{{ $editData->parent_id}}">
  </div>
  <div class="form-group">
    <label for="exampleInputparentid">Position</label>
    <input type="text" class="form-control" name="position" id="position" value="{{ $editData->position}}">
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