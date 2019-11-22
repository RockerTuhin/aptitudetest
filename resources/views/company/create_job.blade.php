@extends('company.layouts.app')

@section('content')
<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Create Job</div>
      <div class="card-body">
        <form method="POST" action="{{ route('post_job') }}">
            @csrf
          <div class="form-group">
          	<input type="hidden" name="company_id" value="{{ Auth::user()->id }}">
            <div class="form-label-group">
                <input id="job_title" type="job_title" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" required autocomplete="job_title">

                @error('job_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <label for="inputEmail">Job Title</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <textarea class="form-control" name="job_description" placeholder="Job Description"></textarea>

                @error('job_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <input id="location" type="location" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location">

                @error('location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="inputEmail">Location</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">

                    <input id="salary" type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" required autocomplete="salary" autofocus>

                    @error('salary')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <label for="firstName">Salary</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                    <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>

                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <label for="lastName">Country</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Post Job</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ route('company_home') }}">Back</a>
        </div>
      </div>
    </div>
  </div>

@endsection
