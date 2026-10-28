<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

include "koneksi.php";


// ===============================
// TOTAL RESPONDEN
// ===============================

$total_responden = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total
         FROM responden"
    )
)['total'];


// ===============================
// RATA-RATA NILAI SKM
// ===============================

$query = mysqli_query(
    $conn,
    "SELECT AVG(nilai) AS rata
     FROM jawaban"
);

$data_rata = mysqli_fetch_assoc($query);

$rata_jawaban = $data_rata['rata'] ?? 0;


// ===============================
// NILAI SKM
// ===============================

$nilai_skm = $rata_jawaban * 25;


// ===============================
// MUTU PELAYANAN
// ===============================

if ($nilai_skm >= 88.31) {

    $mutu = "A";
    $kinerja = "Sangat Baik";

} elseif ($nilai_skm >= 76.61) {

    $mutu = "B";
    $kinerja = "Baik";

} elseif ($nilai_skm >= 65.00) {

    $mutu = "C";
    $kinerja = "Kurang Baik";

} else {

    $mutu = "D";
    $kinerja = "Tidak Baik";

}


// ===============================
// TANGGAL LAPORAN
// ===============================

$tanggal = date("d-m-Y");

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Laporan SKM</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<style>

@media print {

    .no-print {
        display: none;
    }

}

</style>

</head>

<body>

<div class="container mt-4 mb-5">


<!-- TOMBOL -->

<div class="no-print mb-4">

<a href="dasboard_admin.php"
   class="btn btn-secondary">

← Dashboard

</a>

<button onclick="window.print()"
        class="btn btn-primary">

🖨 Cetak Laporan

</button>

</div>


<!-- =============================== -->
<!-- JUDUL LAPORAN -->
<!-- =============================== -->

<div class="text-center mb-4">

<h3>
LAPORAN SURVEI KEPUASAN MASYARAKAT
</h3>

<h5>
DPMPTSP KABUPATEN LANGKAT
</h5>

<hr>

</div>


<!-- =============================== -->
<!-- INFORMASI -->
<!-- =============================== -->

<table class="table table-bordered">

<tr>

<th width="40%">
Tanggal Laporan
</th>

<td>
<?= $tanggal; ?>
</td>

</tr>

<tr>

<th>
Jumlah Responden
</th>

<td>
<?= $total_responden; ?> Orang
</td>

</tr>

<tr>

<th>
Nilai SKM
</th>

<td>
<strong>
<?= number_format($nilai_skm, 2); ?>
</strong>
</td>

</tr>

<tr>

<th>
Mutu Pelayanan
</th>

<td>
<strong>
<?= $mutu; ?>
</strong>
</td>

</tr>

<tr>

<th>
Kinerja Pelayanan
</th>

<td>
<strong>
<?= $kinerja; ?>
</strong>
</td>

</tr>

</table>


<!-- =============================== -->
<!-- KESIMPULAN -->
<!-- =============================== -->

<div class="card mt-4">

<div class="card-header bg-primary text-white">

Kesimpulan

</div>

<div class="card-body">

<p>

Berdasarkan hasil Survei Kepuasan Masyarakat
pada DPMPTSP Kabupaten Langkat, diperoleh
nilai Survei Kepuasan Masyarakat (SKM) sebesar

<strong>
<?= number_format($nilai_skm, 2); ?>
</strong>.

</p>

<p>

Berdasarkan nilai tersebut, mutu pelayanan
memperoleh kategori

<strong><?= $mutu; ?></strong>

dengan kinerja pelayanan

<strong><?= $kinerja; ?></strong>.

</p>

</div>

</div>


</div>

</body>

</html>