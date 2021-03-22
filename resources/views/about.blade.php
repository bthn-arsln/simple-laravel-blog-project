@extends('layouts.master')
@section('title', 'Hakkımda')
@section('banner')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/about-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-8 col-md-10">
                    <div class="page-heading">
                        <h1>{{ $about->name }}</h1>
                        <span class="subheading">{{ $about->shortdescription }}</span>
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
                <p>{{ $about->description }}</p>
            </div>
        </div>
    </div>
@endsection
