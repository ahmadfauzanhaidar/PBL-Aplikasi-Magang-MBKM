<?php
// Tambahkan koneksi ke database dan fungsi lainnya di sini
require_once 'koneksi.php';

// Query SELECT untuk menampilkan data
$sql = "SELECT * FROM tbl_hak";
$result = $conn->query($sql);

// Hapus data
if (isset($_POST['hapus'])) {
    $id = $_POST['hapus_id'];

    // Query DELETE
    $sql = "DELETE FROM tbl_hak WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Edit data
if (isset($_POST['edit'])) {
    $id = $_POST['edit_id'];
    $nama_baru = $_POST['nama_baru'];
    $hak_akses_baru = $_POST['hak_akses_baru'];

    // Query UPDATE
    $sql = "UPDATE tbl_hak SET nama='$nama_baru', hak_akses='$hak_akses_baru' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tambah data
if (isset($_POST['tambah'])) {
    $nama_baru = $_POST['nama_baru'];
    $hak_akses_baru = $_POST['hak_akses_baru'];

    // Query INSERT
    $sql = "INSERT INTO tbl_hak (nama, hak_akses) VALUES ('$nama_baru', '$hak_akses_baru')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MBKM - Hak User</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="superadmin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MBKM </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="superadmin.php">
                    <i class="fas fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - upload -->
            <li class="nav-item">
                <a class="nav-link" href="berkas.php">
                    <i class="fas fa-file"></i>
                    <span>Berkas</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Nav Item - sptjm -->
            <li class="nav-item active">
                <a class="nav-link" href="hak.php">
                    <i class="fas fa-database"></i>
                    <span>Hak Akses User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil_superadmin.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Hak Akses User</h1>
                    </div>

                    <!-- Tambahkan formulir untuk menambah pengguna -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Pengguna Baru</h6>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="nama_baru">Nama Pengguna:</label>
                                            <input type="text" class="form-control" id="nama_baru" name="nama_baru">
                                        </div>
                                        <div class="form-group">
                                            <label for="hak_akses_baru">Hak Akses:</label>
                                            <select class="form-control" id="hak_akses_baru" name="hak_akses_baru">
                                                <option value="user">User</option>
                                                <option value="admin">Admin</option>
                                                <option value="superadmin">Super Admin</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="tambah" class="btn btn-primary">Tambah Pengguna</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tabel Hak Akses User</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Hak Akses</th>
                                                    <th>Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                <!-- Data  -->
                                <?php
                                $no = 1;
                                if ($result->num_rows > 0) {
                                    // Menampilkan data
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<th scope='row'>" . $no . "</th>";
                                        echo "<td>" . $row["nama"]. "</td>";
                                        echo "<td>" . $row["hak_akses"]. "</td>";
                                        // Kolom Tindakan
                                        echo "<td>";
                                        // Form untuk mengedit data
                                        echo "<button class='btn btn-sm btn-primary' onclick='editData(" . $row['id'] . ", \"" . $row['nama'] . "\", \"" . $row['hak_akses'] . "\")'>Edit</button>";
                                        // Form untuk menghapus data
                                        echo "<form method='post' action=''>";
                                        echo "<input type='hidden' name='hapus_id' value='" . $row['id'] . "'>";
                                        echo "<button type='submit' name='hapus' class='btn btn-sm btn-danger'>Hapus</button>";
                                        echo "</form>";
                                        echo "</td>";
                                        echo "</tr>";
                                    $no++;
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>

                                <!-- Tambah baris lebih banyak jika diperlukan -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- script edit -->
                <script>
                    function editData(id, nama, hakAkses) {
                    window.location.href = 'edit_hak.php?id=' + id + '&nama=' + nama + '&hak_akses=' + hakAkses;
                }
                </script>
                
                <!-- Script untuk menambah pengguna -->
                <script>
                    function tambahUser() {
                        // Mendapatkan data dari formulir
                        var nama = document.getElementById("nama").value;
                        var hakAkses = document.getElementById("hakAkses").value;

                        // Membuat baris baru untuk ditambahkan ke dalam tabel
                        var table = document.getElementById("dataTable").getElementsByTagName('tbody')[0];
                        var newRow = table.insertRow(table.rows.length);
                        var cell1 = newRow.insertCell(0);
                        var cell2 = newRow.insertCell(1);
                        var cell3 = newRow.insertCell(2);
                        var cell4 = newRow.insertCell(3);

                        // Mengatur nilainya sesuai dengan data yang dimasukkan
                        cell1.innerHTML = table.rows.length - 1;
                        cell2.innerHTML = nama;
                        cell3.innerHTML = hakAkses;
                        cell4.innerHTML = '<button class="btn btn-sm btn-primary">Edit</button>' +
                                        '<button class="btn btn-sm btn-danger">Hapus</button>';

                        // Mengosongkan nilai input setelah ditambahkan ke dalam tabel
                        document.getElementById("nama").value = "";
                        document.getElementById("hakAkses").value = "";
                    }
                </script>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>