<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    * { margin:0; padding:0; box-sizing:border-box; font-family:"Poppins", sans-serif; }

body {
  min-height:100vh;
  color:#1b1b2f;
  background: linear-gradient(135deg, #dfe7fd, #e3e8f0);
}

section {
  display:flex;
  justify-content:center;
  align-items:center;
  width:100%;
  min-height:100vh;
  padding:20px;
}

.glass-container {
  background: rgba(255,255,255,0.25);
  backdrop-filter: blur(14px);
  border-radius:20px;
  box-shadow:0 25px 50px rgba(0,0,0,0.1);
  padding:40px;
  max-width:1000px;
  width:100%;
  color:#1b1b2f;
}

.glass-container h1 {
  text-align:center;
  margin-bottom:25px;
  font-size:2.2em;
  color:#4654d8;
  text-shadow:0 3px 8px rgba(0,0,0,0.1);
}

.top-bar {
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:30px;
  flex-wrap:wrap;
  gap:10px;
}

.logout-btn {
  padding:10px 18px;
  background: #5b7cfa;
  border:none;
  border-radius:8px;
  font-weight:600;
  color:#fff;
  cursor:pointer;
  transition:0.3s;
}
.logout-btn:hover {
  background:#4654d8;
  transform:translateY(-2px);
}

.search-form {
  display:flex;
  gap:10px;
  background:rgba(255,255,255,0.3);
  padding:8px 14px;
  border-radius:12px;
  backdrop-filter:blur(6px);
  flex-wrap:wrap;
}
.search-form input {
  border:none;
  border-radius:6px;
  padding:10px;
  font-size:14px;
  flex:1;
}
.search-form input:focus {
  outline:none;
  box-shadow:0 0 8px rgba(91,124,250,0.5);
}
.search-form button {
  padding:10px 18px;
  font-size:14px;
  font-weight:600;
  border:none;
  border-radius:6px;
  background:linear-gradient(to right,#5b7cfa,#4654d8);
  color:#fff;
  cursor:pointer;
  transition:0.3s;
}
.search-form button:hover {
  background:linear-gradient(to right,#4654d8,#3c45c0);
  transform:translateY(-2px);
}

table {
  width:100%;
  border-collapse:collapse;
  border-radius:16px;
  overflow:hidden;
  box-shadow:0 8px 25px rgba(0,0,0,0.15);
  background:rgba(255,255,255,0.3);
  backdrop-filter:blur(8px);
  margin-bottom:20px;
}
th, td {
  padding:16px;
  text-align:center;
  font-size:15px;
}
th {
  background:#5b7cfa;
  color:#fff;
  text-transform:uppercase;
  font-size:14px;
  letter-spacing:0.06em;
}
td {
  color:#1b1b2f;
  border-bottom:1px solid rgba(255,255,255,0.3);
}
tr:last-child td { border-bottom:none; }
tr:hover {
  background: rgba(255,255,255,0.4);
  transition:0.3s ease;
}

a {
  padding:6px 12px;
  border-radius:6px;
  font-size:13px;
  font-weight:600;
  text-decoration:none;
  margin:0 4px;
  display:inline-block;
  transition:0.3s ease;
}
a[href*="update"] {
  background:#3ecf8e;
  color:#fff;
}
a[href*="update"]:hover {
  background:#33b37a;
  transform:translateY(-2px);
}
a[href*="delete"] {
  background:#f55d5d;
  color:#fff;
}
a[href*="delete"]:hover {
  background:#e04848;
  transform:translateY(-2px);
}

.btn-create {
  width:50%;
  padding:15px;
  border:none;
  background:#5b7cfa;
  color:#fff;
  font-size:1.25em;
  font-weight:500;
  border-radius:5px;
  cursor:pointer;
  transition:0.3s;
}
.btn-create:hover {
  background:#4654d8;
  transform:translateY(-2px);
}
.button-container {
  text-align:center;
  margin-top:20px;
}

.user-status {
  background:#eef2ff;
  border:1px solid #ccd4ff;
  padding:10px 15px;
  border-radius:8px;
  display:inline-block;
  color:#4654d8;
  font-size:14px;
  margin-bottom:20px;
}
.user-status strong { font-weight:600; }
.user-status .role { font-size:13px; color:#555; }

.pagination-container {
  display:flex;
  justify-content:center;
  margin:25px 0;
}
.pagination-container ul {
  display:flex;
  list-style:none;
  gap:8px;
  padding:0;
  margin:0;
}
.pagination-container li a, .pagination-container li span {
  display:block;
  padding:10px 16px;
  border:1px solid rgba(255,255,255,0.3);
  border-radius:8px;
  background:rgba(255,255,255,0.3);
  backdrop-filter:blur(6px);
  color:#1b1b2f;
  font-size:14px;
  text-decoration:none;
  transition:all 0.3s ease;
}
.pagination-container li a:hover {
  background:#5b7cfa;
  color:#fff;
  transform:translateY(-2px);
}
.pagination-container li.active span {
  background:#4654d8;
  color:#fff;
  border-color:#4654d8;
  font-weight:bold;
}

@media (max-width:768px){
  .top-bar { flex-direction:column; gap:15px; align-items:stretch; }
  .search-form { width:100%; justify-content:space-between; }
  .search-form input { flex:1; min-width:0; }
  th, td { padding:8px; font-size:13px; }
  .btn-create { width:100%; font-size:1em; }
}


  </style>
</head>
<body>
  <section>
    <div class="glass-container">
      <h1><?= ($logged_in_user['role']==='admin') ? 'Admin Dashboard':'User Dashboard'; ?></h1>

      <div class="top-bar">
        <a href="<?=site_url('auth/logout');?>"><button class="logout-btn">Logout</button></a>
        <form action="<?=site_url('users');?>" method="get" class="search-form">
          <?php $q = $_GET['q'] ?? ''; ?>
          <input type="text" name="q" placeholder="Search" value="<?=html_escape($q);?>">
          <button type="submit">Search</button>
        </form>
      </div>

      <div class="table-responsive">
      <table>
        <tr>
          <th>ID</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <?php if ($logged_in_user['role']==='admin'): ?>
            <th>Role</th>
          <?php endif; ?>
          <th>Action</th>
        </tr>
        <?php foreach($users as $user): ?>
        <tr>
          <td><?=html_escape($user['id']);?></td>
          <td><?=html_escape($user['firstname']);?></td>
          <td><?=html_escape($user['lastname']);?></td>
          <td><?=html_escape($user['email']);?></td>
          <?php if($logged_in_user['role']==='admin'): ?>
            <td><?=html_escape($user['role']);?></td>
          <?php endif; ?>
          <td>
            <a href="<?=site_url('/users/update/'.$user['id']);?>">Update</a>
            <a href="<?=site_url('/users/delete/'.$user['id']);?>">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </table>
      </div>

      <div class="pagination-container">
        <?= $page; ?>
      </div>

      <?php if($logged_in_user['role']==='admin'): ?>
      <div class="button-container">
        <a href="<?=site_url('users/create');?>" class="btn-create">+ Create New User</a>
      </div>
      <?php endif; ?>
    </div>
  </section>
</body>
</html>
