@extends('layouts.frontend.app')
@section('content')
<!-- Start top-section Area -->
    <section class="top-section-area section-gap">
      <div class="container">
        <div class="row justify-content-between align-items-center d-flex">
          <div class="col-lg-8 top-left">
            <h1 class="text-white mb-20">All Post of Tag</h1>
            <ul>
              <li>
                <a href="index.html">Home</a
                ><span class="lnr lnr-arrow-right"></span>
              </li>
              <li>
                <a href="category.html">Category</a
                ><span class="lnr lnr-arrow-right"></span>
              </li>
              <li><a href="single.html">Posts</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- End top-section Area -->

    <div class="post-wrapper pt-100">
      <!-- Start post Area -->
      <section class="post-area">
        <div class="container">
          <div class="row justify-content-center d-flex">
            <div class="col-lg-8">
              <div class="top-posts pt-50">
                <div class="container">
                  <div class="row justify-content-center">

                    @if ($tags->count() > 0)

                    @foreach ($tags as $tag)
                        <div class="single-tags col-lg-6 col-sm-6">
                      <img class="img-fluid" src="{{ asset('storage/tag/'. $tag->post->image) }}" alt="{{ $tag->post->image }}" />
                      <div class="date mt-20 mb-20">{{ $tag->post->created_at->format('D, d m y H:i') }}</div>
                      <div class="detail">
                        <a href="{{ route('tag', $tag->post->slug) }}"
                          ><h4 class="pb-20">
                            {{ $tag->post->title }}
                          </h4></a
                        >
                        <p>
                          {!! Str::limit($tag->post->body, 100) !!}
                        </p>
                        <p class="footer pt-20">
                          <i class="fa fa-heart-o" aria-hidden="true"></i>
                          <a href="#">06 Likes</a>
                          <i
                            class="ml-20 fa fa-comment-o"
                            aria-hidden="true"
                          ></i>
                          <a href="#">02 Comments</a>
                        </p>
                      </div>
                    </div>
                    @endforeach
                    @else 
                    <h1>No Posts Available</h1>
                    @endif
                  </div>
                  <div class="justify-content-center d-flex mt-5 mb-5">
                    {{ $tags->appends(Request::all())->links() }}
                  </div>
                </div>
              </div>
            </div>
            @include('layouts.frontend.partials.sidebar')
          </div>
        </div>
      </section>
      <!-- End post Area -->
    </div>
@endsection