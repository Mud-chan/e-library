<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - E-Library</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>


@if (session('success'))

@elseif (session('error'))
    <div class="modal-sal" id="gagal-message">
        <i class="fa-solid fa-circle-exclamation"></i>
        <h2>Gagal</h2>
        <h3>{{ session('error') }}</h3>
        <div class="butsal">
            <button class="tutupsal" onclick="closeModalAndClearSession()">OK</button>
        </div>
    </div>
@endif
<body>
    <script src="lupas.js"></script>
    <div class="container">

        <div class="left" style="background-image: url('{{ asset('assets/images/modelbaru.jpg') }}');">
            <div class="background"></div>
            <div class="overlay-text">Ar-Roudhoh Digital E-Library</div>
            {{-- <div class="back-button"><a class="backbtn" href="/">Beranda</a></div> --}}
        </div>
        <div class="right">
            {{-- <div class="back-button"><a class="backbtn2" href="/">Beranda</a></div> --}}
            <div class="login-box">
                <h2>Update Password <span></span></h2>
                <a href="/">
                <img class="form-img" src="{{ asset('assets/images/logo2.png') }}" alt="Mini Illustration">
                </a>
                <form class="sign-in-form" id="signup-form" method="POST" action="{{ route('updatePassword') }}">
                    @csrf
                    @if (isset($message))
                        <div class="message form">
                            <span>{{ $message }}</span>
                            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                        </div>
                    @endif


                    <div class="input-group">
                        <svg width="20" height="20" viewBox="0 0 24 24">
                            <path d="M4 4h16v2H4zm0 4h16v2H4zm0 4h10v2H4z" />
                        </svg>
                        <input type="email" name="email" placeholder="example@gmail.com" required />
                    </div>
                    <div class="input-group">
                        <svg width="20" height="20" viewBox="0 0 24 24">
                            <path
                                d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm6-5V9a6 6 0 0 0-12 0v3a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2zm-8-3a4 4 0 0 1 8 0v3H10V9z" />
                        </svg>
                        <input type="password" placeholder="********" required name="password"/>
                    </div>
                    <div class="options">
                        {{-- <label><input type="checkbox"> Remember me</label> --}}
                        <a href="/forgot-password">Lupa password? Klik disini!</a>
                    </div>
                    <small id="password-error" style="display: none;">Password harus mengandung 8 karakter</small>
                    <small id="confirm-password-error" style="display: none;">Konfirmasi password harus sama dengan
                        password</small>
                    <small id="image-error" style="display: none;">*Ukuran file terlalu besar (maks. 5 MB)</small>
                    <button type="submit">Ubah</button>
                </form>
                <p class="register-text">Kembali ke <a href="/">Beranda</a></p>
            </div>
        </div>
    </div>


    <script src="assets/js/app.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
        const form = document.getElementById('signup-form');
        const emailField = document.getElementById('email');
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('confirm-password');
        const imageField = document.getElementById('image');
        const emailError = document.getElementById('email-error');
        const passwordError = document.getElementById('password-error');
        const confirmPasswordError = document.getElementById('confirm-password-error');
        const imageError = document.getElementById('image-error');

        form.addEventListener('submit', function(event) {
            if (!emailField.value.includes('@')) {
                event.preventDefault();
                emailError.style.display = 'block';
            } else {
                emailError.style.display = 'none';
            }

            if (passwordField.value.length < 8) {
                event.preventDefault();
                passwordError.style.display = 'block';
            } else {
                passwordError.style.display = 'none';
            }

            if (passwordField.value !== confirmPasswordField.value) {
                event.preventDefault();
                confirmPasswordError.style.display = 'block';
            } else {
                confirmPasswordError.style.display = 'none';
            }

            if (imageField.files[0].size > 2048 * 1024) {
                event.preventDefault();
                imageError.style.display = 'block';
            } else {
                imageError.style.display = 'none';
            }
        });
    </script>

</body>

</html>
