<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Font Awesome for eye icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #f0f7f5, #ffffff);
    }

    .login {
      background: #fff;
      padding: 35px 30px;
      border-radius: 15px;
      width: 95%;
      max-width: 380px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
    }

    .login h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #2C786C;
      font-size: 1.8em;
      letter-spacing: 0.5px;
    }

    .login .inputBox {
      position: relative;
      margin-bottom: 18px;
    }

    .login .inputBox input {
      width: 100%;
      padding: 12px 42px 12px 12px;
      font-size: 1em;
      border-radius: 8px;
      border: 1px solid #cdd9d6;
      background: #f8fbfa;
      transition: all 0.3s ease;
    }

    .login .inputBox input:focus {
      border-color: #2C786C;
      outline: none;
      box-shadow: 0 0 6px rgba(44, 120, 108, 0.3);
      background: #fff;
    }

    .toggle-password {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #8b9d9a;
      font-size: 1.1em;
      transition: color 0.3s ease;
    }

    .toggle-password:hover {
      color: #2C786C;
    }

    .login button {
      width: 100%;
      padding: 12px;
      border: none;
      background: #2C786C;
      color: #fff;
      font-size: 1em;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .login button:hover {
      background: #3E9C8C;
      transform: translateY(-2px);
    }

    .error-box {
      background: rgba(255, 0, 0, 0.08);
      color: #c0392b;
      padding: 10px;
      border: 1px solid #c0392b;
      border-radius: 8px;
      margin-bottom: 15px;
      text-align: center;
      font-size: 0.9em;
    }

    .group {
      margin-top: 18px;
      text-align: center;
    }

    .group p {
      font-size: 0.9em;
      color: #555;
    }

    .group a {
      color: #2C786C;
      text-decoration: none;
      font-weight: 500;
    }

    .group a:hover {
      text-decoration: underline;
    }

    @media (max-width: 400px) {
      .login {
        padding: 25px 20px;
      }

      .login h2 {
        font-size: 1.5em;
      }
    }
  </style>
</head>
<body>
  <div class="login">
    <h2>Welcome Back</h2>

    <?php if (!empty($error)): ?>
      <div class="error-box">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="inputBox">
        <input type="text" placeholder="First Name" name="firstname" required>
      </div>

      <div class="inputBox">
        <input type="text" placeholder="Last Name" name="lastname" required>
      </div>

      <div class="inputBox">
        <input type="password" placeholder="Password" name="password" id="password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit">Login</button>
    </form>

    <div class="group">
      <p>Don’t have an account? <a href="<?= site_url('auth/register'); ?>">Register here</a></p>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
