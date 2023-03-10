<?php


    // jika Belum mengisi form maka tidak dapat pergi ke halaman berhasil
    if( !isset($_POST['submit'])){
        header("Location: index.php");
        exit;
    }

    //menyimpan inputan user keldalam variabel
    $namaLengkap = $_POST['namaLengkap'];
    $matkul = $_POST['mataKuliah'];
    $uts = $_POST['nilaiUts'];
    $uas = $_POST['nilaiUas'];
    $tugas = $_POST['nilaiTugas'];


    //Menentukan Nilai Akhir
    $nilaiAKhir = ($uts + $uas + $tugas) / 3;

    //Memanggil sekaligus menjalankan skrip yang ada di library fungsi
    require_once 'libfungsi.php';
    $nilai = $nilaiAKhir;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Mahasiswa</title>
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
      <th scope="col" class="text-center">Nilai Akhir</th>
      <th scope="col" class="text-center">Grade Nilai</th>
      <th scope="col" class="text-center">Keterangan</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <th scope="row" class="text-center">1</th>
      <td class="text-center"> <?= ucwords($namaLengkap) ?></td>
      <td class="text-center"> <?= $matkul ?></td>
      <td class="text-center"> <?= $uts ?></td>
      <td class="text-center"> <?= $uas ?></td>
      <td class="text-center"> <?= $tugas ?></td>
      <td class="text-center"> <?=number_format( $nilaiAKhir,2 ,',',',') ?></td>
      <td class="text-center"> <?= grade($nilai) ?></td>
      <td class="text-center"> <?= kelulusan($nilai) ?> </td>
    </tr>
  </tbody>
</body>
</html>