<?php
include("./config.php");

if (isset($_POST['deletedata'])) {
    // ambil name dari query string
    $name = $_POST['delete_id'];

    // query hapus
    $sql = "DELETE FROM users WHERE name = '$name'";
    $query = mysqli_query($db, $sql);

    // apa query berhasil dihapus?
    if ($query) {
        header('Location: ./users.php?hapus=sukses');
    } else {
        die('Location: ./users.php?hapus=gagal');
    }
} else {
    die("akses dilarang...");
}
