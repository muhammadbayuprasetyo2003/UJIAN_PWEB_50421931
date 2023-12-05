<?php
if (isset($_GET['id'])) {
    // Mendapatkan ID data yang akan dihapus dari parameter URL
    $id = $_GET['id'];

    // Mendapatkan data dari file JSON
    $data = file_get_contents('database.json');
    $data_array = json_decode($data, true);

    // Memastikan ID ada dalam rentang data yang valid
    if ($id >= 0 && $id < count($data_array)) {
        unset($data_array[$id]); // Menghapus data barang berdasarkan ID

        // Menuliskan kembali data ke file JSON
        file_put_contents('database.json', json_encode(array_values($data_array)));

        // Redirect kembali ke halaman utama setelah menghapus data
        header('Location: index.php');
        exit;
    } else {
        echo "ID barang tidak valid.";
    }
}
