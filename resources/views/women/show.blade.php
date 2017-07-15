@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-2">
      <br>
      <img src="/storage/{{ $woman->photo }}" alt="Woman Avatar" class="img-responsive">
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

      @if ($woman->trackRecords->first())
      <div class="col-md-6">
        <div class="row">
          <h6>Last Known Location:</h6>
        </div>
        <div class="row">
          <div style="width: 100%; height: 150px;">
            {!! Mapper::render(1) !!}
          </div>
        </div>
      </div>
      @endif

    </div>
  </div>

  <hr>

  <h4>
    <span>TRACK RECORDS</span>
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#createTrackRecordModal">Add New</button>
  </h4>
  <br>
  @if ($woman->trackRecords())
    <p>No track records found at the moment.</p>
  @endif

  @foreach ($woman->trackRecords as $key => $tr)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <h6>Recorded Date: {{ $tr->created_at }}</h6>
              <h5>Track #{{ $tr->id }}</h5>
            </div>
            <div class="col-md-4">
              <h6>Employer Name: {{ $tr->employer_name }}</h6>
              <h5>Salary: ₹{{ number_format($tr->salary, 2) }}</h5>
            </div>
            <div class="col-md-4">
              <h6>Recoded Location:</h6>
              <h5>{{ $latlng[0] }}, {{ $latlng[1] }}</h5>
            </div>
          </div>
        </div>

      </div>
    </div>
  @endforeach
</div>

<!-- Modal -->
<div id="createTrackRecordModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create a new Track Record <br>for {{ $woman->name }}</h4>
            </div>
            <form class="form" action="/women" method="post" role="form" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="employer_name">Employer Name</label>
                        <input type="text" name="employer_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="number" name="salary" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="employer_name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection
