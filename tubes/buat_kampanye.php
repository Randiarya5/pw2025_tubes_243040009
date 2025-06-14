<?php
session_start();
include 'koneksi.php'; // Pastikan koneksi DB sudah benar

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $folder = 'img/' . basename($gambar);

    // Simpan file gambar
    move_uploaded_file($tmp_name, $folder);

    // Simpan ke database
    $query = "INSERT INTO kampanye (judul, deskripsi, gambar) VALUES ('$judul', '$deskripsi', '$gambar')";
    mysqli_query($koneksi, $query);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buat Kampanye</title>
    <link rel="stylesheet" href="css/buat_kampanye.css">
</head>
<body>
    <div class="form-container">
        <h2>Buat Kampanye Baru</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="judul" placeholder="Judul Kampanye" required>
            <textarea name="deskripsi" placeholder="Deskripsi Kampanye" required></textarea>
            <input type="file" name="gambar" required>
            <button type="submit">Buat Kampanye</button>
        </form>
        <a href="admin_dashboard.php">Kembali</a>
    </div>
</body>
</html>

<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 40px;
}

.form-container {
    background: #fff;
    max-width: 500px;
    margin: auto;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.form-container h2 {
    text-align: center;
    color: #333;
}

.form-container input,
.form-container textarea,
.form-container button {
    width: 100%;
    margin-top: 10px;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 16px;
}

.form-container button {
    background-color: #28a745;
    color: white;
    font-weight: bold;
    border: none;
    cursor: pointer;
}

.form-container button:hover {
    background-color: #218838;
}

</style>
