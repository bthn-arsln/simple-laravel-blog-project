@extends('admin.layouts.master')
@include('admin.layouts.sidebar')
@section('title', 'Menu Oluştur')
@section('content')
    <!-- Main Content -->
    <div id="content">

        @include('admin.layouts.topbar')
        <!-- End of Topbar -->

        @if (Session::has('success'))
            <div class="alert alert-success"><i class="fa fa-check-circle"></i> {{ Session::get('success') }}</div>
        @endif

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="mb-4 d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1 class="mb-2 text-gray-800 h3">Menü Ekle</h1>
                    <p class="mb-4">Buradan yeni bir menü oluşturabilirsin.</p>
                </div>
                <a href="{{ route('home') }}" class="shadow-sm d-none d-sm-inline-block btn btn-sm btn-primary"
                    target="_blank"><i class="fas fa-globe fa-sm"></i> Siteye Git</a>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <ul class="list-group">
                        @foreach ($menus as $menu)
                            <li class="list-group-item">
                                <b class="d-block">{{ $menu->title }}</b>
                                <a href="{{ url($menu->url) }}" target="__blank">{{ url($menu->url) }}</a>
                                <a href="{{ route('admin.menus.destroy', $menu->id) }}" class="float-right"><i
                                        class="fa fa-times text-danger"></i></a>
                                <a href="{{ route('admin.menus.edit', $menu->id) }}" class="float-right mr-2"><i
                                        class="fa fa-edit text-primary"></i></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.menus.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="image">Fotoğraf</label>
                                    <input type="file" name="image" class="form-control-file" id="image">
                                </div>
                                <div class="form-group">
                                    <label for="title">Başlık</label>
                                    <input type="text" name="title" class="form-control" id="title">
                                </div>
                                <div class="form-group">
                                    <label for="url">Url</label>
                                    <input type="text" name="url" class="form-control" id="url">
                                </div>
                                <div class="form-group">
                                    <label for="content">İçerik</label>
                                    <textarea name="content" id="content" rows="4" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-success">Oluştur</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
