<?php
    require_once "../koneksi.php";
    require_once "template/header.php";

    $querykategory = mysqli_query($con,"SELECT * FROM kategori_produk");
    $jumlahkategory = mysqli_num_rows($querykategory);

  $querykategory = mysqli_query($con,"SELECT * FROM kategori_produk");
  $jumlahkategory = mysqli_num_rows($querykategory);
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Kategori</li>
    </ol>
  </nav>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kategori</h3>
                <div class = "mb-3">
              </div>
                <div class="card-body mt-3">
                <a href="tambahkategori.php">
                <button type="button" class="btn btn-primary mb-3">Tambah Kategori</button>
                </a>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kategori Barang</th>
                    <th class="text-center">Ubah Data</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $nomer=1;
                    if($jumlahkategory==0){
                      ?>
                      <tr>
                        <td colspan="2" class="text-center">Data Kategori Tidak Tersedia</td>
                      </tr>
                      <?php
                    }
                    else{
                      while($datakategori=mysqli_fetch_array($querykategory)){
                        ?>
                        <tr>
                          <td class="text-center"><?= $nomer;?></td>
                          <td class="text-center"><?= $datakategori['nama'];?></td>
                          <td>
                        <a href="editkategori.php?id=<?= $datakategori['id']; ?>">
                          <button class="btn btn-warning">Ubah Data</button>
                        </a>
                        <a href="prosescrudkategori.php?id=<?= $datakategori['id'];?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                          <button class="btn btn-danger mr-1">Hapus</button>
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
                      <td colspan = "2" class="text-center">Jumlah Kategori</td>
                      <td class="text-center"><?= $jumlahkategory; ?></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              </div>
              </div>
              
              

<?php
    require_once "template/footer.php";
?>