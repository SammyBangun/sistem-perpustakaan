<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['tambah'])) {
    // ambil data dari form
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];


    // query
    $sql = "INSERT INTO buku(isbn, judul, penulis, penerbit, tahun_terbit)
    VALUES('$isbn', '$judul', '$penulis', '$penerbit', '$tahun_terbit')";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./buku.php?status=sukses');
    else
        header('Location: ./buku.php?status=gagal');
} else
    die("Akses dilarang...");
