    <?php
    require_once "template/header.php";
    require_once "../koneksi.php";

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
        <li class="breadcrumb-item"><a href="produk.php">Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Produk</li>
        </ol>
    </nav>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Produk <?= $data['nama']; ?></h3>
                </div>
                
                <!-- /.card-header -->
                <div class="card-body">
                <form action="prosescrud.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="kode">Kode Barang</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="<?= $data['kode']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="harga_jual">Harga Jual</label>
                    <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="<?= $data['harga_jual']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="harga_beli">Harga Beli</label>
                    <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="<?= $data['harga_beli']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" id="stok" name="stok" class="form-control"  value="<?= $data['stok'] ;?>">
                    <label for="min_stok">Minimal Stok</label>
                    <input type="number" id="min_stok" name="min_stok" class="form-control"  value="<?= $data['min_stok'] ;?>">
                    <div class="form-group">
                    <label for="kategori">Kategori Barang</label>
                    <select class="form-control" id="kategori" name="kategori">
                        <?php
                        $querykategori = mysqli_query($con,"SELECT * FROM kategori_produk");
                        while($kateg=mysqli_fetch_array($querykategori)){
                        if($data['kategori_produk_id']==$kateg['id']){
                            ?>
                            <option value="<?= $kateg['id'];?>" selected><?= $kateg['nama'];?></option>
                            <?php
                        }
                        else{
                            ?>
                            <option value="<?= $kateg['id'];?>"><?= $kateg['nama'];?></option>
                            <?php
                        }
                        }
                        ?>
                    </select>
                    <label for="foto">Foto</label>
                    <input type="file" id="foto" name="foto" class="form-control">
                    <label for="desk" class="mr-3 ">Deskripsi</label>
                    <textarea id="desk" name="desk" rows="5" cols="50" class="form-control"><?= $data['deskripsi'];?></textarea>
                    <div class="mt-3 mb-2">
                        <button class="btn btn-primary " type="submit" name="simpanedit">Simpan Data</button>
                    </div>
                    </form>
                    </div>