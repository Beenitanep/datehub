@extends('backend/modules/master')

@section('content')
{!! Form::open(array('url' => PREFIX.'articles/pages/articles/editPost','files' => 'true', 'enctype' => 'multipart/form-data' )) !!}
        {{ csrf_field() }}
        <input type="hidden" name="id" id="id" value="{{ $articleData->id}}">
        <h3>Edit {{ $articleData->title }}</h3>
    <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text" name="title" class="form-control" id="title" value="{{ $articleData->title}}">
  </div>
  <div class="form-group">
    <label for="exampleInputSlug">Slug</label>
    <input type="text" name="slug" class="form-control" id="slug" value="{{ $articleData->slug}}">
  </div>
   <div class="form-group">
    <label for="exampleInputImage">Image</label><br>
   <?php 
   if($articleData->image!= ''){?>
<a type="button" onclick="return hs.expand(this)" class="btn btn-info highslide" href="{{URL::asset('uploads/article/thumb/'.$articleData->image)}}">View Previous</a>
  <a type="button" class="btn btn-danger" href="{{ URL::to(PREFIX. 'articles/pages/articles/deleteImage')}}?id=<?php echo $articleData->id?>" onClick="Javascript: return confirm('Are you sure you want to remove')">Remove</a>
   <?php }else{ ?>
    <input type="file" name="image" id="image"> 
     <p>{{ $errors->first('image') }}</p>
   <?php }?>
   
  </div>
  <div class="form-group">
    <label for="exampleInputAuthor">Author</label>
    <input type="text" class="form-control" name="author" id="author" value="{{ $articleData->author }}">
  </div>
  <div class="form-group">
<label for="examplearticlecategory">Category</label>
<?php $tagsExplode = explode(',',$articleData->tags);?>
@foreach ($articleCategoryData as $category)
<div class="checkbox">
  <label>
                                                        <input type="checkbox" class="minimal" name="tags[]" value="{{ $category->id}}"
                                                        <?php for($i=0;$i<count($tagsExplode);$i++){ 
                                                          if($tagsExplode[$i]==$category->id):echo "checked";endif;}?>
                                                        >{{ $category->title}}
                                                    </label>
</div>
 @endforeach
</div>
<div class="form-group">
    <label for="exampleInputDescription">Description</label>
   <textarea id="article-ckeditor" class="form-control" name="description" rows="3">{{ $articleData->description}}</textarea>
  </div>
   <div class="form-group">
  <label for="exampleInputPublishDate">Publish Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="publish-date" value="{{ $articleData->publish_date}}"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
  <div class="form-group">
 <label for="examplestatus">Status</label>
  <select class="form-control" name="status" id="status">
<option value="Publish" @if($articleData->status=="Publish"){{"selected"}}@endif>Publish</option>
  <option value="Unpublish" @if($articleData->status=="Unpublish"){{"selected"}}@endif>Un Publish</option>
</select>
 </div>
<br>
  <button type="submit" class="btn btn-default">Submit</button>

{!! Form::close() !!}
@stop