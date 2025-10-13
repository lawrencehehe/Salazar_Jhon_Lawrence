<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body, section {
      width: 100%;
      height: 100vh;
      background: linear-gradient(135deg, #0f172a, #1e293b, #0f172a);
      display: flex;
      justify-content: center;
      align-items: center;
      color: #f1f5f9;
    }

    .login {
      background: rgba(30, 41, 59, 0.85);
      padding: 50px 40px;
      width: 450px;
      border-radius: 20px;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
      border: 1px solid rgba(59, 130, 246, 0.3);
      backdrop-filter: blur(15px);
      animation: fadeIn 0.8s ease;
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      color: #3b82f6;
      margin-bottom: 25px;
    }

    .login input {
      width: 100%;
      padding: 14px 20px;
      margin-bottom: 18px;
      font-size: 1.05em;
      border-radius: 10px;
      border: 1px solid #334155;
      background: rgba(15, 23, 42, 0.9);
      color: #e2e8f0;
      outline: none;
      transition: all 0.3s ease;
    }

    .login input::placeholder {
      color: #94a3b8;
    }

    .login input:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 10px rgba(59, 130, 246, 0.4);
    }

    .password-box {
      position: relative;
    }

    .password-box i {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #3b82f6;
      transition: color 0.3s ease;
    }

    .password-box i:hover {
      color: #60a5fa;
    }

    #btn {
      width: 100%;
      padding: 15px;
      font-size: 1.1em;
      font-weight: 500;
      border: none;
      border-radius: 10px;
      background: linear-gradient(90deg, #2563eb, #3b82f6);
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
    }

    #btn:hover {
      background: linear-gradient(90deg, #1d4ed8, #2563eb);
      box-shadow: 0 0 25px rgba(37, 99, 235, 0.6);
    }

    .group {
      text-align: center;
      margin-top: 10px;
    }

    .group a {
      color: #60a5fa;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s;
    }

    .group a:hover {
      color: #93c5fd;
      text-decoration: underline;
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
      <h2>Register</h2>

      <form method="POST" action="<?= site_url('reg/register'); ?>" class="inputBox">

        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>

        <div class="password-box">
          <input type="password" id="password" name="password" placeholder="Password" required>
          <i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>

        <div class="password-box">
          <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
          <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
        </div>

        <!-- Hidden role input -->
        <input type="hidden" name="role" value="user">

        <button type="submit" id="btn">Register</button>
      </form>

      <div class="group">
        <p>Already have an account? <a href="<?= site_url('reg/login'); ?>">Login here</a></p>
      </div>
    </div>
  </section>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>
