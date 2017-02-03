@extends('backend/modules/master')

@section('content')
{!! Form::open(array('url' => PREFIX.'articles/pages/category/editPost','files' => 'true', 'enctype' => 'multipart/form-data' )) !!}
        {{ csrf_field() }}
        <input type="hidden" name="id" id="id" value="{{ $articlesCategoryData->id}}">
        <h3>Edit {{ $articlesCategoryData->title }}</h3>
    <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" name="title" class="form-control" id="title" value="{{ $articlesCategoryData->title}}">
  </div>
  <div class="form-group">
    <label for="exampleInputSlug">Slug</label>
    <input type="text" name="slug" class="form-control" id="slug" value="{{ $articlesCategoryData->slug}}">
  </div>
<br>
  <button type="submit" class="btn btn-default">Submit</button>

{!! Form::close() !!}
@stop