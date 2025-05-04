<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - E-Library</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f6f6f6;
    }

    .container {
      display: flex;
      height: 100vh;
    }

    .left {
      flex: 1;
      background-color: #27C081;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .left img {
      width: 85%;
      max-width: 450px;
    }

    .right {
      flex: 1;
      background-color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .login-box {
      background-color: #ffffff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 10px;
      font-size: 24px;
      font-weight: 600;
    }

    .login-box h2 span {
      color: #27C081;
      font-weight: 700;
    }

    .login-box .form-img {
      display: block;
      margin: 0 auto 20px auto;
      width: 70px;
    }

    .input-group {
      position: relative;
      margin-bottom: 20px;
    }

    .input-group input {
      width: 100%;
      padding: 12px 45px;
      border: none;
      background-color: #f1f1f1;
      border-radius: 6px;
      font-size: 14px;
    }

    .input-group svg {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      fill: #333;
    }

    .options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 13px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    .options label {
      display: flex;
      align-items: center;
    }

    .options input {
      margin-right: 6px;
    }

    .options a {
      text-decoration: none;
      color: #27C081;
      font-weight: 500;
      margin-top: 5px;
    }

    button {
      width: 100%;
      padding: 12px;
      border: none;
      background-color: #27C081;
      color: white;
      font-weight: 600;
      border-radius: 6px;
      cursor: pointer;
    }

    .register-text {
      text-align: center;
      margin-top: 15px;
      font-size: 13px;
    }

    .register-text a {
      color: #27C081;
      text-decoration: none;
      font-weight: 600;
    }

    /* RESPONSIVE STYLES */
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
        height: auto;
      }

      .left, .right {
        flex: unset;
        width: 100%;
        height: auto;
      }

      .left {
        padding: 30px 0;
      }

      .left img {
        width: 60%;
      }

      .right {
        padding: 30px 20px;
      }
    }

    @media (max-width: 480px) {
      .login-box {
        padding: 20px;
      }

      .input-group input {
        padding: 10px 40px;
      }

      .options {
        flex-direction: column;
        align-items: flex-start;
      }

      .options a {
        align-self: flex-end;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="left">
      <img src="{{ asset('assets/images/logo.png') }}" alt="Illustration">
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