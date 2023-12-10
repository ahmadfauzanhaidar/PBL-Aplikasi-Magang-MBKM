<?php
// Include file koneksi ke database
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_sptjm'])) {
    // ID dari data yang akan diupdate (dikirim melalui form tersembunyi)
    $id = $_POST['id'];

    // Lokasi direktori tempat menyimpan file (pastikan direktori ada dan dapat menulis)
    $targetDirectory = "uploads/sptjm/";

    // Nama file yang akan diunggah
    $fileName = basename($_FILES["file_sptjm"]["name"]);
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Memeriksa apakah file yang diunggah adalah file gambar
    $allowTypes = array('pdf', 'doc', 'docx'); // Tipe file yang diizinkan
    if (in_array($fileType, $allowTypes)) {
        // Pindahkan file dari direktori sementara ke lokasi yang ditentukan
        if (move_uploaded_file($_FILES["file_sptjm"]["tmp_name"], $targetFilePath)) {
            // Update lokasi file dalam database
            $sql = "UPDATE tbl_berkas SET sptjm = '$targetFilePath' WHERE id = $id";

            if ($conn->query($sql) === TRUE) {
                header("Location: berkas.php?success=sptjm");
            } else {
                echo "Terjadi kesalahan: " . $conn->error;
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo "Maaf, hanya file dengan tipe PDF, DOC, atau DOCX yang diizinkan.";
    }
}