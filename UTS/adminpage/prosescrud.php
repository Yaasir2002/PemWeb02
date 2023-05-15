<?php
require_once "../koneksi.php";
$querykategori = mysqli_query($con,"SELECT * FROM kategori_produk");
function generateRandomString($length = 10){
    $characters = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $chacaractersLength = strlen($characters);
    $randomStrings = '';
    for ($i = 0; $i < $length; $i++){
        $randomStrings .= $characters[rand(0, $chacaractersLength - 1)];
    }
    return $randomStrings;
}
if (isset($_POST['simpanproduk'])) {

    $kode = $_POST['kode'];
    $namaproduk = $_POST['namaproduk'];
    $hargajual = $_POST['hargajual'];
    $hargabeli = $_POST['hargabeli'];
    $stok = $_POST['stok'];
    $min_stok = $_POST['min_stok'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['desk'];

    $namafile = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpname = $_FILES['foto']['tmp_name'];

    $extensi = explode('.', $namafile);
    $extensi = strtolower(end($extensi));
    $namafilebaru = generateRandomString() . '.' . $extensi;
    $dirupload = '../image/';
    $targetfile = $dirupload . $namafilebaru;
    move_uploaded_file($tmpname, $targetfile);

    $query = "INSERT INTO produk (kode,nama,harga_jual,harga_beli,stok,min_stok,kategori_produk_id,foto,deskripsi) 
                VALUES ('$kode','$namaproduk','$hargajual','$hargabeli','$stok','$min_stok','$kategori','$namafilebaru','$deskripsi')";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: produk.php");
    } else {
        echo "Gagal menyimpan data!";
    }
    
}
?>
<?php
if(isset($_POST['simpanedit'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kode = $_POST['kode'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $min_stok = $_POST['min_stok'];
    $kategori = $_POST['kategori'];
    $desk = $_POST['desk'];
    
    $foto = "";
    if(isset($_FILES['foto'])){
        $nama_file = $_FILES['foto']['name'];
        $ukuran_file = $_FILES['foto']['size'];
        $tmp_file = $_FILES['foto']['tmp_name'];
        $tipe_file = $_FILES['foto']['type'];
        $path = "../image/";

        if($nama_file != ""){
            $foto = rand(1000,1000000)."-".$nama_file;
            
            // Pindahkan file ke folder upload
            if(move_uploaded_file($tmp_file, $path.$foto)){
                $queryfoto = mysqli_query($con,"SELECT foto FROM produk WHERE id=$id");
                $datafoto = mysqli_fetch_array($queryfoto);
                if($datafoto['foto'] != ""){
                    unlink($path.$datafoto['foto']);
                }
            }
            else{
                echo "Upload foto gagal";
                exit;
            }
        }
        else{
            $queryfoto = mysqli_query($con,"SELECT foto FROM produk WHERE id=$id");
            $datafoto = mysqli_fetch_array($queryfoto);
            $foto = $datafoto['foto'];
        }
    }

    $queryupdate = mysqli_query($con, "UPDATE produk SET nama='$nama', kode='$kode', harga_jual='$harga_jual', harga_beli='$harga_beli', stok='$stok', min_stok='$min_stok', kategori_produk_id='$kategori', foto='$foto', deskripsi='$desk' WHERE id=$id");

    if($queryupdate){
        echo "<script>alert('Data berhasil diupdate.');window.location='produk.php';</script>";
    }
    else{
        echo "<script>alert('Data gagal diupdate.');</script>";
    }
}
?>

<?php
    require_once "../koneksi.php";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = mysqli_query($con, "DELETE FROM produk WHERE id='$id'");
        if($query) {
            header("Location: produk.php");
        } else {
            echo "Data gagal dihapus. <a href='produk.php'>Kembali</a>";
        }
    }
?>

