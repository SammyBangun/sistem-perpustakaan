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
                <a class="navbar-brand" href="member.php">Member</a>
                <a class="navbar-brand text-primary text-decoration-underline" href="peminjaman.php">Peminjaman</a>
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
        <!-- form tambah mahasiswa -->
        <div class="card mb-5">
            <!-- <div class="card-header">
                Latihan CRUD PHP & MySQL
            </div> -->
            <!-- tambah data -->
            <div class="card-body">
                <h3 class="card-title">Tambah Data Peminjaman</h3>
                <p class="card-text">Silahkan tambah data peminjaman !</p>

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


                <form class="row g-3" action="peminjaman_tambah.php" method="POST">

                    <div class="col-4">
                        <label for="id_peminjaman" class="form-label">ID Peminjaman</label>
                        <input type="text" name="id_peminjaman" id="id_peminjaman" class="form-control" placeholder="PIN-001" required>
                    </div>
                    <div class="col-md-4">
                        <label for="member" class="form-label">Member</label>
                        <select class="form-control" name="id_member" id="" required>
                            <option value="">Pilih Member</option>
                            <?php
                            // Ambil data member dari database
                            $sql = "SELECT id_member, nama FROM member";
                            $result = mysqli_query($db, $sql);

                            // Loop melalui data dan buat option untuk setiap member
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id_member'] . "'>" . $row['id_member'] . " - " . $row['nama'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="buku" class="form-label">Buku</label>
                        <select class="form-control" name="isbn" id="" required>
                            <option value="">Pilih Buku</option>
                            <?php
                            // Ambil data member dari database
                            $sql = "SELECT isbn, judul FROM buku";
                            $result = mysqli_query($db, $sql);

                            // Loop melalui data dan buat option untuk setiap member
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['isbn'] . "'>" . $row['isbn'] . " - " . $row['judul'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tanggal_jatuhtempo" class="form-label">Tanggal Jatuh Tempo</label>
                        <input type="date" name="tanggal_jatuhtempo" id="tanggal_jatuhtempo" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label for="status_peminjaman" class="form-label">Status Peminjaman</label>
                        <select class="form-select" name="status_peminjaman" id="status_peminjaman" aria-label="Default select example">
                            <option value="Sedang Dipinjam">Sedang Dipinjam</option>
                            <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                            <option value="Terlambat Dikembalikan">Terlambat Dikembalikan</option>
                            <option value="Diperpanjang">Diperpanjang</option>
                            <option value="Dibatalkan">Dibatalkan</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="tambah"><i class="fa fa-plus"></i><span class="ms-2">Tambah Data</span></button>
                    </div>
                </form>
            </div>
        </div>
        <?php if ($_SESSION['type'] == 1) : ?>
            <button class="btn btn-success" style="float: right;"><a href="peminjaman_report.php" class="fa fa-print" style="color: #fff; text-decoration: none"><span class="ms-2">Cetak Data</span></a></button>
        <?php endif ?>
        <!-- judul tabel -->
        <h3 class="mb-3">Daftar Peminjaman</h3>

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
            echo "<th scope='col'>ID Peminjaman</th>";
            echo "<th scope='col'>Member</th>";
            echo "<th scope='col'>Buku</th>";
            echo "<th scope='col'>Tanggal Peminjaman</th>";
            echo "<th scope='col'>Tanggal Jatuh Tempo</th>";
            echo "<th scope='col'>Status Peminjaman</th>";
            echo "<th scope='col' class='text-center'>Opsi</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $batas = 10;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($db, "
    SELECT 
        peminjaman.*, 
        member.id_member, 
        member.nama, 
        buku.isbn, 
        buku.judul  
    FROM 
        peminjaman
    INNER JOIN 
        member ON peminjaman.id_member = member.id_member
    INNER JOIN 
        buku ON peminjaman.isbn = buku.isbn
    LIMIT $halaman_awal, $batas
");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data = mysqli_query($db, "
    SELECT 
        peminjaman.*, 
        member.id_member, 
        member.nama, 
        buku.isbn, 
        buku.judul  
    FROM 
        peminjaman
    INNER JOIN 
        member ON peminjaman.id_member = member.id_member
    INNER JOIN 
        buku ON peminjaman.isbn = buku.isbn
    LIMIT $halaman_awal, $batas
");
            $no = $halaman_awal + 1;

            // $sql = "SELECT * FROM mahasiswa";
            // $query = mysqli_query($db, $sql);




            while ($row = mysqli_fetch_array($data)) {
                echo "<tr>";
                // echo "<td style='display:none'>" . $row['id'] . "</td>";
                echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $row['id_peminjaman'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['judul'] . "</td>";
                echo "<td>" . $row['tanggal_pinjam'] . "</td>";
                echo "<td>" . $row['tanggal_jatuhtempo'] . "</td>";
                echo "<td>" . $row['status_peminjaman'] . "</td>";


                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                if ($_SESSION['type'] == 1) :
                    // tombol hapus
                    echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                    echo "</td>";
                endif;

                echo "</tr>";
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
                        <h5 class='modal-title' id='exampleModalLabel'>Edit Data Peminjaman</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM peminjaman";
                    $query = mysqli_query($db, $sql);
                    $row = mysqli_fetch_array($query);
                    ?>

                    <form action='peminjaman_edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_id_peminjaman" class="form-label">ID Peminjaman</label>
                                <input type="text" name="edit_id_peminjaman" id="edit_id_peminjaman" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-12 md-3">
                                <label for="edit_id_member" class="form-label">Member</label>
                                <select class="form-control" name="edit_id_member" id="edit_id_member" required>
                                    <option value="">Pilih Member</option>
                                    <?php
                                    // Ambil data edit_id_ dari database
                                    $sql = "SELECT id_member, nama FROM member";
                                    $result = mysqli_query($db, $sql);

                                    // Loop melalui data dan buat option untuk setiap member
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['id_member'] . "'>" . $row['id_member'] . " - " . $row['nama'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 md-3">
                                <label for="edit_isbn" class="form-label">Buku</label>
                                <select class="form-control" name="edit_isbn" id="edit_isbn" required>
                                    <option value="">Pilih Buku</option>
                                    <?php
                                    // Ambil data member dari database
                                    $sql = "SELECT isbn, judul FROM buku";
                                    $result = mysqli_query($db, $sql);

                                    // Loop melalui data dan buat option untuk setiap member
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['isbn'] . "'>" . $row['isbn'] . " - " . $row['judul'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div class="col-12 mb-3">
                                <label for="edit_tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
                                <input type="date" name="edit_tanggal_pinjam" id="edit_tanggal_pinjam" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_tanggal_jatuhtempo" class="form-label">Tanggal Jatuh Tempo</label>
                                <input type="date" name="edit_tanggal_jatuhtempo" id="edit_tanggal_jatuhtempo" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-12 md-3">
                                <label for="edit_status_peminjaman" class="form-label">Status Peminjaman</label>
                                <select class="form-select" name="edit_status_peminjaman" id="edit_status_peminjaman" aria-label="Default select example">
                                    <option value="Sedang Dipinjam">Sedang Dipinjam</option>
                                    <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                                    <option value="Terlambat Dikembalikan">Terlambat Dikembalikan</option>
                                    <option value="Diperpanjang">Diperpanjang</option>
                                    <option value="Dibatalkan">Dibatalkan</option>
                                </select>
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


                    <form action='peminjaman_hapus.php' method='POST'>

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
                $('#edit_id_peminjaman').val(data[1]);
                $('#edit_id_member').val(data[2]);
                $('#edit_isbn').val(data[3]);
                $('#edit_tanggal_pinjam').val(data[4]);
                $('#edit_tanggal_jatuhtempo').val(data[5]);
                $('#edit_status_peminjaman').val(data[6]);
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
            window.location.href = './peminjaman.php';
        }
    </script>
</body>

</html>