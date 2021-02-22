@extends('admin.layouts.master')
@include('admin.layouts.sidebar')
@section('title', $post->title)
@section('content')
    <!-- Main Content -->
    <div id="content">
        @include('admin.layouts.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="mb-4 d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1 class="mb-2 text-gray-800 h3">{{ $post->title }}</h1>
                    <p class="mb-4">Makalesini güncelle</p>
                </div>
                <a href="{{ route('home') }}" class="shadow-sm d-none d-sm-inline-block btn btn-sm btn-primary"
                    target="_blank"><i class="fas fa-globe fa-sm"></i> Siteye Git</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.posts.update', $post->id) }}"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label for="title">Başlık</label>
                            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Alt Başlık</label>
                            <input type="text" name="subtitle" class="form-control" value="{{ $post->subtitle }}">
                        </div>
                        <div class="form-group">
                            <label for="image">Fotoğraf</label>
                            @if ($post->image)
                                <a href="{{ asset($post->image) }}" traget="_blank">
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-responsive"
                                        style="width: 200px;">
                                </a>
                            @endif
                            <br> <br>
                            <input type="file" name="image" class="form-control" value="{{ asset($post->image) }}">
                        </div>
                        <div class="form-group">
                            <label for="status">Durum</label>
                            <select name="status" class="form-control">
                                <option value="">Durum Seçiniz</option>
                                <option @if ($post->status === 'publish') selected @endif value="publish">Aktif</option>
                                <option @if ($post->status === 'draft') selected @endif value="draft">Taslak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea name="description" class="form-control"
                                rows="4">{{ $post->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-success">Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
