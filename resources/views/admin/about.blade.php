@extends('admin.layouts.master')
@include('admin.layouts.sidebar')
@section('title', 'Hakkında')
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

            <div class="mb-4 d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1 class="mb-2 text-gray-800 h3">Hakkında</h1>
                    <p class="mb-4">Burada okurların seni tanıyabilmesi için bir hakkımda yazısı yazabilirsin.</p>
                </div>
                <a href="{{ route('home') }}" class="shadow-sm d-none d-sm-inline-block btn btn-sm btn-primary"
                    target="_blank"><i class="fas fa-globe fa-sm"></i> Siteye Git</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="photo">Fotoğraf</label>

                            @if ($about->photo)
                                <a href="{{ $about->photo }}" target="_blank">
                                    <img src="{{ $about->photo }}" alt="{{ $about->name }}" class="img-responsive"
                                        style="width: 200px;">
                                </a>
                            @endif

                            <input type="file" name="photo" class="form-control-file" id="photo"
                                value="{{ $about->photo }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Ad</label>
                            <input type="text" name="name" class="form-control" id="title"
                                placeholder="{{ $about->name }}" value="{{ $about->name }}">
                        </div>
                        <div class="form-group">
                            <label for="shortdescription">Kısa Açıklama</label>
                            <input type="text" name="shortdescription" class="form-control" id="shortdescription"
                                placeholder="{{ $about->shortdescription }}" value="{{ $about->shortdescription }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Siz Kimsiniz</label>
                            <textarea name="description" class="form-control" rows="4"
                                id="description">{{ $about->description }}</textarea>
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
