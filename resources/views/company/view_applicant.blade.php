@extends('company.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('View Applicant') }}</div>

                <div class="card-body">
                		<div class="row">
                        	<div class="col-md-6">
                        		<label>Name</label><br>
                        		@if($viewApplicant->first_name)
                        		<p>{{ $viewApplicant->first_name.'' }}
                        		@endif
                        		@if($viewApplicant->last_name)
                        		{{ $viewApplicant->last_name }}
                        		</p>
                        		@endif
                        	</div>
                        	<div class="col-md-6">
                        		<label>Email</label>
                        		@if($viewApplicant->email)
                        		<p>{{ $viewApplicant->email }}</p>
                        		@endif
                        	</div>

                        </div>
                        <div class="row">
                        	<div class="col-md-6">
                        		<label>Photo</label><br>
                        		@if($viewApplicant->pro_pic)
                        		<img src="/aptitudeTest/public/{{ $viewApplicant->pro_pic }}" height="180px" width="180px">
                        		@endif
                        	</div>
                        	<div class="col-md-6">
                        		<label>Skills</label>
                        		@if($viewApplicant->skills)
                        		<p>{{ $viewApplicant->skills }}</p>
                        		@endif
                        	</div>

                        </div>

                        <label>Resume</label><br>
                        @if($viewApplicant->resume)
                        <iframe src="/aptitudeTest/public/{{ $viewApplicant->resume }}" height="800px" width="800px"></iframe>
                        @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection