    @extends('layouts.master')
    @section('title', 'Anasayfa')
    @section('banner')
        <!-- Page Header -->
        <header class="masthead" style="background-image: url(img/home-bg.jpg)">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="mx-auto col-lg-8 col-md-10">
                        <div class="site-heading">
                            <h1>Clean Blog</h1>
                            <span class="subheading">A Blog Theme by Start Bootstrap</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @endsection

    @section('content')
        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-8 col-md-10">
                    @foreach ($posts as $post)
                        <div class="post-preview">
                            <a href="{{ route('post', $post->slug) }}">
                                <h2 class="post-title">
                                    {{ $post->title }}
                                </h2>
                                <h3 class="post-subtitle">
                                    {{ $post->subtitle }}
                                </h3>
                            </a>
                            <p class="post-meta">
                                <a href="#">{{ $post->author->name }}</a>
                                tarafından
                                {{ $post->created_at->diffForHumans() }}
                                paylaşıldı
                            </p>
                        </div>
                        <hr>
                    @endforeach
                    <!-- Pager -->
                    <div class="paginate">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
