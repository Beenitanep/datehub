@extends('backend/modules/master')
@section('content')
<h1>View Your Profile</h1>  
<div class="row">
<div class="col-md-12">
  <div class="col-md-2">Username:</div>
  <div class="col-md-4">{{ $profile->user_name }}</div>
</div>
<div class="col-md-12">
  <div class="col-md-2">Email:</div>
  <div class="col-md-4">{{ $profile->email }}</div>
  </div>
</div>
@stop