<?php
    require_once "../koneksi.php";
    include_once "template/header.php";
?>
<div class="col-12 col-md-6 ml-3 mx-auto border p-5" style="box-sizing: border-box;">
            <h2 class="text-center mb-5">Form Tambah Produk</h2>
                <form action="prosescrudkategori.php" method="post">
                    <label for="nama" class="mr-3">Nama Kategori :</label>
                    <input type="text" placeholder="Masukan Kategori" name="nama" id="nama" required>
                    <div class="mt-3 mb-2">
                <button class="btn btn-primary mr-3" type="submit" name="simpankategori">Simpan Data</button>
                <button class="btn btn-danger" type="submit">Kembali</button>
            </div>
                </form>
</div>
<?php
    include_once "template/footer.php";
?>