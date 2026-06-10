@extends('layout')

@section('content')

<div id="main-content">
  <div class="container">
    <div class="row">

      <div class="col-md-8">

        <div class="post-container">

          <h2 class="page-heading">
            Search : {{ $search ?? 'All Posts' }}
          </h2>

          @if($posts->count() > 0)

              @foreach($posts as $post)

              <div class="post-content">
                  <div class="row">

                      <div class="col-md-4">
                          <a class="post-img" href="#">
                              <img src="{{ $post->image }}" alt=""/>
                          </a>
                      </div>

                      <div class="col-md-8">
                          <div class="inner-content clearfix">

                              <h3>
                                  <a href="#">
                                      {{ $post->title }}
                                  </a>
                              </h3>

                              <div class="post-information">

                                  <span>
                                      <i class="fa fa-tags"></i>
                                      {{ $post->category->name ?? '' }}
                                  </span>

                                  <span>
                                      <i class="fa fa-user"></i>
                                      {{ $post->user->name ?? '' }}
                                  </span>

                                  <span>
                                      <i class="fa fa-calendar"></i>
                                      {{ $post->created_at }}
                                  </span>

                              </div>

                              <p class="description">
                                  {{ Str::limit($post->description, 120) }}
                              </p>

                              <a class="read-more pull-right" href="#">
                                  read more
                              </a>

                          </div>
                      </div>

                  </div>
              </div>

              @endforeach

          @else
              <p>No results found</p>
          @endif

          {{-- Pagination --}}
          {{ $posts->links() }}

        </div>

      </div>

   

    </div>
  </div>
</div>

@endsection