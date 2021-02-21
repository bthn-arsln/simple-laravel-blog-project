@extends('layouts.master')
@section('title', 'Post')
@section('banner')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-8 col-md-10">
                    <div class="post-heading">
                        <h1>{{ $post->title }}</h1>
                        <h2 class="subheading">{{ $post->subtitle }}</h2>
                        <span class="meta">
                            <a href="#">{{ $post->author->name }}</a>
                            tarafından
                            {{ $post->created_at->diffForHumans() }}
                            paylaşıldı</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-8 col-md-10">
                    {{ $post->description }}
                </div>
            </div>
        </div>
    </article>
@endsection
