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
                <p class="mb-4">Burada admin olarak sisteminize kayıtlı kullanıcıları görüntüleyebilirsiniz.</p>
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
                            <input type="text" name="lastname" class="form-control" placeholder="Soyad">
                        </div>
                        <div class="col-md-2">
                            <select name="status" class="form-control" onchange="this.form.submit()">
                                <option value="">Durum Seçiniz</option>
                                <option value="active">Aktif</option>
                                <option value="notactive">Aktif Değil</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="type" class="form-control" onchange="this.form.submit()">
                                <option value="">Statü Seçiniz</option>
                                <option value="admin">Admin</option>
                                <option value="moderator">Moderatör</option>
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
                                <th>Email</th>
                                <th>Statü</th>
                                <th>Durum</th>
                                <th>Kayıt Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if ($user->type != 'admin')
                                    <tr>

                                        <td>
                                            @if ($user->gender == 'male')
                                                <a href="{{ $user->image ? asset($user->image) : asset('img/undraw_profile_2.svg') }}"
                                                    target="_blank">
                                                    <img src="{{ $user->image ? asset($user->image) : asset('img/undraw_profile_2.svg') }}"
                                                        alt="" class="rounded-circle img-responsive"
                                                        style="width: 80px; height: 80px">
                                                </a>
                                            @else
                                                <a href="{{ $user->image ? asset($user->image) : asset('img/undraw_profile_3.svg') }}"
                                                    target="_blank">
                                                    <img src="{{ $user->image ? asset($user->image) : asset('img/undraw_profile_3.svg') }}"
                                                        alt="" class="rounded-circle img-responsive"
                                                        style="width: 80px; height: 80px">
                                                </a>
                                            @endif
                                        </td>
                                        @if ($user->id == Auth::user()->id)
                                            <td>
                                                <span class="text-success">{{ $user->firstname }}</span>
                                            </td>
                                            <td>
                                                <span class="text-success">{{ $user->lastname }}</span>
                                            </td>
                                            <td>
                                                <span class="text-success">{{ $user->email }}</span>
                                            </td>
                                        @else
                                            <td>
                                                {{ $user->firstname . ' ' . $user->lastname }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                        @endif
                                        <td>
                                            @if ($user->type == 'admin')
                                                <span class="badge badge-warning">Admin</span>
                                            @elseif($user->type == 'moderator')
                                                <span class="badge badge-primary">Moderatör</span>
                                            @else
                                                <span class="badge badge-success">Yazar</span>
                                            @endif
                                        </td>
                                        <td>
                                            {!! $user->status == 'active' ? '<span class="badge badge-success">Onaylı</span>' : '<span class="badge badge-danger">Onaylanmadı</span>' !!}
                                        </td>

                                        <td>
                                            {{ $user->created_at->diffForHumans() . ' kayıt oldu' }}
                                        </td>
                                        @if ($user->email != Auth::user()->email)
                                            <td>
                                                <a href="{{ route('admin.user.edit', $user->id) }}"
                                                    class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.user.destroy', $user->id) }}"
                                                    class="btn btn-danger"><i class="fa fa-times"></i></a>
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
