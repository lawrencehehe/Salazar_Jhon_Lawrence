<?php
// Ensure $logged_in_user is defined to avoid undefined variable error
if (!isset($logged_in_user)) {
    $logged_in_user = ['role' => 'user']; // default to normal user if not set
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 min-h-screen flex items-center justify-center font-sans text-gray-100">

  <div class="bg-gray-800 bg-opacity-90 backdrop-blur-md p-8 rounded-2xl shadow-2xl w-full max-w-md border border-gray-700 animate-fadeIn">
    <h1 class="text-3xl font-bold text-center text-indigo-400 mb-6">Create User</h1>

    <form id="user-form" action="<?=site_url('users/create/')?>" method="POST" class="space-y-5">

      <!-- Username -->
      <div>
        <input type="text" name="username" placeholder="Username" required
               value="<?= isset($username) ? html_escape($username) : '' ?>"
               class="w-full px-4 py-3 border border-gray-700 bg-gray-900 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none text-gray-100 placeholder-gray-400">
      </div>

      <!-- Email -->
      <div>
        <input type="email" name="email" placeholder="Email" required
               value="<?= isset($email) ? html_escape($email) : '' ?>"
               class="w-full px-4 py-3 border border-gray-700 bg-gray-900 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none text-gray-100 placeholder-gray-400">
      </div>

      <!-- Password with toggle -->
      <div class="relative">
        <input type="password" name="password" id="password" placeholder="Password" required
               class="w-full px-4 py-3 border border-gray-700 bg-gray-900 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none text-gray-100 placeholder-gray-400">
        <i class="fa-solid fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-indigo-400 hover:text-indigo-300" id="togglePassword"></i>
      </div>

      <!-- Role -->
      <?php if($logged_in_user['role'] === 'admin'): ?>
        <div>
          <select name="role" required
                  class="w-full px-4 py-3 border border-gray-700 bg-gray-900 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none text-gray-100">
            <option value="" disabled selected>Select Role</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
        </div>
      <?php else: ?>
        <!-- Normal users can only create a user account -->
        <input type="hidden" name="role" value="user">
      <?php endif; ?>

      <!-- Submit -->
      <button type="submit"
              class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
        ➕ Create User
      </button>
    </form>

    <div class="text-center mt-6">
      <a href="<?=site_url('/users'); ?>" 
         class="inline-block bg-gray-700 hover:bg-gray-600 text-gray-200 py-2 px-5 rounded-xl shadow-md transition duration-200">
        ⬅ Return to Home
      </a>
    </div>
  </div>

  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.8s ease;
    }
  </style>

  <!-- FontAwesome for password icon -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>

  <!-- Password Toggle -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const togglePassword = document.getElementById('togglePassword');
      const password = document.getElementById('password');

      if (togglePassword && password) {
        togglePassword.addEventListener('click', function () {
          const type = password.type === 'password' ? 'text' : 'password';
          password.type = type;
          this.classList.toggle('fa-eye');
          this.classList.toggle('fa-eye-slash');
        });
      }
    });
  </script>

</body>
</html>
