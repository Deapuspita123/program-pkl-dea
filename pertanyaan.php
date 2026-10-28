<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

include "koneksi.php";


// ===============================
// TAMBAH PERTANYAAN
// ===============================

if (isset($_POST['tambah'])) {

    $nomor = $_POST['nomor'];
    $pertanyaan = $_POST['pertanyaan'];
    $aktif = $_POST['aktif'];

    $query = mysqli_query(
        $conn,
        "INSERT INTO pertanyaan
        (nomor, pertanyaan, aktif)
        VALUES
        ('$nomor', '$pertanyaan', '$aktif')"
    );

    if ($query) {
        header("Location: pertanyaan.php");
        exit;
    } else {
        echo "Gagal menambahkan pertanyaan: "
             . mysqli_error($conn);
    }
}


// ===============================
// HAPUS PERTANYAAN
// ===============================

if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    mysqli_query(
        $conn,
        "DELETE FROM pertanyaan WHERE id='$id'"
    );

    header("Location: pertanyaan.php");
    exit;
}


// ===============================
// AMBIL DATA PERTANYAAN
// ===============================

$data = mysqli_query(
    $conn,
    "SELECT *
     FROM pertanyaan
     ORDER BY nomor ASC"
);

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Kelola Pertanyaan SKM</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

</head>

<body>

<div class="container mt-4 mb-5">


<!-- TOMBOL KEMBALI -->

<a href="dasboard_admin.php"
   class="btn btn-secondary mb-3">

← Kembali ke Dashboard

</a>


<h3 class="mb-4">
Kelola Pertanyaan Survei Kepuasan Masyarakat
</h3>


<!-- =============================== -->
<!-- FORM TAMBAH PERTANYAAN -->
<!-- =============================== -->

<div class="card mb-4">

<div class="card-header bg-primary text-white">

Tambah Pertanyaan

</div>

<div class="card-body">

<form method="POST">


<div class="mb-3">

<label class="form-label">
Nomor Pertanyaan
</label>

<input type="number"
       name="nomor"
       class="form-control"
       required>

</div>


<div class="mb-3">

<label class="form-label">
Pertanyaan
</label>

<textarea name="pertanyaan"
          class="form-control"
          rows="3"
          required></textarea>

</div>


<div class="mb-3">

<label class="form-label">
Status
</label>

<select name="aktif"
        class="form-control"
        required>

<option value="Ya">
Aktif
</option>

<option value="Tidak">
Tidak Aktif
</option>

</select>

</div>


<button type="submit"
        name="tambah"
        class="btn btn-primary">

+ Tambah Pertanyaan

</button>


</form>

</div>

</div>


<!-- =============================== -->
<!-- DAFTAR PERTANYAAN -->
<!-- =============================== -->

<div class="card">

<div class="card-header bg-success text-white">

Daftar Pertanyaan SKM

</div>

<div class="card-body">

<div class="table-responsive">

<table class="table table-bordered table-striped">

<thead>

<tr>

<th width="80">
No
</th>

<th>
Pertanyaan
</th>

<th width="130">
Status
</th>

<th width="100">
Aksi
</th>

</tr>

</thead>

<tbody>

<?php

if (mysqli_num_rows($data) > 0) {

    while ($row = mysqli_fetch_assoc($data)) {

?>

<tr>

<td>
<?= $row['nomor']; ?>
</td>

<td>
<?= htmlspecialchars($row['pertanyaan']); ?>
</td>

<td>

<?php if ($row['aktif'] == 'Ya') { ?>

<span class="badge bg-success">
Aktif
</span>

<?php } else { ?>

<span class="badge bg-secondary">
Tidak Aktif
</span>

<?php } ?>

</td>

<td style="white-space: nowrap;">
    <a href="edit_pertanyaan.php?id=<?= $row['id']; ?>"
       class="btn btn-warning btn-sm">
        Edit
    </a>

    <a href="hapus_pertanyaan.php?id=<?= $row['id']; ?>"
       class="btn btn-danger btn-sm"
       onclick="return confirm('Apakah Anda yakin ingin menghapus pertanyaan ini?');">
        Hapus
    </a>
</td>

</tr>

<?php

    }

} else {

?>

<tr>

<td colspan="4"
    class="text-center">

Belum ada pertanyaan.

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>


</div>

</body>

</html>