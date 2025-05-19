<?php
session_start();
include "../../proses/koneksi.php";
$result = mysqli_query($connect, "SELECT * FROM users");
if(!$result){
  die("data kosong : " . mysqli_error($connect));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap" rel="stylesheet">

</head>
<script>
document.querySelectorAll('.role-dropdown').forEach(function(select) {
  select.addEventListener('change', function() {
    var userId = this.getAttribute('data-id');
    var newRole = this.value;
    fetch('../../proses/update.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: 'id=' + encodeURIComponent(userId) + '&role=' + encodeURIComponent(newRole)
    })
    .then(response => response.text())
    .then(data => {
      // Optional: tampilkan notifikasi
      // alert(data);
    });
  });
});
</script>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">HerbaCare</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">Home</a>
          </li>
           <a class="nav-link active" href="profile.php">Tambah Profile</a>
          <li class="nav-item">
            <a class="nav-link" href="herbal.php">Herbal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data.php">Data Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../proses/logout.php">Log out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
   <table>...

<?php
// Proses update role per user
if (isset($_POST['update_role'])) {
    $userId = intval($_POST['user_id']);
    $role = ($_POST['role'] === 'admin') ? 'admin' : 'user';
    $update = mysqli_query($connect, "UPDATE users SET role='$role' WHERE id=$userId");
    if ($update) {
        header("Location: data.php?msg=Role user berhasil diubah");
        exit;
    } else {
        echo '<div class="alert alert-danger">Gagal update role: ' . mysqli_error($connect) . '</div>';
    }
}
?>
<h3 align="center"><strong>DATA USERS</strong></h3>
<table align="center" border="3">
    <thead>
      <tr>
          <th>Id</th>
          <th>Username</th>
          <th>Role</th>
          
      </tr>
    </thead>
  <tbody>
    <?php if($result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['username']) ?></td>
        <td>
          <form method="POST" action="">
            <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
            <select name="role" class="form-select" style="width:auto;display:inline-block;">
              <option value="user" <?= $row['role'] === 'user' ? 'selected' : '' ?>>user</option>
              <option value="admin" <?= $row['role'] === 'admin' ? 'selected' : '' ?>>admin</option>
            </select>
            <button type="submit" name="update_role" class="btn btn-success btn-sm">Simpan</button>
          </form>
        </td>
        <td>
          <a href="../../proses/edit-role.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
          <a href="../../proses/hapus-data.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus user ini?')">Hapus</a>
        </td>
      </tr>
    <?php endwhile; ?>
  <?php endif; ?>
</tbody>
  </tbody>
</table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>

<?php
mysqli_close($connect);
?>