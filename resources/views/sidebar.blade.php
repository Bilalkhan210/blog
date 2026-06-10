
 

 
    <!-- /search box -->
    <!-- recent posts box -->
   <div id="sidebar" class="col-md-4">
    <!-- search box -->
   @include('searchfrom')
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
       
        
       
       @foreach ($posts as $post )
           
       
        <div class="recent-post">
            <a class="post-img" href="">
                <img src="{{ asset('uploads/posts/'.$post->image)}}" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="{{ route('post.show', $post->id)}}">{{ $post->title }}</a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='{{route('category.show', $post->category_id)}}'>{{ $post->category->name }}</a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    {{ $post->created_at }}
                </span>
                <a class="read-more" href="{{ route('post.show', $post->id)}}">read more</a>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /recent posts box -->
</div>





