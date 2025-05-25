<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verifikasi Email</title>
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


@if (session('success'))
    <div class="modal-box" id="success-message">
        <i class="fa-solid fa-check-to-slot"></i>
        <h2>Sukses</h2>
        <h3>{{ session('success') }}</h3>
        <div class="but">
            <button class="tutupbut" onclick="closeModalAndClearSession()">OK</button>
        </div>
    </div>
    @elseif (session('error'))
        <div id="error-message" class="popup-message">{{ session('error') }}</div>
    @endif


    @if (session('sucesup'))
    <div class="modal-up" id="success-message">
        <i class="fa-solid fa-thumbs-up"></i>
        <h2>Sukses</h2>
        <h3>{{ session('sucesup') }}</h3>
        <div class="butup">
            <button class="tutupbutup" onclick="closeModalAndClearSession()">OK</button>
        </div>
    </div>
    @elseif (session('errorup'))
        <div id="error-message" class="popup-message">{{ session('error') }}</div>
    @endif




<body>
    <div class="container">
        <div class="left" style="background-image: url('{{ asset('assets/images/modelbaru.jpg') }}');">
            <div class="background"></div>
            <div class="overlay-text">Ar-Roudhoh Digital E-Library</div>
        </div>
        <div class="right">
            <div class="login-box">
                <h2>Welcome to <span>E-Library</span></h2>
                <img class="form-img" src="{{ asset('assets/images/logo2.png') }}" alt="Mini Illustration">
                <form  method="POST" action="{{ route('sendmail') }}" class="sign-in-form" id="email-form">
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
                        <input type="email" name="email" id="email" placeholder="example@gmail.com" required />
                    </div>
                    <div class="options">
                        {{-- <label><input type="checkbox"> Remember me</label> --}}
                        <a href="#">Kembali ke Halaman Login</a>
                    </div>

                    <button type="submit">Kirim</button>
                </form>
                {{-- <p class="register-text">Don’t have an account? <a href="#">Register</a></p> --}}
            </div>
        </div>
    </div>


    <script src="assets/js/app.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="lupas.js"></script>
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
