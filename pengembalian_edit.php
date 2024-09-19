<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $id_pengembalian = $_POST['edit_id_pengembalian'];
    $id_peminjaman = $_POST['edit_id_peminjaman'];

    $tanggal_kembali = $_POST['edit_tanggal_kembali'];
    $denda = $_POST['edit_denda'];


    // query
    $sql = "UPDATE pengembalian SET id_peminjaman='$id_peminjaman', tanggal_kembali='$tanggal_kembali', denda='$denda' WHERE id_pengembalian = '$id_pengembalian'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./pengembalian.php?update=sukses');
    else
        header('Location: ./pengembalian.php?update=gagal');
} else
    die("Akses dilarang...");
