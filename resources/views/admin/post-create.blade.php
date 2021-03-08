@extends('admin.layouts.master')
@include('admin.layouts.sidebar')
@section('title', 'Makale Oluştur')
@section('content')
    <!-- Main Content -->
    <div id="content">

        @include('admin.layouts.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="mb-4 d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1 class="mb-2 text-gray-800 h3">Makale Ekle</h1>
                    <p class="mb-4">Buradan yeni bir makale oluşturabilirsin.</p>
                </div>
                <a href="{{ route('home') }}" class="shadow-sm d-none d-sm-inline-block btn btn-sm btn-primary"
                    target="_blank"><i class="fas fa-globe fa-sm"></i> Siteye Git</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label for="title">Başlık</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Alt Başlık</label>
                            <input type="text" name="subtitle" class="form-control" id="subtilte">
                        </div>
                        <div class=" form-group">
                            <label for="image">Fotoğraf</label>
                            <input type="file" name="image" class="form-control-file" id="image">
                        </div>
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea name="description" class="form-control" rows="4" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-success">Oluştur</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
