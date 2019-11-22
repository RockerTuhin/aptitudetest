@extends('layouts.app')

@section('title','Update Profile')

@section('content')

@if (session('apply_status'))
    <div class="alert alert-danger">
        {{ session('apply_status') }}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update_profile') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="pro_pic" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <input id="pro_pic" type="file" class="form-control" name="pro_pic" autocomplete="pro_pic" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="resume" class="col-md-4 col-form-label text-md-right">{{ __('CV') }}</label>

                            <div class="col-md-6">
                                <input id="resume" type="file" class="form-control" name="resume"autocomplete="resume" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="skills" class="col-md-4 col-form-label text-md-right">{{ __('Skills') }}</label>

                            <div class="col-md-6">
                                <textarea id="skills" type="text" class="form-control" name="skills"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Profile') }}</div>

                <div class="card-body">
                        <div class="row">
                        	<div class="col-md-6">
                        		<label>Photo</label><br>
                        		@if(Auth::user()->pro_pic)
                        		<img src="{{ Auth::user()->pro_pic }}" height="180px" width="180px">
                        		@endif
                        	</div>
                        	<div class="col-md-6">
                        		<label>Skills</label>
                        		@if(Auth::user()->skills)
                        		<p>{{ Auth::user()->skills }}</p>
                        		@endif
                        	</div>

                        </div>

                        <label>Resume</label><br>
                        @if(Auth::user()->resume)
                        <iframe src="{{ Auth::user()->resume }}" height="585px" width="500px"></iframe>
                        @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
