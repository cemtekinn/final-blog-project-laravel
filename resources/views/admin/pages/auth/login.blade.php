@if (session('error'))
    <div id="error-message" class="alert alert-danger">
        {{ session('error') }}
    </div>

    <script>
        setTimeout(function() {
            $('#error-message').fadeOut();
        }, 5000);
    </script>
@endif

@if (session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('error') }}
    </div>

    <script>
        setTimeout(function() {
            $('#success-message').fadeOut();
        }, 5000);
    </script>
@endif


@extends("admin.pages.auth.index")

@section("title") Admin Paneli | Giriş Yap @endsection

@section("content")
    <div class="login-box">
        <div class="login-logo">
            <b>Admin Yönetim Paneli</b>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Bilgilerinizi girerek oturumunuzu başlatın</p>
                <form action="{{route('panel.login')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Kullanıcı Adı">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Şifre">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Beni Hatırla
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <a href="forgot-password.html">Şifremi unuttum</a>
                </p>

            </div>

        </div>
    </div>

@endsection
