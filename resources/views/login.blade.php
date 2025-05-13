<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - E-Library</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

</head>
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
        <form>
          <div class="input-group">
            <svg width="20" height="20" viewBox="0 0 24 24"><path d="M4 4h16v2H4zm0 4h16v2H4zm0 4h10v2H4z"/></svg>
            <input type="email" placeholder="example@gmail.com" required />
          </div>
          <div class="input-group">
            <svg width="20" height="20" viewBox="0 0 24 24"><path d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm6-5V9a6 6 0 0 0-12 0v3a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2zm-8-3a4 4 0 0 1 8 0v3H10V9z"/></svg>
            <input type="password" placeholder="********" required />
          </div>
          <div class="options">
            <label><input type="checkbox"> Remember me</label>
            <a href="#">Forgot Password?</a>
          </div>
          <button type="submit">Login</button>
        </form>
        <p class="register-text">Don’t have an account? <a href="#">Register</a></p>
      </div>
    </div>
  </div>
</body>
</html>