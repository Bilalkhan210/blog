 @extends('layout')

 @section('content')
 
 <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                      
                
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3>{{ $post->title }}</h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    {{ $post->category->name }}
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
                            <img class="single-feature-image" src="{{ asset('uploads/posts/'.$post->image)}}" alt=""/>
                            <p class="description">
                                {{ $post->description }}
                            </p>
                        </div>
                    </div>
                    <!-- /post-container -->
                </div>
                @include('sidebar')
            </div>
        </div>
    </div>

    @endsection