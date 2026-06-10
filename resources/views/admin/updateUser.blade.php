@extends('admin.layout')

@section('content')

<div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
    <form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf
@method('PUT')

    <div class="form-group">
        <label>First Name</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label>User Role</label>
        <select class="form-control" name="role">
            <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Normal User</option>
            <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
        </select>
        @error('role')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <input type="submit" class="btn btn-primary" value="Update">
</form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
@endsection
