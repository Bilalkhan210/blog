@extends('admin.layout')

@section('content')

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="{{route('category.create')}}">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category )
                        <tr>
                            <td class='id'>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            
                            <td class='edit'><a href='{{route('category.edit', $category->id)}}'><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td class='delete'>
                                   <form action="{{ route('category.destroy', $category->id) }}"
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
                              {{ $categories->links() }}

            </div>
        </div>
    </div>
</div>
@endsection