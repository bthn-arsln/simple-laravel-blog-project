@extends('admin.layouts.master')
@include('admin.layouts.sidebar')
@section('title', $user->name)
@section('content')
    <!-- Main Content -->
    <div id="content">
        @include('admin.layouts.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="mb-4 d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1 class="mb-2 text-gray-800 h3">{{ $user->name }}</h1>
                    <p class="mb-4">Kullanıcısını güncelle</p>
                </div>
                <a href="{{ route('home') }}" class="shadow-sm d-none d-sm-inline-block btn btn-sm btn-primary"
                    target="_blank"><i class="fas fa-globe fa-sm"></i> Siteye Git</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.user.update', $user->id) }}"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="type">Statü</label>
                            <select name="type" class="form-control">
                                <option @if ($user->type === 'superadmin') selected @endif value="superadmin">Süper Admin</option>
                                <option @if ($user->type === 'admin') selected @endif value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Durum</label>
                            <select name="status" class="form-control">
                                <option @if ($user->status === 'approved') selected @endif value="approved">Onaylı</option>
                                <option @if ($user->status === 'notapproved') selected @endif value="notapproved">Onaylı Değil</option>
                            </select>
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
