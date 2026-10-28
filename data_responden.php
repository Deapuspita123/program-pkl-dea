<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

include "koneksi.php";

$data = mysqli_query(
    $conn,
    "SELECT * FROM responden
     ORDER BY tanggal DESC"
);

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Data Responden</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<a href="dasboard_admin.php">
    ← Dashboard
</a>

</a>

<h3>Data Responden</h3>

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>No</th>
<th>Nama</th>
<th>Jenis Kelamin</th>
<th>Umur</th>
<th>Pendidikan</th>
<th>Pekerjaan</th>
<th>Tanggal</th>

</tr>

</thead>

<tbody>

<?php

$no = 1;

while ($row = mysqli_fetch_assoc($data)) {

?>

<tr>

<td><?= $no++; ?></td>

<td><?= htmlspecialchars($row['nama']); ?></td>

<td><?= $row['jenis_kelamin']; ?></td>

<td><?= $row['umur']; ?></td>

<td><?= $row['pendidikan']; ?></td>

<td><?= htmlspecialchars($row['pekerjaan']); ?></td>

<td><?= $row['tanggal']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</body>
</html>