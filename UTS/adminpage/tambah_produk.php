<?php
    require_once "../koneksi.php";
    include_once "template/header.php";
    
    $querytambahproduk = mysqli_query($con,"SELECT * FROM kategori_produk");
    $querytambah=mysqli_num_rows($querytambahproduk);

    function generateRandomString($length = 10){
        $characters = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $chacaractersLength = strlen($characters);
        $randomStrings = '';
        for ($i = 0; $i < $length; $i++){
            $randomStrings .= $characters[rand(0, $chacaractersLength - 1)];
        }
        return $randomStrings;
    }

?>  
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="produk.php">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Produk</li>
        </ol>
        </nav>
        <div class="col-12 col-md-6 ml-3 mx-auto border p-5" style="box-sizing: border-box;">
            <h2 class="text-center">Form Tambah Produk</h2>
        <form action="prosescrud.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="kode">Kode</label>
                <input type="text" id="kode" name="kode" placeholder="Masukan 10 Digit Angka" maxlength="10" class="form-control" required>
                <br>
                <label for="namaproduk">Nama Produk</label>
                <input type="text" id="namaproduk" name="namaproduk" placeholder="Masukan nama barang" maxlength="45" class="form-control" required>
                <br>
                <label for="hargajual">Harga Jual</label>
                <input type="number" id="hargajual" name="hargajual" placeholder="Masukan Nominal Dengan Angka" class="form-control"  required>
                <br>
                <label for="hargabeli">Harga Beli</label>
                <input type="number" id="hargabeli" name="hargabeli" placeholder="Masukan Nominal Dengan Angka" class="form-control" required>
                <br>
                <label for="stok">Stok Barang</label>
                <input type="number" id="stok" name="stok" placeholder="Masukan Stok Dengan Angka" class="form-control"  required>
                <br>
                <label for="min_stok">Minimal Stok</label>
                <input type="number" id="min_stok" name="min_stok" placeholder="Masukan Stok Dengan Angka" class="form-control"  required>
                <br>
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="custom-select" required>
                    <option value="">Pilih Satu</option>
                    <?php
                        while($data=mysqli_fetch_array($querytambahproduk)){
                    ?>
                    <option value="<?= $data['id'];?>"><?= $data['nama'];?></option>
                    <?php
                    }
                    ?>
                </select>
                <br><br>
                <label for="foto">Foto</label>
                <input type="file" id="foto" name="foto" class="form-control">
                <br>
                <label for="desk" class="mr-3 ">Deskripsi</label>
                <textarea id="desk" name="desk" rows="5" cols="50" class="form-control"></textarea>
                
            </div>
            <div class="mt-3 mb-2">
                <button class="btn btn-primary " type="submit" name="simpanproduk">Simpan Data</button>
            </div>
        </form>
        </div>
<?php
    require_once "template/footer.php"
?>