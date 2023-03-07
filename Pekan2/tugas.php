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
        <p class="display-4 text-center font-weight-bold text-primary">Form Pengisian Nilai</p>
        <hr>
        <form method="POST" action="nilai_siswa.php">
  <div class="form-group row">
    <label for="namaLengkap" class="col-4 col-form-label">Nama Lengkap</label> 
    <div class="col-8">
      <input id="namaLengkap" name="namaLengkap" placeholder="Nama Lengkap" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="mataKuliah" class="col-4 col-form-label">Mata Kuliah</label> 
    <div class="col-8">
      <select id="mataKuliah" name="mataKuliah" class="custom-select">
        <option value="Pemrograman Web">Pemrograman web</option>
        <option value="Basis Data">Basis Data</option>
        <option value="Jarkom">Jaringan Komputer</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="nilaiUts" class="col-4 col-form-label">Nilai UTS</label> 
    <div class="col-8">
      <input id="nilaiUts" name="nilaiUts" placeholder="Nilai UTS" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nilaiUas" class="col-4 col-form-label">Nilai UAS</label> 
    <div class="col-8">
      <input id="nilaiUas" name="nilaiUas" placeholder="Nilai UAS" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nilaiTugas" class="col-4 col-form-label">NIlai Tugas/Praktikum</label> 
    <div class="col-8">
      <input id="nilaiTugas" name="nilaiTugas" placeholder="Nilai Tugas/Praktikum" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
    </div>
</body>
</html>