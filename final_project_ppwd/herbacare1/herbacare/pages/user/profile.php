<?php
session_start();
include '../../proses/koneksi.php'; // Pastikan path sesuai

// Ambil username dari session
$username = $_SESSION['username'];

// Ambil data user dari database
$query = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");
$user = mysqli_fetch_assoc($query);

// Proses update profil
if (isset($_POST['update'])) {
    $username_baru = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    $update = mysqli_query($connect, "UPDATE users SET password='$password', username='$username_baru' WHERE username='$username'");

    if ($update) {
        $_SESSION['username'] = $username_baru; // Update session jika username berubah
        echo "<script>alert('Profil berhasil diupdate!');window.location='profile.php';</script>";
    } else {
        echo "<script>alert('Gagal update profil!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil</title>
</head>
<body>
    <h2>Edit Profil</h2>
    <form method="post">
        <label>Username:</label><br>
        <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required><br><br>
        <button type="submit" name="update">Update Profil</button>
    </form>
</body>
</html>