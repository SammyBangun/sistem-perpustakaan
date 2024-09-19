<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['tambah'])) {
    // ambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];


    // query
    $sql = "INSERT INTO users(name, email, username, password, type)
    VALUES('$name', '$email', '$username', '$password', '$type')";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./users.php?status=sukses');
    else
        header('Location: ./users.php?status=gagal');
} else
    die("Akses dilarang...");
