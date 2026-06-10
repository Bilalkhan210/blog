 @extends('admin.layout')

@section('content')
 <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="{{route('user.create')}}">add user</a>
              </div>
              <div class="row">
                <div class='col-8'>
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                    @endif
                </div>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                          @foreach ($users as $user )
                          <tr>
                                
                          
                                
                         
                              <td class='id'>{{$user->id}}</td>

                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->role}}</td>
                              <td class='edit'><a href='{{route('user.edit', $user->id)}}'><i class="fa-solid fa-pen-to-square"></i></a></td>
                              <td class='delete'>
                               <form action="{{ route('user.destroy', $user->id) }}"
      method="POST"
      onsubmit="return confirm('Are you sure?')"
      style="background:none; padding:0; border:none; box-shadow:none;">

    @csrf
    @method('DELETE')

    <button type="submit"
            style="background:none; padding:0; border:none; cursor:pointer; box-shadow:none;">
        <i class="fa fa-trash"></i>
    </button>

</form>
                            </td>
                            </tr>
                            @endforeach
                       
                      </tbody>
                  </table>
                {{ $users->links() }}
              </div>
          </div>
      </div>
  </div>

@endsection