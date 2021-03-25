    @extends('layouts.master')
    @section('title', $menu->title)
    @section('banner')
        <!-- Page Header -->
        <header class="masthead" style="background-image: url({{ $menu->image }})">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="mx-auto col-lg-8 col-md-10">
                        <div class="site-heading">
                            <h1>{{ $menu->title }}</h1>
                            <span class="subheading"></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @endsection

    @section('content')
        <article>
            <div class="container">
                <div class="row">
                    <div class="mx-auto col-lg-8 col-md-10">
                        {!! $menu->content !!}
                    </div>
                </div>
            </div>
        </article>
    @endsection
