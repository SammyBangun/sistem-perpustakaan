<?php
include("./config.php");

if (isset($_POST['deletedata'])) {
    // ambil isbn dari query string
    $id_pengembalian = $_POST['delete_id'];

    // query hapus
    $sql = "DELETE FROM pengembalian WHERE id_pengembalian = '$id_pengembalian'";
    $query = mysqli_query($db, $sql);

    // apa query berhasil dihapus?
    if ($query) {
        header('Location: ./pengembalian.php?hapus=sukses');
    } else {
        die('Location: ./pengembalian.php?hapus=gagal');
    }
} else {
    die("akses dilarang...");
}
