<?php 
    session_start();
    include "../../proses/koneksi.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nama_herbal = $_POST['nama_herbal'];
        $manfaat = $_POST['manfaat'];
        $cara_penggunaan = $_POST['cara_penggunaan'];

        $query = "INSERT INTO herbal (nama_herbal, manfaat, cara_penggunaan) VALUES ('$nama_herbal', '$manfaat', '$cara_penggunaan')";

        if(mysqli_query($connect, $query)){
            header("location: dashboard.php");
        }else{
            echo "Gagal menambahkan data: " . mysqli_error($connect);
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Obat</title>
    <link rel="stylesheet" href="../../css/tambahobatstyles.css">
</head>
<body class="tambah-data-page">
    <div class="container">
        <h2 class="title">Tambah Data Obat</h2>
        <form action="" method="post" class="form-tambah">
            <label>Nama Obat: <input type="text" name="nama_herbal" required></label><br><br>
            <label>manfaat: <input type="text" name="manfaat" required></label><br><br>
            <label>cara penggunaan: <input type="text" name="cara_penggunaan" required></label><br><br>
    </div>
            <button type="submit" class="btn-submit">Simpan</button>
        </form>
        <br>
        <a href="dashboard.php" class="btn-back">Home</a>
    </div>
</body>
</html>