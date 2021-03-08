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
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="banner">Site Banner</label>
                            <input type="file" name="banner" class="form-control-file" id="banner">
                        </div>
                        <div class="form-group">
                            <label for="title">Site Başlık</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="footer">Site Footer</label>
                            <input type="text" name="footer" class="form-control" id="footer">
                        </div>
                        <div class="form-group">
                            <b>Sosyal Medya Hesapları</b> <a href="" class="btn btn-sm btn-outline-primary"><i
                                    class="fa fa-plus"></i> Hesap Ekle</a>
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Instagram</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Site Açıklama</label>
                            <textarea name="description" class="form-control" rows="4" id="description"></textarea>
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
