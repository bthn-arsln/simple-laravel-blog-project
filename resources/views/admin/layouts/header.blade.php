<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $config->description }}">
    <meta name="author" content="">

    <title>{{ $config->title }} - @yield('title', 'Panel')</title>

    <link rel="icon" href="{{ $config->favicon }}" type="image/x-icon">

    @include('admin.layouts.css')

</head>

<body id="page-top">
