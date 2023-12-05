// Fungsi untuk menampilkan pesan konfirmasi sebelum menghapus data
function confirmDelete() {
    return confirm('Apakah Anda yakin ingin menghapus barang ini?');
  }
  
  // Fungsi untuk memuat ulang data setelah operasi CRUD
  function reloadData() {
    $('#data-container').load('read.php'); // Memuat ulang data ke dalam div dengan id 'data-container'
  }
  
  // Fungsi untuk menangani submit form tambah barang
  $('#add-form').submit(function(event) {
    event.preventDefault();
  
    $.ajax({
      url: 'create.php',
      type: 'POST',
      data: $(this).serialize(),
      success: function(response) {
        reloadData(); // Memuat ulang data setelah menambah barang
        $('#add-form')[0].reset(); // Mereset form setelah berhasil menambah barang
      }
    });
  });
  
  // Fungsi untuk menangani submit form update barang
  $('#update-form').submit(function(event) {
    event.preventDefault();
  
    $.ajax({
      url: 'update.php',
      type: 'POST',
      data: $(this).serialize(),
      success: function(response) {
        reloadData(); // Memuat ulang data setelah mengubah barang
        // Tambahkan logika atau feedback lain sesuai kebutuhan
      }
    });
  });
  
  // Fungsi untuk menangani klik hapus barang
  $(document).on('click', '.delete-btn', function() {
    var id = $(this).data('id');
  
    if (confirmDelete()) {
      $.ajax({
        url: 'delete.php?id=' + id,
        type: 'GET',
        success: function(response) {
          reloadData(); // Memuat ulang data setelah menghapus barang
          // Tambahkan logika atau feedback lain sesuai kebutuhan
        }
      });
    }
  });
  