<?php
require_once 'dbkoneksi.php';
$id = $_GET['iddel'];

    // hapus catatan di tabel 'pesanan_items' terlebih dahulu
    $sql = "DELETE FROM pesanan_items WHERE pesanan_id IN (SELECT id FROM pesanan WHERE pelanggan_id=:id)";
    $st = $dbh->prepare($sql);
    $st->execute(['id' => $id]);

    // hapus catatan di tabel 'pesanan'
    $sql = "DELETE FROM pesanan WHERE pelanggan_id=:id";
    $st = $dbh->prepare($sql);
    $st->execute(['id' => $id]);

// hapus catatan di tabel 'pelanggan'
$sql = "DELETE FROM pelanggan WHERE id=:id";
$st = $dbh->prepare($sql);
$st->execute(['id' => $id]);

// arahkan kembali ke halaman daftar pelanggan setelah berhasil dihapus
echo "<meta http-equiv='refresh'content='1;url=http://localhost/PemWeb2/PemWeb02/Pekan5/list_pelanggan.php'>";
?>
