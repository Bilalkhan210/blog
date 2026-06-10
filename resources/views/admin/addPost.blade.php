@extends('admin.layout')

@section('content')

<div id="admin-content">
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <h1 class="admin-heading">Add New Post</h1>
            </div>

            <div class="col-md-offset-3 col-md-6">

                <!-- Form -->
                <form action="{{ route('post.store') }}" 
                      method="POST" 
                      enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label>Title</label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               autocomplete="off"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="5"
                                  required></textarea>
                    </div>

                    <div class="form-group">

                        <label>Category</label>

                        <select name="category_id" class="form-control">

                            <option value="">Select Category</option>

                            @foreach ($categories as $category)

                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Post Image</label>

                        <input type="file" name="image" class="form-control">

                    </div>

                    <input type="submit"
                           class="btn btn-primary"
                           value="Save">

                </form>
                <!-- /Form -->

            </div>
        </div>
    </div>
</div>

@endsection