@extends('backend/modules/master')

@section('content')
 {!! Form::open(array('url' => PREFIX.'setting/settingPage','files' => 'true', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal' )) !!}
    	  {{ csrf_field() }}
        <h3>General Setting</h3>
  <div class="form-group">
    <label for="sitetitle" class="col-sm-2 control-label">Site Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="site-title" name="site-title" value="{{ Input::old('site-title')}}">
      @if($errors->any())
    <p>{{ $errors->first('title') }}</p>
     @endif
    </div>
  </div>

<div class="form-group">
    <label for="tagline" class="col-sm-2 control-label">Tagline</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tagline" name="tagline"  value="{{ Input::old('tagline')}}">
      @if($errors->any())
    <p>{{ $errors->first('tagline') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="siteaddress" class="col-sm-2 control-label">Site Address (URl)</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="site-address" name="site-address"  value="{{ Input::old('site-address')}}">
      @if($errors->any())
    <p>{{ $errors->first('site-address') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email Address</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email"  value="{{ Input::old('email')}}">
      @if($errors->any())
    <p>{{ $errors->first('email') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="phoneone" class="col-sm-2 control-label">Phone 1</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="phone-one" name="phone-one"  value="{{ Input::old('phone-one')}}">
      @if($errors->any())
    <p>{{ $errors->first('phone-one') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="phonetwo" class="col-sm-2 control-label">Phone 2</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="phone-one" name="phone-two"  value="{{ Input::old('phone-two')}}">
      @if($errors->any())
    <p>{{ $errors->first('phone-two') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="mobilenumber" class="col-sm-2 control-label">Mobile Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="mobile-number" name="mobile-number"  value="{{ Input::old('mobile-number')}}">
      @if($errors->any())
    <p>{{ $errors->first('mobile-number') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="facebook" class="col-sm-2 control-label">Facebook</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="facebook" name="facebook"  value="{{ Input::old('facebook')}}">
      @if($errors->any())
    <p>{{ $errors->first('facebook') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="twitter" class="col-sm-2 control-label">Twitter</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="twitter" name="twitter"  value="{{ Input::old('twitter')}}">
      @if($errors->any())
    <p>{{ $errors->first('twitter') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="linkedin" class="col-sm-2 control-label">LinkedIn</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="linkedin" name="linkedin"  value="{{ Input::old('linkedin')}}">
      @if($errors->any())
    <p>{{ $errors->first('linkedin') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="youtube" class="col-sm-2 control-label">Youtube</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="youtube" name="youtube"  value="{{ Input::old('youtube')}}">
      @if($errors->any())
    <p>{{ $errors->first('youtube') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="instagram" class="col-sm-2 control-label">Instagram</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="instagram" name="instagram"  value="{{ Input::old('instagram')}}">
      @if($errors->any())
    <p>{{ $errors->first('instagram') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="skype" class="col-sm-2 control-label">Skype</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="skype" name="skype"  value="{{ Input::old('skype')}}">
      @if($errors->any())
    <p>{{ $errors->first('skype') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="latitude" class="col-sm-2 control-label">Latitude</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="latitude" name="latitude"  value="{{ Input::old('latitude')}}">
      @if($errors->any())
    <p>{{ $errors->first('latitude') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="longitude" class="col-sm-2 control-label">Longitude</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="longitude" name="longitude"  value="{{ Input::old('longitude')}}">
      @if($errors->any())
    <p>{{ $errors->first('longitude') }}</p>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="contactaddress" class="col-sm-2 control-label">Contact Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="contact-address" name="contact-address"  value="{{ Input::old('contact-address')}}">
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
