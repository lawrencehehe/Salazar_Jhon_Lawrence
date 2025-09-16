<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Index</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col items-center py-10">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Welcome to Index View</h1>
    <div class="overflow-x-auto w-full max-w-5xl px-4">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm border-b border-gray-700">id</th>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm border-b border-gray-700">firstname</th>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm border-b border-gray-700">lastname</th>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm border-b border-gray-700">email</th>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm border-b border-gray-700">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach(html_escape($users) as $user): ?>
                <tr class="hover:bg-gray-100 border-b border-gray-200">
                    <td class="py-3 px-6 text-gray-700"><?=($user['id']); ?></td>
                    <td class="py-3 px-6 text-gray-700"><?=($user['firstname']); ?></td>
                    <td class="py-3 px-6 text-gray-700"><?=($user['lastname']); ?></td>
                    <td class="py-3 px-6 text-gray-700"><?=($user['email']); ?></td>
                    <td class="py-3 px-6 text-gray-700"><a href="<?=site_url('users/update/'.$user['id']);?>">Update</a> | <a href="<?=site_url('users/delete/'.$user['id']);?>">Delete</a> </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
            <a href="<?= site_url('users/create'); ?>" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-300">Create New User</a>
    </div>
</body>
</html>