<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $isbn = $_POST['edit_isbn'];
    $judul = $_POST['edit_judul'];
    $penulis = $_POST['edit_penulis'];
    $penerbit = $_POST['edit_penerbit'];
    $tahun_terbit = $_POST['edit_tahun_terbit'];


    // query
    $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit'  WHERE isbn = '$isbn'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./buku.php?update=sukses');
    else
        header('Location: ./buku.php?update=gagal');
} else
    die("Akses dilarang...");
