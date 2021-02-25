@extends('admin.layouts.master')
@include('admin.layouts.sidebar')
@section('title', 'Makaleler')
@section('content')
    @include('admin.layouts.topbar')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        @if (Session::has('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ Session::get('success') }}
            </div>
        @endif

        <!-- Page Heading -->
        <div class="mb-4 d-sm-flex align-items-center justify-content-between">
            <div>
                <h1 class="mb-2 text-gray-800 h3">Makaleler</h1>
                <p class="mb-4">Burada makaleleri görüntüleyebilirsin.</p>
            </div>
            <a href="{{ route('home') }}" class="shadow-sm d-none d-sm-inline-block btn btn-sm btn-primary"
                target="_blank"><i class="fas fa-globe fa-sm"></i> Siteye Git</a>
        </div>

        <!-- DataTales Example -->
        <div class="mb-4 shadow card">
            <div class="py-3 card-header">
                <h6 class="float-right m-0 font-weight-bold text-primary">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Makale Oluştur
                    </a>
                </h6>
                <form method="get">
                    <div class="form-row">
                        <div class="col-md-2">
                            <input type="text" name="title" class="form-control" placeholder="Makale Adı">
                        </div>
                        <div class="col-md-2">
                            <select name="status" class="form-control" onchange="this.form.submit()">
                                <option value="">Durum Seçiniz</option>
                                <option @if (request()->get('status') === 'publish') selected @endif value="publish">Aktif</option>
                                <option @if (request()->get('status') === 'draft') selected @endif value="draft">Taslak</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Başlık</th>
                                <th>Alt Başlık</th>
                                <th>Fotoğraf</th>
                                <th>Yazarlar</th>
                                <th>Durum</th>
                                <th>Oluşturulma Tarihi</th>
                                <th style="width: 150px;">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->subtitle }}</td>
                                    <td>
                                        @if ($post->image)
                                            <a href="{{ asset($post->image) }}" target="_blank">Görüntüle</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <span @if ($post->author == Auth::user()) class="text-success" @endif>{{ $post->author->name }}</span>
                                    </td>
                                    <td>
                                        @if ($post->status == 'publish')
                                            <span class="badge badge-success">Aktif</span>
                                        @elseif($post->status == 'draft')
                                            <span class="badge badge-warning">Taslak</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td @if ($post->author != Auth::user()) style="display: none;" @endif>
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.posts.destroy', $post->id) }}" class="btn btn-danger"><i
                                                class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
