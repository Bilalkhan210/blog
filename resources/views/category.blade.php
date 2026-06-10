

@extends('layout')

@section('content')
                <!-- post-container -->
                <div class="post-container">
                  <h2 class="page-heading">
    {{ $posts->first()->category->name ?? 'Category' }}
</h2>
                    
                   
                    
                   
                   @foreach ($posts as $post )
                       
                   
                   <div class="post-content">
                       <div class="row">
                           
                            <div class="col-md-4">
                                <a class="post-img" href="{{route('post.show', $post->id)}}"><img src="{{ asset('uploads/posts/'.$post->image)}}" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='{{route('post.show', $post->id)}}'>{{ $post->title }}</a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='{{route('category.show', $post->category_id)}}'>{{ $post->category->name }}</a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='{{route('author.show', $post->user_id)}}'>{{ $post->user->name }}</a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            {{ $post->created_at }}
                                        </span>
                                    </div>
                                    <p class="description">
                                        {{ $post->description }}
                                        </p>
                                    <a class='read-more pull-right' href='{{route('post.show', $post->id)}}'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                     @endforeach
                   {{ $posts->links() }}
                </div><!-- /post-container -->

                @endsection
        

