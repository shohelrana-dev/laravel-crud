@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3>Create Student</h3>
                <a class="btn btn-light" href="{{ route('student.index') }}">{{ __('Back To Student List') }}</a>
            </div>
            <div class="card-body">
            <form action="{{ route('student.store') }}" method="POST">
              @if ($errors->all())
                  <div class="alert alert-success">
                    @foreach ($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                  </div>
              @endif
              @if (Session::has('success'))
                  <div class="alert alert-success">{{ Session::get('success') }}</div>
              @endif
              @if (Session::has('unsuccess'))
                  <div class="alert alert-danger">{{ Session::get('unsuccess') }}</div>
              @endif
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary">Save Student</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection