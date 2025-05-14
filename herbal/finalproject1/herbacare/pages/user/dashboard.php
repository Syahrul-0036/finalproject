<?php
session_start();
$email = $_SESSION['username'];
if (empty($email)) {
    header("location:login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel = "stylesheet" href="../css/styleshome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- <img class="bg-img" src="../pertemuan7/tugas3/assets/whitesky21.jpg" alt="bg">
    <img class ="bg-img"src="..pertemuan7/tugas3/assets/whitesky21.jpg" alt="bg"> -->

    <!-- <img class="bg-img" src="../assets/libraryperpustest1.jpg" alt="bg"> -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">HerbaCare</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <form action="search.php" method="get">
        <input type="text" name="kata_kunci" placeholder="Cari...">
        <input type="submit" value="Cari">
        </form>
        <li class="nav-item">
          <a class="nav-link" href="../proses/logout.php">Log out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>