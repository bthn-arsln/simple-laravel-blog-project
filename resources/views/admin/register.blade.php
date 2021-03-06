@include('admin.layouts.header')
@section('title', 'Kayıt Ol')

    <body class="bg-gradient-primary">
        <div class="container">

            <div class="my-5 border-0 shadow-lg card o-hidden">
                <div class="p-0 card-body">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="mb-4 text-gray-900 h4">Bir Hesap Oluştur!</h1>
                                </div>
                                <form method="post" action="{{ route('register.post') }}" class="user">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="mb-3 col-sm-6 mb-sm-0">
                                            <input type="text" name="firstname" class="form-control" id="exampleFirstName"
                                                placeholder="Ad">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="lastname" class="form-control" id="exampleLastName"
                                                placeholder="Soy Ad">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail"
                                            placeholder="Email Addres">
                                    </div>
                                    <div class="form-group">
                                        <select name="gender" class="form-control" id="exampleGender">
                                            <option selected>Seçiniz</option>
                                            <option value="male">Erkek</option>
                                            <option value="female">Kadın</option>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <div class="mb-3 col-sm-6 mb-sm-0">
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword" placeholder="Şifre">
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleRepeatPassword" placeholder="Şifre Tekrar">
                                        </div> --}}
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Kayıt Ol
                                    </button>
                                    <hr>
                                    <a href="index.html" class="btn btn-google btn-block">
                                        <i class="fab fa-google fa-fw"></i> Google ile kayıt ol
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Facebook ile kayıt ol
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Şifreni mi unuttun?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Zaten bir hesabın var mı? Giriş Yap!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
    @include('admin.layouts.script')
