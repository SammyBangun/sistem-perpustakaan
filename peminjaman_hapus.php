<?php
include("./config.php");

if (isset($_POST['deletedata'])) {
    // ambil isbn dari query string
    $id_peminjaman = $_POST['delete_id'];

    // query hapus
    $sql = "DELETE FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'";
    $query = mysqli_query($db, $sql);

    // apa query berhasil dihapus?
    if ($query) {
        header('Location: ./peminjaman.php?hapus=sukses');
    } else {
        die('Location: ./peminjaman.php?hapus=gagal');
    }
} else {
    die("akses dilarang...");
}
