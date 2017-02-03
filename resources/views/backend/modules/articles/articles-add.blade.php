@extends('backend/modules/master')

@section('content')
 {!! Form::open(array('url' => PREFIX.'articles/pages/articles/addPost','files' => 'true', 'enctype' => 'multipart/form-data' )) !!}
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
   <div class="form-group">
    <label for="exampleInputImage">Image</label>
    <input type="file" name="image" id="image">
     @if($errors->any())
    <p>{{ $errors->first('image') }}</p>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputUrl">Author</label>
    <input type="text" class="form-control" name="author" id="author" value="{{ Input::old('author')}}">
  </div>
<div class="form-group">
<label for="examplearticlecategory">Category</label>
@foreach ($articleCategoryDate as $category)
<div class="checkbox">
  <label>
    <input type="checkbox" name="tags[]" value="{{ $category->id }}">
    {{ $category->title }}
  </label>
</div>
 @endforeach
</div>


  <div class="form-group">
    <label for="exampleInputDescription">Description</label>
   <textarea id="article-ckeditor" class="form-control" name="description" rows="3"></textarea>
  </div>
  <div class="form-group">
  <label for="exampleInputPublishDate">Publish Date</label>
                <div class='input-group date' id='datetimepicker1' value="{{ Input::old('publish_date')}}">
                    <input type='text' class="form-control" name="publish-date" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
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
