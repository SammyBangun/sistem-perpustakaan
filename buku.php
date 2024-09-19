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
                <a class="navbar-brand text-primary text-decoration-underline" href="buku.php">Buku</a>
                <a class="navbar-brand" href="member.php">Member</a>
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
                <div class="card-body luar">
                    <h3 class="card-title">Tambah Data Buku</h3>
                    <p class="card-text">Silahkan tambah data buku !</p>

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


                    <form class="row g-3" action="buku_tambah.php" method="POST">

                        <div class="col-4">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" name="isbn" id="isbn" class="form-control" placeholder="978-0307409326" required>
                        </div>
                        <div class="col-md-4">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" placeholder="To Kill a Mockingbird" required>
                        </div>
                        <div class="col-md-4">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Harper Lee" required>
                        </div>

                        <!-- <div class="col-md-4">
                        <label for="Agama" class="form-label">Agama</label>
                        <select class="form-select" name="agama" aria-label="Default select example">
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Islam">Islam</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Katolik">Katolik</option>
                        </select>
                    </div> -->

                        <!-- <div class="col-md-4">
                        <label for="tittle" class="form-label">Jenis Kelamin</label>
                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="jenis_kelamin">Laki-Laki</label>
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="jenis_kelamin">Perempuan</label>
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                            </div>
                        </div>
                    </div> -->

                        <div class="col-md-6">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" name="penerbit" id="penerbit" class="form-control" placeholder="Creative Media" required>
                        </div>

                        <div class="col-md-6">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                            <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" placeholder="2004" required>
                        </div>

                        <!-- <div class="col-md-6">
                        <label for="IPK" class="form-label">IPK</label>
                        <input type="number" step=0.01 name="IPK" class=" form-control" placeholder="3.52" required>
                    </div> -->

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" value="daftar" name="tambah"><i class="fa fa-plus"></i><span class="ms-2">Tambah Data</span></button>
                        </div>
                    </form>
                </div>
            </div>


            <button class="btn btn-success" style="float: right;"><a href="buku_report.php" class="fa fa-print" style="color: #fff; text-decoration: none"><span class="ms-2">Cetak Data</span></a></button>
        <?php endif ?>
        <!-- judul tabel -->
        <h3 class="mb-3">Daftar Buku</h3>


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
            echo "<th scope='col'>ISBN</th>";
            echo "<th scope='col'>Judul</th>";
            echo "<th scope='col'>Penulis</th>";
            echo "<th scope='col'>Penerbit</th>";
            echo "<th scope='col'>Tahun Terbit</th>";
            // echo "<th scope='col'>Agama</th>";
            // echo "<th scope='col'>IPK</th>";
            if ($_SESSION['type'] == 1) :
                echo "<th scope='col' class='text-center'>Opsi</th>";
            endif;
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $batas = 10;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($db, "SELECT * FROM buku");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data = mysqli_query($db, "SELECT * FROM buku LIMIT $halaman_awal, $batas");
            $no = $halaman_awal + 1;

            // $sql = "SELECT * FROM mahasiswa";
            // $query = mysqli_query($db, $sql);




            while ($row = mysqli_fetch_array($data)) {
                echo "<tr>";
                // echo "<td style='display:none'>" . $row['id'] . "</td>";
                echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $row['isbn'] . "</td>";
                echo "<td>" . $row['judul'] . "</td>";
                echo "<td>" . $row['penulis'] . "</td>";
                echo "<td>" . $row['penerbit'] . "</td>";
                echo "<td>" . $row['tahun_terbit'] . "</td>";

                if ($_SESSION['type'] == 1) :
                    echo "<td class='text-center'>";

                    echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

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
                        <h5 class='modal-title' id='exampleModalLabel'>Edit Data Buku</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM buku";
                    $query = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($query);
                    ?>

                    <form action='buku_edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_isbn" class="form-label">ISBN</label>
                                <input type="text" name="edit_isbn" id="edit_isbn" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_judul" class="form-label">Judul</label>
                                <input type="text" name="edit_judul" id="edit_judul" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_penulis" class="form-label">Penulis</label>
                                <input type="text" name="edit_penulis" id="edit_penulis" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_penerbit" class="form-label">Penerbit</label>
                                <input type="text" name="edit_penerbit" id="edit_penerbit" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_tahun_terbit" class="form-label">Tahun Terbit</label>
                                <input type="text" name="edit_tahun_terbit" id="edit_tahun_terbit" class="form-control" placeholder="" required>
                            </div>


                            <!-- <div class="col-12 mb-3">
                                <label for="edit_jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <div class="col-md-12" id="gender">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="jenis_kelamin">
                                            <input class="form-check-input" type="radio" name="edit_jenis_kelamin" value="Laki-Laki" id="cowok">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="jenis_kelamin">
                                            <input class="form-check-input" type="radio" name="edit_jenis_kelamin" value="Perempuan" id="cewek">Perempuan</label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 mb-3">
                                <label for="edit_urusan" class="form-label">Jurusan</label>
                                <input type="text" name="edit_jurusan" class="form-control" id="edit_jurusan" placeholder="Ilmu Komputer" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_ipk" class="form-label">IPK</label>
                                <input type="number" step=0.01 name="edit_ipk" id="edit_ipk" class=" form-control" placeholder="3.52" required>
                            </div> -->

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


                    <form action='buku_hapus.php' method='POST'>

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
                $('#edit_isbn').val(data[1]);
                // gak dipake, karena cuma increment number
                // $('#no').val(data[1]);
                $('#edit_judul').val(data[2]);
                $('#edit_penulis').val(data[3]);
                // $('#gender').val(data[4]);
                // // jenis kelamin checked
                // if (data[4] == "Laki-Laki") {
                //     $("#cowok").prop("checked", true);
                // } else {
                //     $("#cewek").prop("checked", true);
                // }

                $('#edit_penerbit').val(data[4]);
                $('#edit_tahun_terbit').val(data[5]);
                // $('#edit_ipk').val(data[7]);
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
            window.location.href = './buku.php';
        }
    </script>
</body>

</html>