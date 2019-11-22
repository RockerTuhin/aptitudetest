@extends('company.layouts.app')

@section('content')

  <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">All Applied Applicants</li>
        </ol>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($appliedCandidates as $appliedCandidate)
            <div class="post-preview">
              <a href="{{ route('view_applicant',$appliedCandidate->user_id) }}">
                <h2 class="post-title">
                  {{ $appliedCandidate->first_name.' '.$appliedCandidate->last_name }}
                </h2>
                <h3 class="post-subtitle">
                  Applied on:- {{ $appliedCandidate->job_title }}
                </h3>
              </a>
            </div>
            <hr>
            @endforeach
            @php
              $nPU = (string)$appliedCandidates->nextPageUrl();
              $pPU = (string)$appliedCandidates->previousPageUrl();
            @endphp
            @if($nPU != Null)
              <div class="clearfix">
                <a class="btn btn-primary float-right" href="{{ $nPU }}">Older Jobs &rarr;</a>
              </div>
            @endif
            @if($pPU != Null)
              <div class="clearfix">
                <a class="btn btn-primary float-left" href="{{ $pPU }}">Newer Jobs &larr;</a>
              </div>
            @endif
          </div>
        </div>

@endsection
