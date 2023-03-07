<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Studi Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container-fluid mt-5">
      <p class="display-4 text-center text-primary font-weight-bold">Hasil Perhitungan</p>
    <table class="table">
  <thead>
    <tr>
      <th scope="col" class="text-center">No</th>
      <th scope="col" class="text-center">Nama Lengkap</th>
      <th scope="col" class="text-center">Mata Kuliah</th>
      <th scope="col" class="text-center">Nilai UTS</th>
      <th scope="col" class="text-center">Nilai UAS</th>
      <th scope="col" class="text-center">Nilai Tugas/Praktek</th>
      <th scope="col" class="text-center">Keterangan</th>
      <th scope="col" class="text-center">Grade Nilai</th>
      <th scope="col" class="text-center">Predikat Nilai</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $namaLengkap = $_POST['namaLengkap'];
    $mataKuliah = $_POST['mataKuliah'];
    $nilaiUts = $_POST['nilaiUts'];
    $nilaiUas = $_POST['nilaiUas'];
    $nilaiTugas = $_POST['nilaiTugas'];
    $avarage= ($_POST['nilaiUts']*30/100) + ($_POST['nilaiUas']*35/100) + ($_POST['nilaiTugas']*35/100);

    if($avarage > 55){
      $keterangan = "Lulus";
    }
    else{
      $keterangan = "Tidak Lulus";
    }
    ?>

    <?php
    switch($avarage){
      case $avarage >= 0 && $avarage <= 35 :
        $predikat = "E";
        $pnilai = "sangat kurang";
        break;
      case $avarage >= 36 && $avarage <= 55 :
        $predikat = "D";
        $pnilai = "Kurang";
        break;
      case $avarage >= 56 && $avarage <= 69 :
        $predikat =  "C";
        $pnilai = "Cukup";
        break;
      case $avarage >= 70 && $avarage <= 84 :
        $predikat =  "B";
        $pnilai = "Memuaskan";
        break;
      case $avarage >= 85 && $avarage <= 100 :
        $predikat =  "A";
        $pnilai = "Sangat Memuaskan";
        break;
      default:
      $predikat =  "I";
      $pnilai = "Tidak Ada";
    }
    ?>

    <tr>
      <th scope="row" class="text-center">1</th>
      <td class="text-center"> <?= ucwords($namaLengkap) ?></td>
      <td class="text-center"> <?= $mataKuliah ?></td>
      <td class="text-center"> <?= $nilaiUts ?></td>
      <td class="text-center"> <?= $nilaiUas ?></td>
      <td class="text-center"> <?= $nilaiTugas ?></td>
      <td class="text-center"> <?= $keterangan ?> </td>
      <td class="text-center"> <?= $predikat?></td>
      <td class="text-center"> <?= $pnilai ?></td>
    </tr>
  </tbody>
</table>
    </div>
</body>
</html>