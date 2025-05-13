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
@elseif ($errors->has('image'))
    <div class="modal-sal" id="error-message">
        <i class="fa-solid fa-circle-exclamation"></i>
        <h2>Gagal</h2>
        <h3>{{ $errors->first('image') }}</h3>
        <div class="butsal">
            <button class="tutupsal" onclick="closeclose()">OK</button>
        </div>
    </div>
@endif


<body>
    <div class="container">
        <div class="left" style="background-image: url('{{ asset('assets/images/model.jpg') }}');">
            <div class="background"></div>
            <div class="overlay-text">Ar-Roudhoh Digital E-Library</div>
        </div>
        <div class="right">
            <div class="login-box">
                <h2>Welcome to <span>E-Library</span></h2>
                <img class="form-img" src="{{ asset('assets/images/logo2.png') }}" alt="Mini Illustration">
                <form class="sign-in-form" id="signup-form" method="POST" action="">
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
                        <a href="#">Forgot Password?</a>
                    </div>
                    <small id="password-error" style="display: none;">Password harus minimal 8 karakter</small>
                    <small id="confirm-password-error" style="display: none;">Konfirmasi password harus sama dengan
                        password</small>
                    <small id="image-error" style="display: none;">Ukuran gambar terlalu besar maksimal 2MB</small>
                    <button type="submit">Login</button>
                </form>
                {{-- <p class="register-text">Don’t have an account? <a href="#">Register</a></p> --}}
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
