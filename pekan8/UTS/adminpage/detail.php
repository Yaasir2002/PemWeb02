<?php
    require_once "../koneksi.php";
    include_once "template/header.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $queryproduk = mysqli_query($con,"SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN  kategori_produk b ON a.kategori_produk_id=b.id WHERE a.id=$id");
        $jumlahproduk = mysqli_num_rows($queryproduk);
    
        if($jumlahproduk == 1){
            $data = mysqli_fetch_array($queryproduk);
        }
        else{
            echo "Data tidak ditemukan";
        }
        }
        else{
        header("location: produk.php");
        }
?>
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
        </ol>
    </nav>
    <div class="container-fluid border d-flex flex-row">
        <div class= "col-4 border">
            <div class="d-flex justify-content-center d-flex align-items-center mt-5">
            <img src="../image/<?= $data['foto']?>" alt="Foto Produk" width="300px">
            </div>
        </div>

        <div class= "col-8 border">
            <h3 class="text-center">Keterangan</h3>
            <table class="table table-striped responsive">
    <tbody>
        <tr> <td>Kode barang </td><td><?=$data['kode']?></td></tr>
        <tr> <td>Nama Barang </td><td><?=$data['nama']?></td></tr>
        <tr> <td>Harga Jual </td><td><?="Rp".".".$data['harga_jual']?></td></tr>
        <tr> <td>Harga Beli </td><td><?= "Rp".".".$data['harga_beli']?></td></tr>
        <tr> <td>Stok Barang </td><td><?=$data['stok']?></td></tr>
        <tr> <td>Minimal Stok </td><td><?=$data['min_stok']?></td></tr>
        <tr> <td>Kategori Barang </td><td><?=$data['kategori_produk_id']?></td></tr>
        <tr> <td>Deskripsi</td><td><?=$data['deskripsi']?></td></tr>
    </tbody>
</table>
        </div>
    </div>
    <div class="mt-2 ml-5 mb-5">
    <a href="produk.php">
            <button class="btn btn-success">Kembali</button>
        </a>
    </div>

<?php
    include_once "template/footer.php"
?>