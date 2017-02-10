@extends('backend/modules/master')

@section('content')
 {!! Form::open(array('url' => PREFIX.'setting/settingPage','files' => 'true', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal' )) !!}
    	  {{ csrf_field() }}
        <h3>General Setting</h3>
  <div class="form-group">
    <label for="sitetitle" class="col-sm-2 control-label">Site Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="site-title" name="site-title" value="@if(!empty($data->site_title)){{$data->site_title}}@else{{ Input::old('site-title')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('title') }}</p>
     @endif
    </div>
  </div>

<div class="form-group">
    <label for="tagline" class="col-sm-2 control-label">Tagline</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tagline" name="tagline"  value="
      @if(!empty($data->tagline)){{$data->tagline}}@else{{ Input::old('tagline')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('tagline') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="siteaddress" class="col-sm-2 control-label">Site Address (URl)</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="site-address" name="site-address"  value="
      @if(!empty($data->  site_address)){{$data-> site_address}}@else{{ Input::old('site-address')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('site-address') }}</p>
     @endif
    </div>
  </div>

 <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email Address</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email"  value="
@if(!empty($data->email)){{$data->email}}@else{{ Input::old('email')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('email') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="phoneone" class="col-sm-2 control-label">Phone 1</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="phone-one" name="phone-one"  value="
@if(!empty($data['phone-one'])){{$data['phone-one']}}@else{{ Input::old('phone-one')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('phone-one') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="phonetwo" class="col-sm-2 control-label">Phone 2</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="phone-one" name="phone-two"  value="
@if(!empty($data['phone-two'])){{$data['phone-two']}}@else{{Input::old('phone-two')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('phone-two') }}</p>
     @endif
    </div>
  </div>


  <div class="form-group">
    <label for="mobilenumber" class="col-sm-2 control-label">Mobile Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="mobile-number" name="mobile-number"  value="
@if(!empty($data['mobile-number'])){{$data['mobile-number']}}@else{{ Input::old('mobile-number')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('mobile-number') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="facebook" class="col-sm-2 control-label">Facebook</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="facebook" name="facebook"  value="
@if(!empty($data->facebook)){{$data->facebook}}@else{{ Input::old('facebook')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('facebook') }}</p>
     @endif
    </div>
  </div>

   <div class="form-group">
    <label for="twitter" class="col-sm-2 control-label">Twitter</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="twitter" name="twitter"  value="
@if(!empty($data->twitter)){{$data->twitter}}@else{{ Input::old('twitter')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('twitter') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="linkedin" class="col-sm-2 control-label">LinkedIn</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="linkedin" name="linkedin"  value="
@if(!empty($data->linkedin)){{$data->linkedin}}@else{{ Input::old('linkedin')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('linkedin') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="youtube" class="col-sm-2 control-label">Youtube</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="youtube" name="youtube"  value="
@if(!empty($data->youtube)){{$data->youtube}}@else{{ Input::old('youtube')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('youtube') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="instagram" class="col-sm-2 control-label">Instagram</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="instagram" name="instagram"  value="
@if(!empty($data->instagram)){{$data->instagram}}@else{{ Input::old('instagram')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('instagram') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="skype" class="col-sm-2 control-label">Skype</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="skype" name="skype"  value="
@if(!empty($data->skype)){{$data->skype}}@else{{ Input::old('skype')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('skype') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="latitude" class="col-sm-2 control-label">Latitude</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="latitude" name="latitude"  value="
@if(!empty($data->latitude)){{$data->latitude}}@else{{ Input::old('latitude')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('latitude') }}</p>
     @endif
    </div>
  </div>

 <div class="form-group">
    <label for="longitude" class="col-sm-2 control-label">Longitude</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="longitude" name="longitude"  value="
@if(!empty($data->longitude)){{$data->longitude}}@else{{ Input::old('longitude')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('longitude') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="contactaddress" class="col-sm-2 control-label">Contact Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="contact-address" name="contact-address"  value="
@if(!empty($data['contact-address'])){{$data['contact-address']}}@else{{ Input::old('contact-address')}}@endif">
      @if($errors->any())
    <p>{{ $errors->first('contact-address') }}</p>
     @endif
    </div>
  </div>

<br>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
    {!! Form::close() !!}
@stop
