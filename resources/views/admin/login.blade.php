@include('admin.layouts.header')
@section('title', 'Giriş Yap')

    <body class="bg-gradient-primary">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="my-5 border-0 shadow-lg card o-hidden">
                        <div class="p-0 card-body">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <a class="float-right" href="{{ route('home') }}">Siteye Geri Dön &rarr;</a>
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="mb-4 text-gray-900 h4">Tekrar Hoşgeldin!</h1>
                                            @if (Session::has('success'))
                                                <div class="alert alert-success">
                                                    <i class="fas fa-check-circle"></i> {{ Session::get('success') }}
                                                </div>
                                            @endif
                                        </div>
                                        <form class="user" method="post" action="{{ route('login.post') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" id="exampleInputEmail"
                                                    aria-describedby="emailHelp" placeholder="Email Adresini Gir...">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control"
                                                    id="exampleInputPassword" placeholder="Şifre">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Beni
                                                        Hatırla</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Giriş Yap
                                            </button>
                                            <hr>
                                            <a href="index.html" class="btn btn-google btn-block">
                                                <i class="fab fa-google fa-fw"></i> Google ile giriş yap
                                            </a>
                                            <a href="index.html" class="btn btn-facebook btn-block">
                                                <i class="fab fa-facebook-f fa-fw"></i> Facebook ile giriş yap
                                            </a>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="forgot-password.html">Şifreni mi unuttun!</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="{{ route('register') }}">Bir Hesap Oluştur!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </body>
