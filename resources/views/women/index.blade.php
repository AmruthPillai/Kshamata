@extends('layouts.app')

@section('content')

<div class="container">
  <h3>Women under the Kshamata System</h3>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sl. No.</th>
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
        <td>{{ $key + 1 }}</td>
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
            {{-- <a type="button" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a> --}}
            <a href="/women/{{ $woman->id }}/delete" type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>

  </table>

</div>

@endsection
