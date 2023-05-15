<?php
    require_once "template/header.php";
    require_once "../koneksi.php";

    $querypesanan = mysqli_query($con,"SELECT * FROM pesanan");
    $jumlahpesanan = mysqli_num_rows($querypesanan);
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Kelola Pemesanan</li>
    </ol>
  </nav>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Daftar Pemesanan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Nama Customer</th>
                    <th class="text-center">ALamat Customer</th>
                    <th class="text-center">No Hp</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Jumlah Pemesanan</th>
                    <th class="text-center">Deskripsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    while($data=mysqli_fetch_array($querypesanan)){
                      ?>
                      <tr>
                    <td class="text-center"><?= $data['tanggal'];?></td>
                    <td class="text-center"><?= $data['nama_pemesan'];?></td>
                    <td class="text-center"><?= $data['alamat_pemesan'];?></td>
                    <td class="text-center"><?= $data['no_hp'];?></td>
                    <td class="text-center"><?= $data['email'];?></td>
                    <td class="text-center"><?= $data['jumlah_pesanan'];?></td>
                    <td class="text-center"><?= $data['deskripsi'];?></td>
                      </tr>
                      <?php
                    }
                    ?>
                  
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan = "6" class="text-center">Jumlah Kategori</td>
                      <td><?= $jumlahpesanan; ?></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
                
<?php
    require_once "template/footer.php";
?>