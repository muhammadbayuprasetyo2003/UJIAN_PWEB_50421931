<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style_index.css"> <!-- Tambahkan referensi CSS -->
    <title>CRUD Daftar Barang Minimarket Muhammad Bayu Prasetyo - 3IA19 - 50421931</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Tambahkan referensi CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Referensi jQuery -->
    <script src="script.js"></script> <!-- Tambahkan referensi script.js -->
</head>

<body>
    <h1>Selamat datang di Daftar Barang Minimarket Muhammad Bayu Prasetyo - 3IA19 - 50421931</h1>

    <div id="data-container">
        <p>Tabel Daftar Barang Minimarket</p>
        <?php include 'read.php'; ?> <!-- Menampilkan daftar barang dari read.php -->
    </div>

    <button onclick="window.location.href='create.php'">Tambah Barang</button> <!-- Tombol untuk menambahkan barang -->

</body>

</html>