<?php
include("./config.php");

if (isset($_POST['tambah'])) {
    // ambil data dari form
    $id_pengembalian = $_POST['id_pengembalian'];
    $id_peminjaman = $_POST['id_peminjaman'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $denda = $_POST['denda'];


    // query
    $sql = "INSERT INTO pengembalian(id_pengembalian, id_peminjaman, tanggal_kembali, denda)
    VALUES('$id_pengembalian', '$id_peminjaman', '$tanggal_kembali', '$denda')";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./pengembalian.php?status=sukses');
    else
        header('Location: ./pengembalian.php?status=gagal');
} else
    die("Akses dilarang...");
