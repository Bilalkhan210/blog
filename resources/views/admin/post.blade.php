@extends('admin.layout')

@section('content')
<div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="{{route('post.create')}}">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                         @foreach ($posts as $post )
                             
                        
                          <tr>
                              <td class='id'> {{$post->id}}</td>
                              <td>{{$post->title}}</td>
                              <td>{{$post->category->name}}</td>
                              <td>{{$post->created_at}}</td>
                              <td>{{$post->user->name}}</td>
                              <td class='edit'><a href='{{route('post.edit', $post->id)}}'><i class='fa fa-edit'></i></a></td>


                              <td class='delete'>
                                
                                
                            
<form action="{{ route('post.destroy', $post->id) }}"
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
                                 {{ $posts->links() }}

              </div>
          </div>
      </div>
  </div>
@endsection