<?php
    require_once "../koneksi.php";

    if(isset($_POST['beli'])) {
        // Mengambil data dari form
        $tanggal_pemesanan = $_POST['tanggal_pemesanan'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_telepon = $_POST['no_telepon'];
        $email = $_POST['email'];
        $jumlah = $_POST['jumlah'];
        $deskripsi = $_POST['deskripsi'];
        $produk = $_POST['produk'];

        // Query untuk menyimpan data ke database
        $query = "INSERT INTO pesanan (tanggal, nama_pemesan, alamat_pemesan, no_hp, email, jumlah_pesanan, deskripsi, produk_id) 
                  VALUES ('$tanggal_pemesanan', '$nama', '$alamat', '$no_telepon', '$email', '$jumlah', '$deskripsi', '$produk')";

        // Menjalankan query
        if(mysqli_query($con, $query)) {
            header("Location: ../index.php");
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
?>
