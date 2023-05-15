<?php
  require_once "template/header.php";
  require_once "../koneksi.php";

  $queryproduk = mysqli_query($con,"SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN  kategori_produk b ON a.kategori_produk_id=b.id");
  $jumlahproduk = mysqli_num_rows($queryproduk);

?>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Produk</li>
    </ol>
  </nav>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Produk Tersedia</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
              <div class = "mb-3">
                <a href="tambah_produk.php">
                <button type="button" class="btn btn-primary">Tambah Produk</button>
                </a>
              </div>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Kategori Barang</th>
                    <th class="text-center">Kode Barang</th>
                    <th class="text-center">Harga Jual</th>
                    <th class="text-center">Harga Beli</th>
                    <th class="text-center">Stok</th>
                    <th class="text-center">Min Stok</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Ubah Data</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $nomer =1;
                    if($jumlahproduk==0){
                      ?>
                        <tr>
                          <td colspan ="9" class="text-center"> Data Produk Tidak ada</td>
                        </tr>
                      <?php
                    }
                    else{
                      while($data=mysqli_fetch_array($queryproduk)){
                    ?>
                    <tr>
                      <td class="text-center"><?= $nomer; ?></td>
                      <td class="text-center"><?= $data['nama'];?></td>
                      <td class="text-center"><?= $data['nama_kategori'];?></td>
                      <td class="text-center"><?= $data['kode'];?></td>
                      <td class="text-center">Rp.<?= $data['harga_jual'];?></td>
                      <td class="text-center">Rp.<?= $data['harga_beli'];?></td>
                      <td class="text-center"><?= $data['stok'];?></td>
                      <td class="text-center"><?= $data['min_stok'];?></td>
                      <td class="text-center"><?= $data['deskripsi'];?></td>
                      <td>
                      <a href="detail.php?id=<?= $data['id']; ?>">
                          <button class="btn btn-success">Lihat</button>
                        </a>
                        <a href="edit.php?id=<?= $data['id']; ?>">
                          <button class="btn btn-warning">Ubah Data</button>
                        </a>
                        <a href="prosescrud.php?id=<?= $data['id'];?>" onclick="return confirm('Anda Yakin Hapus Data <?=$data['nama']?>?')">
                          <button class="btn btn-danger mr-1">hapus</button>
                        </a>
                      </td>
                      </tr> 
                    <?php
                    $nomer++;
                      }
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan = "9">Jumlah Semua Produk</td>
                      <td><?= $jumlahproduk; ?></td>
                    </tr>
                  </tfoot>
                </table>
              </div>

<?php
  require_once "template/footer.php"
?>


