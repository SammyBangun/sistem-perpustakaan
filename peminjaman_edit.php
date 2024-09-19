<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $id_peminjaman = $_POST['edit_id_peminjaman'];
    $id_member = $_POST['edit_id_member'];
    $isbn = $_POST['edit_isbn'];
    $tanggal_pinjam = $_POST['edit_tanggal_pinjam'];
    $tanggal_jatuhtempo = $_POST['edit_tanggal_jatuhtempo'];
    $status_peminjaman = $_POST['edit_status_peminjaman'];


    // query
    $sql = "UPDATE peminjaman SET id_member='$id_member', isbn='$isbn', tanggal_pinjam='$tanggal_pinjam', tanggal_jatuhtempo='$tanggal_jatuhtempo', status_peminjaman='$status_peminjaman' WHERE id_peminjaman = '$id_peminjaman'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./peminjaman.php?update=sukses');
    else
        header('Location: ./peminjaman.php?update=gagal');
} else
    die("Akses dilarang...");
