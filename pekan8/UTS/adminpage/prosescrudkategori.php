<?php
    require_once "../koneksi.php";

if (isset($_POST['simpankategori'])) {
    $nama = htmlspecialchars($_POST['nama']);

    $query = mysqli_query($con, "INSERT INTO kategori_produk (nama) VALUES ('$nama')");

    if ($query) {
        header("location: kategori.php?status=sukses");
    } else {
        header("location: kategori.php?status=gagal");
    }
}

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = mysqli_query($con, "DELETE FROM kategori_produk WHERE id='$id'");

        if($query){
            header("location: kategori.php?status=sukses");
        }
        else{
            header("location: kategori.php?status=gagal");
        }
    }


    if(isset($_GET['status'])){
        $status = $_GET['status'];
        if($status == "sukses"){
            echo "<div class='alert alert-success'>Data berhasil dihapus</div>";
        }
        else{
            echo "<div class='alert alert-danger'>Data gagal dihapus</div>";
        }
    }                   

?>
