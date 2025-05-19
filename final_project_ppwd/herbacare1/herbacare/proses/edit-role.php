<?php
include "koneksi.php";

// Proses update role jika form disubmit
if (isset($_POST['id']) && isset($_POST['role'])) {
    $id = intval($_POST['id']);
    $role = ($_POST['role'] === 'admin') ? 'admin' : 'user';

    $query = mysqli_query($connect, "UPDATE users SET role='$role' WHERE id=$id");
    if ($query) {
        header("Location: ../pages/admin/data.php?msg=Role berhasil diupdate");
        exit;
    } else {
        $error = "Gagal update role: " . mysqli_error($connect);
    }
}

// Ambil data user berdasarkan id
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = mysqli_query($connect, "SELECT * FROM users WHERE id=$id");

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Edit Role User</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="container mt-5">
            <h2>Edit Role untuk User: <?= htmlspecialchars($user['username']) ?></h2>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="mb-3">
                    <label for="role" class="form-label">Role:</label>
                    <select name="role" id="role" class="form-select" style="width:auto;">
                        <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Role</button>
                <a href="../admin/data.php" class="btn btn-secondary">Kembali ke Data User</a>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "User tidak ditemukan.";
    }
} else {
    echo "ID user tidak ditemukan.";
}
?>