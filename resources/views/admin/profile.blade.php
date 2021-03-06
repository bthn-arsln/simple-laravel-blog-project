@extends('admin.layouts.master')
@section('title', Auth::user()->name)
    @include('admin.layouts.sidebar')
@section('content')
    <div id="content">

        @include('admin.layouts.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ Session::get('success') }}
                </div>
            @endif

            <div class="mb-4 d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1 class="mb-2 text-gray-800 h3">Profile</h1>
                    <p class="mb-4">Burası profile sayfası burada bilgilerini güncelleyebilirsin.</p>
                </div>
                <a href="{{ route('home') }}" class="shadow-sm d-none d-sm-inline-block btn btn-sm btn-primary"
                    target="_blank"><i class="fas fa-globe fa-sm"></i> Siteye Git</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.profile.update', Auth::user()->id) }}"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="image">Fotoğraf</label>
                                @if (Auth::user()->gender == 'male')
                                    <a href="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('img/undraw_profile_2.svg') }}"
                                        target="_blank">
                                        <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('img/undraw_profile_2.svg') }}"
                                            alt="{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}"
                                            class="rounded-circle img-responsive" style="width: 100px; height: 100px;">
                                    </a>
                                @else
                                    <a href="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('img/undraw_profile_3.svg') }}"
                                        target="_blank">
                                        <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('img/undraw_profile_3.svg') }}"
                                            alt="{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}"
                                            class="rounded-circle img-responsive" style="width: 100px; height: 100px;">
                                    </a>
                                @endif
                                <br> <br>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="firstname">Ad</label>
                                <input type="text" name="firstname" class="form-control"
                                    value="{{ Auth::user()->firstname }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Soyad</label>
                                <input type="text" name="lastname" class="form-control"
                                    value="{{ Auth::user()->lastname }}">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-block btn-success">Kaydet</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
