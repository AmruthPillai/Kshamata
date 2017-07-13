@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-2">
      <img src="{{ asset('images/blank_woman_avatar.png') }}" alt="Woman Avatar" class="img-responsive">
    </div>
    <div class="col-md-10">
      <h2>{{ $woman->name }}</h2>

      <div class="col-md-3">
        <div class="row">
          <h6>Date of Birth:</h6>
        </div>
        <div class="row">
          {{ $woman->dob->format('d M Y') }}
        </div>

        <div class="row">
          <h6>Date of Joining:</h6>
        </div>
        <div class="row">
          {{ $woman->created_at->format('d M Y') }}
        </div>
      </div>
      <div class="col-md-3">
        <div class="row">
          <h6>Skills:</h6>
        </div>
        <div class="row">
          @foreach (unserialize($woman->skills) as $key => $value)
            <span class="label label-primary">{{ $value }}</span><br>
          @endforeach
        </div>
      </div>
      <div class="col-md-6">
        <div class="row">
          <h6>Last Known Location:</h6>
        </div>
        <div class="row">
          <div style="width: 100%; height: 150px;">
            {!! Mapper::render() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>
</div>

@endsection
