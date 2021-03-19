@extends('admin.layouts.master')
@include('admin.layouts.sidebar')
@section('title', 'Site Ayarları')
@section('content')
    <!-- Main Content -->
    <div id="content">
        @include('admin.layouts.topbar')
        <!-- End of Topbar -->

        @if (Session::has('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ Session::get('success') }}
            </div>
        @endif

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="mb-4 d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1 class="mb-2 text-gray-800 h3">Site Ayarları</h1>
                    <p>Şuan kullanılamıyor</p>
                </div>
                <a href="{{ route('home') }}" class="shadow-sm d-none d-sm-inline-block btn btn-sm btn-primary"
                    target="_blank"><i class="fas fa-globe fa-sm"></i> Siteye Git</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.configs.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="banner">Logo</label>
                            @if ($config->logo)
                                <a href="{{ asset($config->logo) }}" traget="_blank">
                                    <img src="{{ asset($config->logo) }}" alt="{{ $config->title }}"
                                        class="img-responsive" style="width: 200px;">
                                </a>
                            @endif
                            <br> <br>
                            <input type="file" name="logo" class="form-control-file" id="logo">
                        </div>
                        <div class="form-group">
                            <label for="favicon">Favicon</label>
                            @if ($config->favicon)
                                <a href="{{ asset($config->favicon) }}" traget="_blank">
                                    <img src="{{ asset($config->favicon) }}" alt="{{ $config->title }}"
                                        class="img-responsive" style="width: 200px;">
                                </a>
                            @endif
                            <br> <br>
                            <input type="file" name="favicon" class="form-control-file" id="favicon">
                        </div>
                        <div class="form-group">
                            <label for="banner">Banner</label>
                            @if ($config->banner)
                                <a href="{{ asset($config->banner) }}" traget="_blank">
                                    <img src="{{ asset($config->banner) }}" alt="{{ $config->title }}"
                                        class="img-responsive" style="width: 200px;">
                                </a>
                            @endif
                            <br> <br>
                            <input type="file" name="banner" class="form-control-file" id="banner">
                        </div>
                        <div class="form-group">
                            <label for="title">Başlık</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ $config->title }}">
                        </div>
                        <div class="form-group">
                            <label for="footer">Footer</label>
                            <input type="text" name="footer" class="form-control" id="footer"
                                value="{{ $config->footer }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea name="description" class="form-control" rows="4"
                                id="description">{{ $config->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-success">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
