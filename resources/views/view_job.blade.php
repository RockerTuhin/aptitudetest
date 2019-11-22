@extends('layouts.app')

@section('title',$viewJob->job_title)

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <h5>{{ $viewJob->job_title }}</h5>
      <h6>{{ $viewJob->business_name }}</h6>
      <h5>Salary</h5>
      <p>{{ $viewJob->salary }}</p>
      <h5>Job Location</h5>
      <p>{{ $viewJob->location }}</p>
      <h5>Country</h5>
      <p>{{ $viewJob->country }}</p>
      <h5>Job Description</h5>
      {!! htmlspecialchars_decode($viewJob->job_description) !!}
      <br><br>
      <form method="POST" action="{{ route('apply_job') }}">
      	@csrf
      	<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      	<input type="hidden" name="job_id" value="{{ $viewJob->id }}">
      	<button class="btn btn-primary" type="submit">apply</button>
      </form>
      
    </div>
  </div>
</div>
@endsection