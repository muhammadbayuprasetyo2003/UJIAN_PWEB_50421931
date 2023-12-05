<?php
// Mendapatkan data dari file JSON
$data = file_get_contents('database.json');
$data_array = json_decode($data, true);

// Memeriksa apakah ada data yang tersedia
if (!empty($data_array)) {
    // Tampilkan data dalam bentuk tabel HTML
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<title>Data Barang</title>';
    echo '<link rel="stylesheet" type="text/css" href="style_read.css">'; // Ganti "style_read.css" dengan path/lokasi file CSS Anda
    echo '</head>';
    echo '<body>';
    echo '<table border="1">';
    echo '<tr><th>Nama Barang</th><th>Kode Barang</th><th>Jenis Barang</th><th>Harga Satuan Barang (Rp)</th><th>Stok Barang</th><th>Producer (Pembuat) Barang</th><th>Supplier (Pemasok) Barang</th><th>Tanggal Awal Stok Barang</th><th>Lokasi Penyimpanan Barang</th><th>Action (Aksi)</th></tr>';

    foreach ($data_array as $key => $barang) {
        echo '<tr>';
        echo '<td>' . $barang['nama_barang'] . '</td>';
        echo '<td>' . $barang['kode_barang'] . '</td>';
        echo '<td>' . $barang['jenis_barang'] . '</td>';
        echo '<td>' . $barang['harga_barang'] . '</td>';
        echo '<td>' . $barang['stok_barang'] . '</td>';
        echo '<td>' . $barang['producer_barang'] . '</td>';
        echo '<td>' . $barang['supplier_barang'] . '</td>';
        echo '<td>' . $barang['tanggal_awal_stok_barang'] . '</td>';
        echo '<td>' . $barang['lokasi_simpan_barang'] . '</td>';
        echo '<td><a href="update.php?id=' . $key . '">Edit</a> | <a href="delete.php?id=' . $key . '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus barang ini?\')">Hapus</a></td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '</body>';
    echo '</html>';
} else {
    echo 'Tidak ada data yang tersedia.';
}
