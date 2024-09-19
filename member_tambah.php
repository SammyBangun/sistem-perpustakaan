<?php
include("./config.php");

if (isset($_POST['tambah'])) {
    // ambil data dari form
    $id_member = $_POST['id_member'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $tanggal_reg = $_POST['tanggal_reg'];
    $status = $_POST['status'];


    // query
    $sql = "INSERT INTO member(id_member, nama, alamat, no_telp, tanggal_reg, status)
    VALUES('$id_member', '$nama', '$alamat', '$no_telp', '$tanggal_reg', '$status')";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./member.php?status=sukses');
    else
        header('Location: ./member.php?status=gagal');
} else
    die("Akses dilarang...");
