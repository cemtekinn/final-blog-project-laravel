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

@extends("front.pages.auth.index")
@section("title")
    Üye Ol
@endsection

@section("content")
    <div class="register-box">
        <div class="register-logo">
            <b>Kayıt Ol</b>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <form action="{{route('register.post')}}" method="post" onsubmit="return checkPasswordMatch()">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Adınız" name="name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Soyadınız" name="lastname" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Kullanıcı adı" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-circle"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Eposta adresiniz" name="email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Telefon numaranız" name="phone">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Şifre giriniz" name="password"
                               id="password" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="showPassword">
                                <span id="passwordIcon1" class="fas fa-eye-slash"></span>
                            </button>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Şifrenizi tekrar giriniz"
                               name="password_repeat" id="password_repeat" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="showPassword2">
                                <span id="passwordIcon2" class="fas fa-eye-slash"></span>
                            </button>
                        </div>
                    </div>

                    <div id="passwordMismatchWarning"
                         style="color: red; display: none; background-color: #ffe6e6; padding: 10px; margin: 10px; border: 1px solid #ffcccc; border-radius: 5px;">
                        <strong>Şifreler eşleşmiyor!</strong>
                    </div>

                    <script>
                        var passwordInput1 = document.getElementById('password');
                        var passwordInput2 = document.getElementById('password_repeat');
                        var passwordIcon1 = document.getElementById('passwordIcon1');
                        var passwordIcon2 = document.getElementById('passwordIcon2');
                        var passwordMismatchWarning = document.getElementById('passwordMismatchWarning');

                        document.getElementById('showPassword').addEventListener('click', function () {
                            togglePasswordVisibility(passwordInput1, passwordIcon1);
                        });

                        document.getElementById('showPassword2').addEventListener('click', function () {
                            togglePasswordVisibility(passwordInput2, passwordIcon2);
                        });

                        function togglePasswordVisibility(input, icon) {
                            if (input.type === 'password') {
                                input.type = 'text';
                                icon.classList.remove('fa-eye-slash');
                                icon.classList.add('fa-eye');
                            } else {
                                input.type = 'password';
                                icon.classList.remove('fa-eye');
                                icon.classList.add('fa-eye-slash');
                            }
                        }

                        function checkPasswordMatch() {
                            if (passwordInput1.value !== passwordInput2.value) {
                                passwordMismatchWarning.style.display = 'block';
                                return false;
                            } else {
                                passwordMismatchWarning.style.display = 'none';
                                return true;
                            }
                        }
                    </script>

                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Kayıt Ol</button>
                        </div>
                    </div>
                </form>

                <a style="float:right" href="{{route('login.index')}}" class="text-center">Hesabım var</a>
            </div>
        </div>

@endsection
