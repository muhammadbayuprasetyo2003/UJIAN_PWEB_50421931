<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style_update.css"> <!-- Tambahkan referensi CSS -->
    <title>Edit Barang - Minimarket</title>
</head>

<body>
    <h1>Edit Barang</h1>

    <form id="update-form" method="POST" action="update.php">
        <!-- Form untuk mengubah data barang -->
        <!-- Isi form sesuai kebutuhan -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mendapatkan ID data yang akan diubah dari form
            $id = $_POST['id'];

            // Mendapatkan data dari file JSON
            $data = file_get_contents('database.json');
            $data_array = json_decode($data, true);

            // Mengupdate data sesuai dengan ID yang diterima dari form
            $data_array[$id]['nama_barang'] = $_POST['nama_barang'];
            $data_array[$id]['kode_barang'] = $_POST['kode_barang'];
            $data_array[$id]['jenis_barang'] = $_POST['jenis_barang'];
            $data_array[$id]['harga_barang'] = $_POST['harga_barang'];
            $data_array[$id]['stok_barang'] = $_POST['stok_barang'];
            $data_array[$id]['producer_barang'] = $_POST['producer_barang'];
            $data_array[$id]['supplier_barang'] = $_POST['supplier_barang'];
            $data_array[$id]['tanggal_awal_stok_barang'] = $_POST['tanggal_awal_stok_barang'];
            $data_array[$id]['lokasi_simpan_barang'] = $_POST['lokasi_simpan_barang'];

            // Menuliskan kembali data ke file JSON
            file_put_contents('database.json', json_encode($data_array));

            // Redirect kembali ke halaman utama setelah mengubah data
            header('Location: index.php');
            exit;
        }
        ?>
        <!-- PHP -->
        <!-- Di sini, Kita dapat menambahkan form HTML untuk update data -->
        <?php
        // Mendapatkan ID data yang akan diubah dari parameter URL
        $id = $_GET['id'];

        // Mendapatkan data dari file JSON berdasarkan ID
        $data = file_get_contents('database.json');
        $data_array = json_decode($data, true);

        // Memastikan ID ada dalam rentang data yang valid
        if ($id >= 0 && $id < count($data_array)) {
            $barang = $data_array[$id]; // Mendapatkan data barang berdasarkan ID
        ?>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Mengirimkan ID secara tersembunyi -->

                <label for="nama_barang">Nama Barang:</label>
                <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $barang['nama_barang']; ?>" required><br><br>

                <label for="kode_barang">Kode Barang:</label>
                <input type="text" id="kode_barang" name="kode_barang" value="<?php echo $barang['kode_barang']; ?>" required><br><br>

                <label for="jenis_barang">Jenis Barang:</label>
                <input type="text" id="jenis_barang" name="jenis_barang" value="<?php echo $barang['jenis_barang']; ?>" required><br><br>

                <label for="harga_barang">Harga Satuan Barang (Rp):</label>
                <input type="number" id="harga_barang" name="harga_barang" value="<?php echo $barang['harga_barang']; ?>" required><br><br>

                <label for="stok_barang">Stok Barang:</label>
                <input type="number" id="stok_barang" name="stok_barang" value="<?php echo $barang['stok_barang']; ?>" required><br><br>

                <label for="producer_barang">Producer (Pembuat) Barang:</label>
                <input type="text" id="producer_barang" name="producer_barang" value="<?php echo $barang['producer_barang']; ?>" required><br><br>

                <label for="supplier_barang">Supplier (Pemasok) Barang:</label>
                <input type="text" id="supplier_barang" name="supplier_barang" value="<?php echo $barang['supplier_barang']; ?>" required><br><br>

                <label for="tanggal_awal_stok_barang">Tanggal Awal Stok Barang:</label>
                <input type="date" id="tanggal_awal_stok_barang" name="tanggal_awal_stok_barang" value="<?php echo $barang['tanggal_awal_stok_barang']; ?>" required><br><br>

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

                <input type="submit" value="Update Barang">
            </form>
        <?php
        } else {
            echo "ID barang tidak valid.";
        }
        ?>

    </form>

    <button onclick="window.location.href='index.php'">Kembali</button> <!-- Tombol Kembali ke halaman utama -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Referensi jQuery -->
    <script src="script.js"></script> <!-- Tambahkan referensi script.js -->
</body>

</html>