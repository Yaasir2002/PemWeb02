<?php
    $mhs1 = [ "id"=>1, "nim"=>'0110222277', "uts"=>98, "uas"=>95, "tugas"=>90];
    $mhs2 = [ "id"=>2, "nim"=>'0110222278', "uts"=>97, "uas"=>90, "tugas"=>89];
    $mhs3 = [ "id"=>3, "nim"=>'0110222279', "uts"=>90, "uas"=>92, "tugas"=>90];
    $mhs4 = [ "id"=>4, "nim"=>'0110222280', "uts"=>94, "uas"=>98, "tugas"=>95];  

    $ar_nilai = [$mhs1,$mhs2,$mhs3,$mhs4];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Pekan 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-primary text-center display-2 fw-bold">Nilai Mahasiswa</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">NIM</th>
      <th scope="col">UTS</th>
      <th scope="col">UAS</th>
      <th scope="col">Tugas</th>
      <th scope="col">Nilai Akhir</th>
    </tr>
  </thead>
  <tbody>

    <?php
        $nomer1 = 1;
        foreach($ar_nilai as $mhs){
            $nilai_akhir = (($mhs['uts'] + $mhs['uas'] + $mhs['tugas'])/3);
            
    ?>

    <tr>
        <td> <?= $nomer1 ?></td>
        <td> <?= $mhs['nim'] ?></td>
        <td> <?= $mhs['uts'] ?></td>
        <td> <?= $mhs['uas'] ?></td>
        <td> <?= $mhs['tugas'] ?></td>
        <td> <?= number_format($nilai_akhir,0 ) ?></td>
    </tr>

    <?php
    $nomer1++;
    }
    ?>
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>