<?php
session_start();
require_once 'koneksi.php'; // Sambungkan ke database

// Proses Login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan proses otentikasi, misalnya dengan tabel 'users'
    $sql = "SELECT * FROM tbl_user WHERE username='$username' AND password= MD5 ('$password')";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        // Pengguna berhasil login, dapatkan level akses
        $row = $result->fetch_assoc();
        $levelAkses = $row['level'];
        $_SESSION['id_user'] = $row['id_user']; // Set sesi 'id_user'

        // Cek apakah sesi 'id_user' sudah di-set
        if(!isset($_SESSION['id_user'])) {
        die("Sesi 'id_user' tidak di-set. Harap pastikan Anda sudah login.");
        }

        // Arahkan ke halaman sesuai dengan level akses
        switch ($levelAkses) {
            case 'admin':
                header("Location: admin.php");
                break;
            case 'superadmin':
                header("Location: superadmin.php");
                break;
            case 'user':
                header("Location: index.php");
                break;
            default:
                // Jika level akses tidak dikenali, arahkan ke halaman default atau tampilkan pesan kesalahan
                echo "Level akses tidak valid";
                break;
        }
    } else {
        header("Location: gagal.php");
    }
}
?>