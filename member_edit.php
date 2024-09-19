<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $id_member = $_POST['edit_id_member'];
    $nama = $_POST['edit_nama'];
    $alamat = $_POST['edit_alamat'];
    $no_telp = $_POST['edit_no_telp'];
    $tanggal_reg = $_POST['edit_tanggal_reg'];
    $status = $_POST['edit_status'];


    // query
    $sql = "UPDATE member SET nama='$nama', alamat='$alamat', no_telp='$no_telp', tanggal_reg='$tanggal_reg', status='$status' WHERE id_member = '$id_member'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./member.php?update=sukses');
    else
        header('Location: ./member.php?update=gagal');
} else
    die("Akses dilarang...");
