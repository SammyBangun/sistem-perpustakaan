<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    // $name = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $email = $_POST['edit_email'];
    $username = $_POST['edit_username'];
    $password = $_POST['edit_password'];
    $type = $_POST['edit_type'];


    // query
    $sql = "UPDATE users SET name='$name', email='$email', username='$username', password='$password', type='$type'  WHERE name = '$name'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./users.php?update=sukses');
    else
        header('Location: ./users.php?update=gagal');
} else
    die("Akses dilarang...");
