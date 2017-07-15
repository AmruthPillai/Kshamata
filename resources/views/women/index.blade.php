@extends('layouts.app')

@section('content')

<div class="container">
    <h3>
        <span>Women under the Kshamata System</span>
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#createWomanModal">Add New</button>
    </h3>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Skills</th>
        <th>Joining Date &amp; Time</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($women as $key => $woman)
      <tr>
        <td><strong>{{ $woman->id }}</strong></td>
        <td>{{ $woman->name }}</td>
        <td>{{ $woman->dob->format('d M Y') }}</td>
        <td>
          @foreach (unserialize($woman->skills) as $key => $value)
            <span class="label label-primary">{{ $value }}</span>
          @endforeach
        </td>
        <td>{{ $woman->created_at->format('d M Y H:m A') }}</td>
        <td>
          <div class="btn-group">
            <a href="/women/{{ $woman->id }}" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
            <a href="/women/{{ $woman->id }}/delete" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>

  </table>

</div>

<!-- Modal -->
<div id="createWomanModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create a new Woman into the Kshamata System</h4>
      </div>
      <form class="form" action="/women" method="post" role="form" enctype="multipart/form-data">
      <div class="modal-body">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="skills">Skills</label>
            <input type="text" name="skills" class="form-control">
            <span class="help-block">If there is more than one, seperate them using commas.</span>
          </div>
          <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo">
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
