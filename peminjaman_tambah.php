<?php
include("./config.php");

if (isset($_POST['tambah'])) {
    // ambil data dari form
    $id_peminjaman = $_POST['id_peminjaman'];
    $id_member = $_POST['id_member'];
    $isbn = $_POST['isbn'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_jatuhtempo = $_POST['tanggal_jatuhtempo'];
    $status_peminjaman = $_POST['status_peminjaman'];


    // query
    $sql = "INSERT INTO peminjaman(id_peminjaman, id_member, isbn, tanggal_pinjam, tanggal_jatuhtempo, status_peminjaman)
    VALUES('$id_peminjaman', '$id_member', '$isbn', '$tanggal_pinjam', '$tanggal_jatuhtempo', '$status_peminjaman')";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./peminjaman.php?status=sukses');
    else
        header('Location: ./peminjaman.php?status=gagal');
} else
    die("Akses dilarang...");
