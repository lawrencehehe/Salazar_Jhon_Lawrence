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

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #f0f7f5, #ffffff);
    }

    .register {
      background: #fff;
      padding: 35px 30px;
      border-radius: 15px;
      width: 95%;
      max-width: 380px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .register:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
    }

    .register h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #2C786C;
      font-size: 1.8em;
      letter-spacing: 0.5px;
    }

    .register .inputBox {
      position: relative;
      margin-bottom: 18px;
    }

    .register .inputBox input {
      width: 100%;
      padding: 12px 42px 12px 12px;
      font-size: 1em;
      border-radius: 8px;
      border: 1px solid #cdd9d6;
      background: #f8fbfa;
      transition: all 0.3s ease;
    }

    .register .inputBox input:focus {
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

    .register button {
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

    .register button:hover {
      background: #3E9C8C;
      transform: translateY(-2px);
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
      .register {
        padding: 25px 20px;
      }

      .register h2 {
        font-size: 1.5em;
      }
    }
  </style>
</head>
<body>
  <div class="register">
    <h2>Create Account</h2>
    <form method="POST" action="<?= site_url('auth/register'); ?>">
      <div class="inputBox">
        <input type="text" name="firstname" placeholder="Firstname" required>
      </div>

      <div class="inputBox">
        <input type="text" name="lastname" placeholder="Lastname" required>
      </div>

      <div class="inputBox">
        <input type="email" name="email" placeholder="Email" required>
      </div>

      <div class="inputBox">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <div class="inputBox">
        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <button type="submit">Register</button>
    </form>

    <div class="group">
      <p>Already have an account? <a href="<?= site_url('/auth/login'); ?>">Login here</a></p>
    </div>
  </div>

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
