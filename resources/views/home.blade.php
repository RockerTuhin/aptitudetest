@extends('layouts.app')

@section('title','All Jobs')

@section('content')

@if (session('apply_status'))
    <div class="alert alert-success">
        {{ session('apply_status') }}
    </div>
@endif

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($allJobs as $singleJob)
        <div class="post-preview">
          <a href="{{ route('view_job',$singleJob->id) }}">
            <h2 class="post-title">
              {{ $singleJob->job_title }}
            </h2>
            <h3 class="post-subtitle">
              {{ $singleJob->business_name }}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="">{{ $singleJob->first_name.' '.$singleJob->last_name }}</a>
            {{ $singleJob->created_at }}</p>
        </div>
        <hr>
        @endforeach
        <!-- Pager -->
        @php
          $nPU = (string)$allJobs->nextPageUrl();
          $pPU = (string)$allJobs->previousPageUrl();
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
  </div>

@endsection
