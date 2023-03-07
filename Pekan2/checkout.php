<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container-fluid mt-5">
        <p class="display-4 text-center text-primary font-weight-bold">Checkout</p>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Jumlah Barang</th>
      <th scope="col">Total Barang</th>
      <th scope="col">Total Harga</th>
    </tr>
  </thead>
  <tbody>
  
    <?php
     $nama= $_POST['customer'];
     $namaBarang= $_POST['pilihProduk'];
     $jumlah= $_POST['jumlah'];

     if($_POST['pilihProduk'] == "TV" && $_POST['jumlah'] >=1){
        $harga = 4200000 * $_POST['jumlah'];
     }

     elseif($_POST['pilihProduk'] == "Kulkas" && $_POST['jumlah'] >=1){
        $harga = 3100000 * $_POST['jumlah'];
     }

     elseif($_POST['pilihProduk'] == "Mesin Cuci" && $_POST['jumlah'] >=1){
        $harga = 3800000 * $_POST['jumlah'];
     }
    ?>

    <tr>
      <th scope="row">1</th>
      <td> <?= $nama ?></td>
      <td> <?= $namaBarang?></td>
      <td> <?= $jumlah?></td>
      <td> <?= 'Rp. '.$harga?></td>
    </tr>

    
  </tbody>
</table>
    </div>
</body>
</html>