<?php
include("./config.php");

if (isset($_POST['deletedata'])) {
    // ambil isbn dari query string
    $isbn = $_POST['delete_id'];

    // query hapus
    $sql = "DELETE FROM buku WHERE isbn = '$isbn'";
    $query = mysqli_query($db, $sql);

    // apa query berhasil dihapus?
    if ($query) {
        header('Location: ./buku.php?hapus=sukses');
    } else {
        die('Location: ./buku.php?hapus=gagal');
    }
} else {
    die("akses dilarang...");
}
