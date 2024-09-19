<?php include("./config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>Data Perpustakaan</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>
<style>
    .pilihan {
        display: flex;
        justify-content: space-evenly;
        margin-left: 15%;
    }
</style>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="index.php">Data Perpustakaan</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container-fluid pilihan">
                <a class="navbar-brand" href="buku.php">Buku</a>
                <a class="navbar-brand text-primary text-decoration-underline" href="member.php">Member</a>
                <a class="navbar-brand" href="peminjaman.php">Peminjaman</a>
                <?php if ($_SESSION['type'] == 1) : ?>
                    <a class="navbar-brand" href="pengembalian.php">Pengembalian</a>
                <?php endif ?>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <?php if ($_SESSION['type'] == 1) : ?>
                            <a class="nav-link active text-sm-start text-center" aria-current="page" href="users.php">User</a>
                        <?php endif ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <?php if ($_SESSION['type'] == 1) : ?>
            <!-- form tambah mahasiswa -->
            <div class="card mb-5">
                <!-- <div class="card-header">
                Latihan CRUD PHP & MySQL
            </div> -->
                <!-- tambah data -->
                <div class="card-body">
                    <h3 class="card-title">Tambah Data Member</h3>
                    <p class="card-text">Silahkan tambah data member !</p>

                    <!-- tampilkan pesan sukses ditambah -->
                    <?php if (isset($_GET['status'])) : ?>
                        <?php
                        if ($_GET['status'] == 'sukses')
                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Sukses!</strong> Data berhasil ditambahkan!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                        else
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Data gagal ditambahkan!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                        ?>
                    <?php endif; ?>


                    <form class="row g-3" action="member_tambah.php" method="POST">

                        <div class="col-4">
                            <label for="id_member" class="form-label">ID Member</label>
                            <input type="text" name="id_member" id="id_member" class="form-control" placeholder="MEM-001" required>
                        </div>
                        <div class="col-md-4">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Bari Sugali" required>
                        </div>
                        <div class="col-md-4">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Jalan Bunga Kardiol No.23, Namu Gajah" required>
                        </div>

                        <div class="col-md-4">
                            <label for="no_telp" class="form-label">Nomor Telpon</label>
                            <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="083193550843" required>
                        </div>

                        <div class="col-md-4">
                            <label for="tanggal_reg" class="form-label">Tanggal Registrasi</label>
                            <input type="date" name="tanggal_reg" id="tanggal_reg" class="form-control" placeholder="" required>
                        </div>

                        <div class="col-md-4">
                            <label for="tittle" class="form-label">Status</label>
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="status">Aktif</label>
                                    <input class="form-check-input" type="radio" name="status" value="Aktif">
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="status">Tidak Aktif</label>
                                    <input class="form-check-input" type="radio" name="status" value="Tidak Aktif">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" value="daftar" name="tambah"><i class="fa fa-plus"></i><span class="ms-2">Tambah Data</span></button>
                        </div>
                    </form>
                </div>
            </div>


            <button class="btn btn-success" style="float: right;"><a href="member_report.php" class="fa fa-print" style="color: #fff; text-decoration: none"><span class="ms-2">Cetak Data</span></a></button>
        <?php endif ?>
        <!-- judul tabel -->
        <h3 class="mb-3">Daftar Member</h3>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Tampilkan Entri</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Cari Sesuatu..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- tampilkan pesan sukses dihapus -->
        <?php if (isset($_GET['hapus'])) : ?>
            <?php
            if ($_GET['hapus'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Sukses!</strong> Data berhasil dihapus!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Data gagal dihapus!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tampilkan pesan sukses di edit -->
        <?php if (isset($_GET['update'])) : ?>
            <?php
            if ($_GET['update'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Sukses!</strong> Data berhasil diupdate!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Data gagal diupdate!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabel -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>No</th>";
            echo "<th scope='col'>ID Member</th>";
            echo "<th scope='col'>Nama</th>";
            echo "<th scope='col'>Alamat</th>";
            echo "<th scope='col'>No Telpon</th>";
            echo "<th scope='col'>Tanggal Registrasi</th>";
            echo "<th scope='col'>Status</th>";
            echo "<th scope='col' class='text-center'>Opsi</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $batas = 10;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($db, "SELECT * FROM member");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data = mysqli_query($db, "SELECT * FROM member LIMIT $halaman_awal, $batas");
            $no = $halaman_awal + 1;

            // $sql = "SELECT * FROM mahasiswa";
            // $query = mysqli_query($db, $sql);




            while ($row = mysqli_fetch_array($data)) {
                echo "<tr>";
                // echo "<td style='display:none'>" . $row['id'] . "</td>";
                echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $row['id_member'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['no_telp'] . "</td>";
                echo "<td>" . $row['tanggal_reg'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";


                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                if ($_SESSION['type'] == 1) :
                    // tombol hapus
                    echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                    echo "</td>";

                    echo "</tr>";
                endif;
            }

            echo "</tbody>";
            echo "</table>";
            if ($jumlah_data == 0) {
                echo "<p class='text-center'>Tidak ada data yang tersedia pada tabel ini</p>";
            } else {
                echo "<p>Total $jumlah_data entri</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman > 1) ? "href='?halaman=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman < $total_halaman) ? "href='?halaman=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Modal Edit-->
        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Edit Data Member</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM member";
                    $query = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($query);
                    ?>

                    <form action='member_edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_id_member" class="form-label">ID Member</label>
                                <input type="text" name="edit_id_member" id="edit_id_member" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_nama" class="form-label">Nama</label>
                                <input type="text" name="edit_nama" id="edit_nama" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_alamat" class="form-label">Alamat</label>
                                <input type="text" name="edit_alamat" id="edit_alamat" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_no_telp" class="form-label">No Telpon</label>
                                <input type="text" name="edit_no_telp" id="edit_no_telp" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_tanggal_reg" class="form-label">Tanggal Registrasi</label>
                                <input type="date" name="edit_tanggal_reg" id="edit_tanggal_reg" class="form-control" placeholder="G64190021" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_status" class="form-label">Status</label>
                                <div class="col-md-12" id="status">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="status">
                                            <input class="form-check-input" type="radio" name="edit_status" value="Aktif" id="Aktif">Aktif</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="status">
                                            <input class="form-check-input" type="radio" name="edit_status" value="Tidak Aktif" id="Tidak Aktif">Tidak Aktif</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='edit_data' class='btn btn-primary'>Simpan</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- Modal Delete-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Konfirmasi</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='member_hapus.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>Yakin ingin menghapus data ini?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>Hapus</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- tutup container -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- edit function -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_id_member').val(data[1]);
                $('#edit_nama').val(data[2]);
                $('#edit_alamat').val(data[3]);
                $('#edit_no_telp').val(data[4]);
                $('#edit_tanggal_reg').val(data[5]);
                $('#edit_status').val(data[6]);
                if (data[6] == "Aktif") {
                    $("#Aktif").prop("checked", true);
                } else {
                    $("#Tidak Aktif").prop("checked", true);
                }
            });
        });
    </script>

    <!-- delete function -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[1]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './member.php';
        }
    </script>
</body>

</html>