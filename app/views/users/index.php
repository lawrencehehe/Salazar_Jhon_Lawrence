<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Students Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 30px; 
            font-weight: 700;
            letter-spacing: 1px;
        }

        .table-container {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        table {
            margin-bottom: 0;
        }

        th {
            background: #4f6df5;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 14px;
        }

        td {
            font-size: 15px;
            color: #444;
        }

        tr:hover td {
            background-color: #f7f9fc;
            transition: background-color 0.3s ease;
        }

        .action-btn {
            margin: 0 4px;
            font-size: 14px;
            padding: 6px 10px;
            border-radius: 6px;
            font-weight: 600;
        }

        .btn-create {
            display: inline-block;
            padding: 12px 22px;
            background: linear-gradient(to right, #28a745, #20c997);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .btn-create:hover {
            background: linear-gradient(to right, #218838, #198754);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <h1>Students Info</h1>

    <!-- Search Form -->
    <div class="container mb-4">
        <form action="<?=site_url('users');?>" method="get" class="d-flex justify-content-end">
            <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
            <input class="form-control me-2" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>" style="max-width:300px;">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <!-- Table -->
    <div class="container table-container">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th width="30%">First Name</th>
                    <th width="30%">Last Name</th>
                    <th width="40%">Email</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $users): ?>
                <tr>
                    <td><?=$users['id']; ?></td>
                    <td><?=$users['firstname']; ?></td>
                    <td><?=$users['lastname']; ?></td>
                    <td><?=$users['email']; ?></td>
                    <td>
                        <a href="<?=site_url('/users/update/'.$users['id']);?>" class="btn btn-info text-white action-btn">Update</a>
                        <a href="<?=site_url('/users/delete/'.$users['id']);?>" class="btn btn-danger action-btn">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="mt-3">
            <?= $page; ?>
        </div>
    </div>

    <!-- Create Button -->
    <div class="text-center mt-4">
        <a href="<?=site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
    </div>
</body>
</html>
