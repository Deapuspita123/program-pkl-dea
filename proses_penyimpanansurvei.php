<?php
session_start();
include "koneksi.php";

$nama          = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$umur          = $_POST['umur'];
$pendidikan    = $_POST['pendidikan'];
$pekerjaan     = $_POST['pekerjaan'];
$jawaban       = $_POST['jawaban'];

$query = mysqli_query(
    $conn,
    "INSERT INTO responden
    (nama, jenis_kelamin, umur, pendidikan, pekerjaan)
    VALUES
    ('$nama',
     '$jenis_kelamin',
     '$umur',
     '$pendidikan',
     '$pekerjaan')"
);

if (!$query) {
    die("Gagal menyimpan data responden.");
}

$responden_id = mysqli_insert_id($conn);

foreach ($jawaban as $pertanyaan_id => $nilai) {

    mysqli_query(
        $conn,
        "INSERT INTO jawaban
        (responden_id, pertanyaan_id, nilai)
        VALUES
        ('$responden_id',
         '$pertanyaan_id',
         '$nilai')"
    );

}

header("Location: selesai.php");

exit;

?>