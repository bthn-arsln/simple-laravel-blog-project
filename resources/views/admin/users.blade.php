@extends('admin.layouts.master')
@include('admin.layouts.sidebar')
@section('title', 'Kullanıcılar')
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
                <h1 class="mb-2 text-gray-800 h3">Kullanıcılar</h1>
                <p class="mb-4">Burada süperadmin olarak sisteminize kayıtlı yazarları görüntüleyebilirsiniz.</p>
            </div>
            <a href="{{ route('home') }}" class="shadow-sm d-none d-sm-inline-block btn btn-sm btn-primary"
                target="_blank"><i class="fas fa-globe fa-sm"></i> Siteye Git</a>
        </div>

        <!-- DataTales Example -->
        <div class="mb-4 shadow card">
            <div class="py-3 card-header">
                <form method="get">
                    <div class="form-row">
                        <div class="col-md-2">
                            <input type="text" name="name" class="form-control" placeholder="Ad Soyad">
                        </div>
                        <div class="col-md-2">
                            <select name="status" class="form-control" onchange="this.form.submit()">
                                <option value="">Durum Seçiniz</option>
                                <option value="approved">Onaylı</option>
                                <option value="notapproved">Onaylı Değil</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="type" class="form-control" onchange="this.form.submit()">
                                <option value="">Statü Seçiniz</option>
                                <option value="admin">Admin</option>
                                <option value="author">Yazar</option>
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
                                <th>Profil Fotoğrafı</th>
                                <th>Ad Soyad</th>
                                <th>Statü</th>
                                <th>Durum</th>
                                <th>Kayıt Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>-</td>
                                    <td>
                                        <span @if ($user->name == Auth::user()->name) class="text-success" @endif>
                                            {{ $user->name }}</span>
                                    </td>
                                    <td>
                                        @if ($user->type === 'admin')
                                            <span class="badge badge-warning">Admin</span>
                                        @else
                                            <span class="badge badge-primary">Author</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->status === 'approved')
                                            <span class="badge badge-success">Onaylı</span>
                                        @else
                                            <span class="badge badge-danger">Onaylı Değil</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at != null ? $user->created_at->diffForHumans() . ' kayıt oldu' : '-' }}
                                    </td>
                                    @if ($user->name != Auth::user()->name)
                                        <td>
                                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.user.destroy', $user->id) }}"
                                                class="btn btn-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    @endif
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
