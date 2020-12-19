@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3>All Students</h3>
                <a class="btn btn-light" href="{{ route('student.create') }}">{{ __('Create Student') }}</a>
            </div>
            <div class="card-body">
              @if (Session::has('success'))
                  <div class="alert alert-success">{{ Session::get('success') }}</div>
              @endif
              @if ($students->count())
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($students as $student)
                      <tr>
                        <td>{{ $student->id }}</th>
                        <td>{{ $student->name }}</th>
                        <td>{{ $student->email }}</th>
                        <td>
                          <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a> 
                          <span>||</span>
                          <a href="{{ route('student.delete', $student->id) }}"class="btn btn-danger btn-sm">Delete</a>
                        </th>
                      </tr>
                    @endforeach
                  </thead>
                </table>
              @else
                <h3 class="text-center">Student Data Not Found</h3>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection