<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "pendaftaran_lomba");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$nomor = $_POST['nomor'];
$usia = $_POST['usia'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$cabang_olahraga = $_POST['cabang_olahraga'];
$alamat = $_POST['alamat'];

// Simpan data ke tabel
$sql = "INSERT INTO pendaftar (nama, email, nomor, usia, jenis_kelamin, cabang_olahraga, alamat)
    VALUES ('$nama', '$email', '$nomor', $usia, '$jenis_kelamin', '$cabang_olahraga','$alamat')";

if ($conn->query($sql) === TRUE) {
    // Redirect ke halaman index.html setelah pendaftaran berhasil
    header("Location: index.html");
    exit();  // Pastikan untuk menghentikan eksekusi setelah redirect
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>