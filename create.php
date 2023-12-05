<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_get_contents('database.json');
    $data_array = json_decode($data, true);

    $new_item = array(
        'nama_barang' => $_POST['nama_barang'],
        'kode_barang' => $_POST['kode_barang'],
        'jenis_barang' => $_POST['jenis_barang'],
        'harga_barang' => $_POST['harga_barang'],
        'stok_barang' => $_POST['stok_barang'],
        'producer_barang' => $_POST['producer_barang'],
        'supplier_barang' => $_POST['supplier_barang'],
        'tanggal_awal_stok_barang' => $_POST['tanggal_awal_stok_barang'],
        'lokasi_simpan_barang' => $_POST['lokasi_simpan_barang']
    );

    $data_array[] = $new_item;
    file_put_contents('database.json', json_encode($data_array));

    header('Location: index.php'); // Redirect kembali ke halaman utama setelah menambah data
    exit;
}
?>
<!-- Di sini, Anda dapat menambahkan form HTML untuk input data -->


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style_create.css"> <!-- Tambahkan referensi CSS -->
    <title>Tambah Barang - Minimarket</title>
</head>

<body>
    <h1>Tambah Barang</h1>

    <form id="add-form" method="POST" action="create.php">
        <!-- Form untuk menambahkan data barang -->
        <!-- Isi form sesuai kebutuhan -->
        <!-- Di sini, Anda dapat menambahkan form HTML untuk input data -->

        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" required><br><br>

        <label for="kode_barang">Kode Barang:</label>
        <input type="text" id="kode_barang" name="kode_barang" required><br><br>

        <label for="jenis_barang">Jenis Barang:</label>
        <input type="text" id="jenis_barang" name="jenis_barang" required><br><br>

        <label for="harga_barang">Harga Satuan Barang (Rp):</label>
        <input type="number" id="harga_barang" name="harga_barang" required><br><br>

        <label for="stok_barang">Stok Barang:</label>
        <input type="number" id="stok_barang" name="stok_barang" required><br><br>

        <label for="producer_barang">Producer (Pembuat) Barang:</label>
        <input type="text" id="producer_barang" name="producer_barang"><br><br>

        <label for="supplier_barang">Supplier (Pemasok) Barang:</label>
        <input type="text" id="supplier_barang" name="supplier_barang"><br><br>

        <label for="tanggal_awal_stok_barang">Tanggal Awal Stok Barang:</label>
        <input type="date" id="tanggal_awal_stok_barang" name="tanggal_awal_stok_barang"><br><br>

        <label for="lokasi_simpan_barang">Lokasi Penyimpanan Barang:</label>
        <select id="lokasi_simpan_barang" name="lokasi_simpan_barang">
            <option value="">Pilih Lokasi</option>
            <!-- Tambahkan pilihan lainnya sesuai kebutuhan -->
            <option value="RAK 0">RAK 0</option>
            <option value="Rak 1">RAK 1</option>
            <option value="Rak 2">RAK 2</option>
            <option value="Rak 3">RAK 3</option>
            <option value="Rak 4">RAK 4</option>
            <option value="Rak 5">RAK 5</option>
            <option value="Rak 6">RAK 6</option>
            <option value="Rak 7">RAK 7</option>
            <option value="Rak 8">RAK 8</option>
            <option value="Rak 9">RAK 9</option>
            <option value="Rak 10">RAK 10</option>
        </select><br><br>

        <input type="submit" value="Tambah Barang">

    </form>

    <button onclick="window.location.href='index.php'">Kembali</button> <!-- Tombol Kembali ke halaman utama -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Referensi jQuery -->
    <script src="script.js"></script> <!-- Tambahkan referensi script.js -->
</body>

</html>