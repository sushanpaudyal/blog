@extends('layouts.frontend.app')

@section('title')
  {{ $tag->name }} Posts
@endsection


@push('css')

    <link href="{{asset('assets/frontend/css/category/css/styles.css')}}" rel="stylesheet">

    <link href="{{asset('assets/frontend/css/category/css/responsive.css')}}" rel="stylesheet">


    <style>

        .favorite_posts{
            color: blue;
        }
    </style>
    @endpush


@section('content')


    <div class="slider display-table center-text " style="background-image: url({{asset('assets/frontend/images/category.jpg')}});">
        <h1 class="title display-table-cell"><b> {{ $tag->name }}</b></h1>
    </div><!-- slider -->


    <section class="blog-area section">
        <div class="container">

            <div class="row">

                @if($tag->posts->count() > 0)
                @foreach($posts as  $post)

                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url('post/'.$post->image) }}" alt="{{$post->title}}"></div>

                                <a class="avatar" href="{{ route('author.profile', $post->user->username) }}"><img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="Profile Image"></a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="{{route('post.details', $post->slug)}}"><b>{{$post->title}}</b></a></h4>

                                    <ul class="post-footer">
                                        @guest
                                            <li><a href="javascript:void(0)" onclick="toastr.info('To add Favorite List. You need to login first.', 'Info', {
                                            closeButton : true,
                                            progressBar: true,
                                        })"><i class="ion-heart"></i>{{$post->favorite_to_users->count()}}</a></li>
                                        @else
                                            <li><a href="javascript:" onclick="document.getElementById('favorite-form-{{$post->id}}').submit();" class="{{ !Auth::user()->favorite_posts->where('pivot.post_id', $post->id)->count() == 0 ? 'favorite_posts' : '' }}"><i class="ion-heart"></i>{{$post->favorite_to_users->count()}}</a>
                                                <form id="favorite-form-{{ $post->id }}" action="{{ route('post.favorite', $post->id) }}"method="post" style="display: none;">
                                                    @csrf

                                                </form>
                                            </li>
                                        @endguest
                                        <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{$post->view_count}}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->


                    @endforeach

                    @else
                      <p> No Post Under This Category</p>
                    @endif

            </div><!-- row -->


        </div><!-- container -->
    </section><!-- section -->


    @endsection


