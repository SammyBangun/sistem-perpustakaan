<?php
# Initialize the session
include("./config.php");
session_start();




# If user is not logged in then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
  echo "<script>" . "window.location.href='./login.php';" . "</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
  <title>Data Perpustakaan</title>

  <!-- bootstrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <!-- material icon -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <link rel="stylesheet" href="./css/style.css">
</head>
<style>
  .pilihan {
    display: flex;
    justify-content: space-evenly;
    margin-left: 15%;
  }
</style>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
    <div class="container-fluid container">
      <a class="navbar-brand" href="#">Data Perpustakaan</a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="container-fluid pilihan">
        <a class="navbar-brand" href="buku.php">Buku</a>
        <a class="navbar-brand" href="member.php">Member</a>
        <a class="navbar-brand" href="peminjaman.php">Peminjaman</a>
        <?php if ($_SESSION['type'] == 1) : ?>
          <a class="navbar-brand" href="pengembalian.php">Pengembalian</a>
        <?php endif ?>
      </div>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
            <?php if ($_SESSION['type'] == 1) : ?>
              <a class="nav-link active text-sm-start text-center" aria-current="page" href="users.php">User</a>
            <?php endif ?>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-primary ms-md-4 text-white" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="card-body">
    <!-- User profile -->
    <div class="row justify-content-center">
      <div class="col-lg-5 text-center">
        <!-- <img src="./img/blank-avatar.jpg" class="img-fluid rounded" alt="User avatar" width="180"> -->
        <h4 class="my-4">Halo, selamat datang <?= htmlspecialchars($_SESSION["username"]); ?></h4>
      </div>
    </div>
  </div>
</body>

</html>