@extends('layout')

@section('content')


<div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                
                
              <div class="post-container">

    @if($posts->count() > 0)
        <h2 class="page-heading">{{ $posts[0]->user->name }}</h2>
    @endif

    @foreach ($posts as $post )

    <div class="post-content">
        <div class="row">
            <div class="col-md-4">
                <a class="post-img" href="{{ route('post.show', $post->id) }}">
                    <img src="{{ asset('uploads/posts/'.$post->image) }}" alt=""/>
                </a>
            </div>

            <div class="col-md-8">
                <div class="inner-content clearfix">

                    <h3>
                        <a href='{{ route('post.show', $post->id) }}'>
                            {{ $post->title }}
                        </a>
                    </h3>

                    <div class="post-information">

                        <span>
                            <i class="fa fa-tags"></i>

                            <a href='{{ route('category.show', $post->category_id) }}'>
                                {{ $post->category->name }}
                            </a>
                        </span>

                        <span>
                            <i class="fa fa-user"></i>

                            <a href='{{ route('author.show', $post->user_id) }}'>
                                {{ $post->user->name }}
                            </a>
                        </span>

                        <span>
                            <i class="fa fa-calendar"></i>
                            {{ $post->created_at }}
                        </span>

                    </div>

                    <p class="description">
                        {{ $post->description }}
                    </p>

                    <a class='read-more pull-right'
                       href='{{ route('post.show', $post->id) }}'>
                       read more
                    </a>

                </div>
            </div>
        </div>
    </div>

    @endforeach

</div>

                
            </div>
           
        </div>
      </div>
    </div>

    @endsection
