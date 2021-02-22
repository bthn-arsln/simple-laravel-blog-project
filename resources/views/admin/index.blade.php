@extends('admin.layouts.master')
@include('admin.layouts.sidebar')
@section('title', 'Başlangıç')
@section('content')
    <!-- Main Content -->
    <div id="content">
        @include('admin.layouts.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="mb-4 d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1 class="mb-2 text-gray-800 h3">Başlangıç</h1>
                </div>
                <a href="{{ route('home') }}" class="shadow-sm d-none d-sm-inline-block btn btn-sm btn-primary"
                    target="_blank"><i class="fas fa-globe fa-sm"></i> Siteye Git</a>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
