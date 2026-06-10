@extends('admin.layout')

@section('content')

<div id="admin-content">
  <div class="container">

    <div class="row">

      <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
      </div>

      <div class="col-md-offset-3 col-md-6">

        <form action="{{ route('post.update', $post->id) }}" 
              method="POST" 
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Title</label>
                <input type="text" 
                       name="title" 
                       value="{{ $post->title }}" 
                       class="form-control">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5">
                    {{ $post->description }}
                </textarea>
            </div>

            <div class="form-group">
                <label>Category</label>

                <select class="form-control" name="category_id">

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}"
                            {{ $post->category_id == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">
                <label>Post Image</label>

                <input type="file" name="image">

                <br>

                <img src="{{ asset('uploads/posts/'.$post->image) }}" height="120px">

                <input type="hidden" name="old_image" value="{{ $post->image }}">
            </div>

            <input type="submit" class="btn btn-primary" value="Update">

        </form>

      </div>

    </div>

  </div>
</div>

@endsection