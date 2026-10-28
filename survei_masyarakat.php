<?php

include "koneksi.php";

$pertanyaan = mysqli_query(
    $conn,
    "SELECT * FROM pertanyaan
     WHERE aktif='Ya'
     ORDER BY nomor ASC"
);

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Survei Kepuasan Masyarakat</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

</head>

<body>

<div class="container mt-4 mb-5">

<h2 class="text-center">
    Survei Kepuasan Masyarakat
</h2>

<p class="text-center text-muted">
    DPMPTSP Kabupaten Langkat
</p>

<form action="proses_penyimpanansurvei.php" method="POST">

<div class="card mb-4">

<div class="card-header bg-primary text-white">
    Data Responden
</div>

<div class="card-body">

<div class="mb-3">

<label>Nama</label>

<input type="text"
       name="nama"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Jenis Kelamin</label>

<select name="jenis_kelamin"
        class="form-control"
        required>

<option value="">-- Pilih --</option>
<option value="Laki-laki">Laki-laki</option>
<option value="Perempuan">Perempuan</option>

</select>

</div>

<div class="mb-3">

<label>Umur</label>

<input type="number"
       name="umur"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Pendidikan</label>

<select name="pendidikan"
        class="form-control">

<option>SD</option>
<option>SMP</option>
<option>SMA</option>
<option>Diploma</option>
<option>S1</option>
<option>S2</option>
<option>S3</option>

</select>

</div>

<div class="mb-3">

<label>Pekerjaan</label>

<input type="text"
       name="pekerjaan"
       class="form-control">

</div>

</div>
</div>


<?php while ($p = mysqli_fetch_assoc($pertanyaan)) { ?>

<div class="card mb-3">

<div class="card-body">

<h5>

<?= $p['nomor']; ?>.
<?= htmlspecialchars($p['pertanyaan']); ?>

</h5>

<div class="mt-3">

<div class="form-check">

<input class="form-check-input"
       type="radio"
       name="jawaban[<?= $p['id']; ?>]"
       value="1"
       required>

<label class="form-check-label">
    1 - Tidak Baik
</label>

</div>

<div class="form-check">

<input class="form-check-input"
       type="radio"
       name="jawaban[<?= $p['id']; ?>]"
       value="2">

<label class="form-check-label">
    2 - Kurang Baik
</label>

</div>

<div class="form-check">

<input class="form-check-input"
       type="radio"
       name="jawaban[<?= $p['id']; ?>]"
       value="3">

<label class="form-check-label">
    3 - Baik
</label>

</div>

<div class="form-check">

<input class="form-check-input"
       type="radio"
       name="jawaban[<?= $p['id']; ?>]"
       value="4">

<label class="form-check-label">
    4 - Sangat Baik
</label>

</div>

</div>

</div>
</div>

<?php } ?>


<button type="submit"
        class="btn btn-primary btn-lg w-100">

Kirim Survei

</button>

</form>

</div>

</body>
</html>