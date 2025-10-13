<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory - Dark Mode</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    /* Pagination styling */
    .pagination {
      display: flex;
      gap: 0.5rem;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 1.5rem;
    }
    .pagination a {
      display: inline-block;
      padding: 0.5rem 1rem;
      background-color: #3b82f6; /* Blue */
      color: white;
      border-radius: 0.5rem;
      text-decoration: none;
      font-weight: 500;
      transition: background-color 0.2s ease-in-out;
    }
    .pagination a:hover {
      background-color: #2563eb;
    }
    .pagination strong {
      display: inline-block;
      padding: 0.5rem 1rem;
      background-color: #1e40af;
      color: white;
      border-radius: 0.5rem;
      font-weight: 600;
    }
  </style>
</head>

<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 min-h-screen font-sans text-gray-100">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-indigo-700 to-purple-700 shadow-lg border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="#" class="text-white font-semibold text-xl tracking-wide flex items-center gap-2">
        <span>📊</span> User Management
      </a>
      <a href="<?=site_url('reg/logout');?>" 
         class="bg-gray-100 text-gray-900 font-semibold px-4 py-2 rounded-lg shadow hover:bg-gray-300 transition">
         Logout
      </a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-gray-800 bg-opacity-90 shadow-2xl rounded-2xl p-8 border border-gray-700">

      <!-- Logged In User Display -->
      <?php if(!empty($logged_in_user)): ?>
        <div class="mb-8 bg-gradient-to-r from-indigo-900 to-purple-800 text-white px-6 py-5 rounded-xl shadow text-center">
          <h2 class="text-3xl font-bold mb-1">
            Welcome, <span class="font-semibold text-blue-400"><?= html_escape($logged_in_user['username']); ?></span>!
          </h2>
          <p class="text-lg text-gray-300">Role: 
            <span class="font-semibold text-indigo-300"><?= html_escape($logged_in_user['role']); ?></span>
          </p>
        </div>
      <?php else: ?>
        <div class="mb-6 bg-red-900 text-red-200 px-4 py-3 rounded-lg shadow text-center">
          Logged in user not found
        </div>
      <?php endif; ?>

      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-indigo-400">👥 User Directory</h1>

        <!-- Search Bar -->
        <form method="get" action="<?=site_url('users');?>" class="flex">
          <input 
            type="text" 
            name="q" 
            value="<?=html_escape($_GET['q'] ?? '')?>" 
            placeholder="Search user..." 
            class="w-full border border-gray-600 bg-gray-900 rounded-l-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-200 placeholder-gray-400">
          <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 rounded-r-xl transition">
            🔍
          </button>
        </form>
      </div>
      
      <!-- Table -->
      <div class="overflow-x-auto rounded-xl border border-gray-700">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-gradient-to-r from-indigo-700 to-purple-700 text-white">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Username</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Role</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-700">
            <?php foreach(html_escape($users) as $user): ?>
              <tr class="hover:bg-gray-700/60 transition duration-200">
                <td class="py-3 px-4 text-gray-300"><?=($user['id']);?></td>
                <td class="py-3 px-4 font-semibold text-gray-100"><?=($user['username']);?></td>
                <td class="py-3 px-4">
                  <span class="bg-gray-700 text-indigo-300 text-sm font-medium px-3 py-1 rounded-full">
                    <?=($user['email']);?>
                  </span>
                </td>
                <td class="py-3 px-4 font-medium text-gray-200"><?=($user['role']);?></td>
                <td class="py-3 px-4 space-x-3">
                  <?php if($logged_in_user['role'] === 'admin' || $logged_in_user['id'] == $user['id']): ?>
                    <a href="<?=site_url('users/update/'.$user['id']);?>"
                       class="px-4 py-2 text-sm font-medium rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition duration-200 shadow">
                      ✏️ Update
                    </a>
                  <?php endif; ?>

                  <?php if($logged_in_user['role'] === 'admin'): ?>
                    <a href="<?=site_url('users/delete/'.$user['id']);?>"
                       onclick="return confirm('Are you sure you want to delete this record?');"
                       class="px-4 py-2 text-sm font-medium rounded-lg bg-red-600 text-white hover:bg-red-700 transition duration-200 shadow">
                      🗑️ Delete
                    </a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-6 flex justify-center">
        <div class="pagination">
          <?= $page; ?>
        </div>
      </div>

      <!-- Create New User -->
      <div class="mt-8 text-center">
        <a href="<?=site_url('users/create')?>"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-3 rounded-lg shadow-md transition duration-200">
          ➕ Create New User
        </a>
      </div>

    </div>
  </div>

</body>
</html>
