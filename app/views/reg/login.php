<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body, html {
      width: 100%;
      height: 100%;
    }

    /* Dark background with gradient */
    section {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100vh;
      background: linear-gradient(135deg, #0f172a, #1e293b, #0f172a);
      color: #f1f5f9;
    }

    /* Glassmorphism login container */
    .login {
      background: rgba(30, 41, 59, 0.85);
      padding: 50px 40px;
      width: 420px;
      border-radius: 20px;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
      border: 1px solid rgba(59, 130, 246, 0.3);
      backdrop-filter: blur(15px);
      display: flex;
      flex-direction: column;
      gap: 25px;
      animation: fadeIn 0.8s ease;
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      color: #3b82f6;
      margin-bottom: 10px;
    }

    .inputBox {
      position: relative;
      margin-bottom: 15px;
    }

    .inputBox input {
      width: 100%;
      padding: 15px 45px 15px 20px;
      font-size: 1.05em;
      color: #e2e8f0;
      border-radius: 10px;
      background: rgba(15, 23, 42, 0.9);
      border: 1px solid #334155;
      outline: none;
      transition: all 0.3s ease;
    }

    .inputBox input:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 10px rgba(59, 130, 246, 0.4);
    }

    .inputBox ::placeholder {
      color: #94a3b8;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #3b82f6;
      transition: color 0.3s ease;
    }

    .toggle-password:hover {
      color: #60a5fa;
    }

    button {
      width: 100%;
      padding: 15px;
      border: none;
      background: linear-gradient(90deg, #2563eb, #3b82f6);
      color: #fff;
      font-size: 1.1em;
      font-weight: 500;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
    }

    button:hover {
      background: linear-gradient(90deg, #1d4ed8, #2563eb);
      box-shadow: 0 0 25px rgba(37, 99, 235, 0.6);
    }

    .group {
      text-align: center;
    }

    .group a {
      font-size: 0.95em;
      color: #60a5fa;
      font-weight: 500;
      text-decoration: none;
      transition: 0.3s;
    }

    .group a:hover {
      text-decoration: underline;
      color: #93c5fd;
    }

    .error-box {
      background: rgba(239, 68, 68, 0.15);
      color: #f87171;
      padding: 10px;
      border: 1px solid rgba(239, 68, 68, 0.4);
      border-radius: 8px;
      text-align: center;
      font-size: 0.95em;
      margin-bottom: 10px;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <section>
    <div class="login">
      <h2>Login</h2>

      <?php if (!empty($error)): ?>
        <div class="error-box">
          <?= $error ?>
        </div>
      <?php endif; ?>

      <form method="post" action="<?= site_url('reg/login') ?>">
        <div class="inputBox">
          <input type="text" placeholder="Username" name="username" required>
        </div>

        <div class="inputBox">
          <input type="password" placeholder="Password" name="password" id="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>

        <button type="submit" id="btn">Login</button>
      </form>

      <div class="group">
        <p style="font-size: 0.9em;">
          Don't have an account? <a href="<?= site_url('reg/register'); ?>">Register here</a>
        </p>
      </div>
    </div>
  </section>

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
