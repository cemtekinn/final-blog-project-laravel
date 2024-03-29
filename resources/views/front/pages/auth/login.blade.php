@if (session('error'))
    <script>
        alert("{{ session('error')}}");
    </script>
@endif

@if (session('success'))
    <script>
        alert("{{ session('success')}}");
    </script>
@endif

@extends("admin.layouts.auth.index")

@section("title") Giriş Yap @endsection

@section("content")
    <div class="login-box">
        <div class="login-logo">
            <b>Kullanıcı Girişi</b>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Bilgilerinizi girerek oturumunuzu başlatın</p>
                <form action="{{route('login.post')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="Eposta Adresiniz" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Şifre" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
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
                <p class="mb-1">
                    <a style="color:darkred" href="{{route('auth.register')}}">Hesabım yok</a>
                </p>

            </div>

        </div>
    </div>

@endsection
