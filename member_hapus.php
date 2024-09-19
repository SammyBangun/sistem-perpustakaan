<?php
include("./config.php");

if (isset($_POST['deletedata'])) {
    // ambil isbn dari query string
    $id_member = $_POST['delete_id'];

    // query hapus
    $sql = "DELETE FROM member WHERE id_member = '$id_member'";
    $query = mysqli_query($db, $sql);

    // apa query berhasil dihapus?
    if ($query) {
        header('Location: ./member.php?hapus=sukses');
    } else {
        die('Location: ./member.php?hapus=gagal');
    }
} else {
    die("akses dilarang...");
}
