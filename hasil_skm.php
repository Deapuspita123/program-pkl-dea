<?php

session_start();

if (!isset($_SESSION['admin'])) {
   header("Location: login_admin.php");
    exit;
}

include "koneksi.php";


$total_responden = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total FROM responden"
    )
)['total'];


$query = mysqli_query(
    $conn,
    "SELECT
        p.nomor,
        p.pertanyaan,
        AVG(j.nilai) AS rata
     FROM pertanyaan p
     LEFT JOIN jawaban j
        ON p.id = j.pertanyaan_id
     GROUP BY p.id
     ORDER BY p.nomor"
);


$total_rata = 0;
$jumlah_unsur = 0;

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Hasil SKM</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<a href="dasboard_admin.php">
 

← Dashboard

</a>

<h3>Hasil Survei Kepuasan Masyarakat</h3>

<p>
Jumlah Responden:
<strong><?= $total_responden; ?></strong>
</p>


<table class="table table-bordered">

<thead>

<tr>

<th>No</th>

<th>Unsur Pelayanan</th>

<th>Nilai Rata-rata</th>

</tr>

</thead>

<tbody>

<?php while ($row = mysqli_fetch_assoc($query)) {

$rata = $row['rata'] ?? 0;

$total_rata += $rata;

$jumlah_unsur++;

?>

<tr>

<td>
<?= $row['nomor']; ?>
</td>

<td>
<?= htmlspecialchars($row['pertanyaan']); ?>
</td>

<td>
<?= number_format($rata, 2); ?>
</td>

</tr>

<?php } ?>

</tbody>

</table>


<?php

if ($jumlah_unsur > 0) {

    $rata_unsur = $total_rata / $jumlah_unsur;

    $nilai_skm = $rata_unsur * 25;

} else {

    $rata_unsur = 0;
    $nilai_skm = 0;

}


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

?>


<div class="card mt-4">

<div class="card-body text-center">

<h4>Nilai SKM</h4>

<h1 class="text-primary">

<?= number_format($nilai_skm, 2); ?>

</h1>

<h4>
Mutu Pelayanan: <?= $mutu; ?>
</h4>

<h5>
Kinerja Pelayanan: <?= $kinerja; ?>
</h5>

</div>

</div>

</div>

</body>

</html>