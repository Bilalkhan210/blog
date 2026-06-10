@extends('admin.layout')

@section('content')
<div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="{{ route('user.store') }}" method="POST">
    
                    @csrf
                      <div class="form-group">
                          <label> Name</label>
                          <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="First Name" required>
                          @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                        
                      <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Username" required>
                          @error('email')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password"  class="form-control" placeholder="Password" required>
                          @error('password')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0"  {{ old('role') == '0' ? 'selected' : '' }}>Normal User</option>
                              <option value="1"  {{ old('role') == '1' ? 'selected' : '' }}>Admin</option>
                          </select>
                          @error('role')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>

@endsection