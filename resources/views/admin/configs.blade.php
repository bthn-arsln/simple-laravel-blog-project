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
                    <form method="post" name="form1" action="{{ route('admin.configs.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="banner">Logo</label>
                                        @if ($config->logo)
                                            <a href="{{ asset($config->logo) }}" target="_blank">
                                                <img src="{{ asset($config->logo) }}" alt="{{ $config->title }}"
                                                    class="img-responsive" style="width: 200px; height: 200px;">
                                            </a>
                                        @endif
                                    </div>
                                    <input type="file" name="logo" class="form-control-file" id="logo"
                                        value="{{ $config->logo }}">
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="favicon">Favicon</label>
                                        @if ($config->favicon)
                                            <a href="{{ asset($config->favicon) }}" target="_blank">
                                                <img src="{{ asset($config->favicon) }}" alt="{{ $config->title }}"
                                                    class="img-responsive" style="width: 200px; height: 200px;">
                                            </a>
                                        @endif
                                    </div>
                                    <input type="file" name="favicon" class="form-control-file" id="favicon"
                                        value="{{ $config->favicon }}">
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="banner">Banner</label>
                                        @if ($config->banner)
                                            <a href="{{ asset($config->banner) }}" target="_blank">
                                                <img src="{{ asset($config->banner) }}" alt="{{ $config->title }}"
                                                    class="img-responsive" style="width: 200px; height: 200px;">
                                            </a>
                                        @endif
                                    </div>
                                    <input type="file" name="banner" class="form-control-file" id="banner"
                                        value="{{ $config->banner }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col">
                                <label for="title">Başlık</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{ $config->title }}">
                            </div>
                            <div class="col">
                                <label for="status">Durum</label>
                                <select name="status" id="" class="form-control">
                                    <option value="">Seçiniz</option>
                                    <option @if ($config->status == 'active') selected @endif value="active">Aktif</option>
                                    <option @if ($config->status == 'passive') selected @endif value="passive">Pasif</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="footer">Footer</label>
                                <input type="text" name="footer" class="form-control" id="footer"
                                    value="{{ $config->footer }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <b>Sosyal Medya Hesapları</b> <button type="button" class="btn btn-sm btn-outline-primary"
                                data-toggle="modal" data-target="#addAccount"><i class="fa fa-plus"></i> Hesap Ekle</button>
                            <div class="form-row">
                                @foreach ($socials as $social)
                                    <div class="col">
                                        <div>
                                            <i class="fab fa-{{ $social->slug }} fa-2x"></i>
                                        </div>
                                        <a href="{{ $social->url }}">{{ $social->url }}</a>
                                        <a href="{{ route('admin.social.destroy', $social->id) }}"
                                            class="btn btn-sm btn-outline-danger ml-2"><i
                                                class="fa fa-times text-danger"></i></a>
                                    </div>
                                @endforeach
                            </div>
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
    <!-- Modal -->
    <div class="modal fade" id="addAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sosyal Medya Hesabı Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('admin.social.post') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Başlık</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" name="url" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
