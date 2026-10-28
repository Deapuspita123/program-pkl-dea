<?php

include "koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: pertanyaan.php");
    exit;
}

$id = (int) $_GET['id'];

$query = mysqli_query(
    $conn,
    "DELETE FROM pertanyaan WHERE id = $id"
);

if ($query) {
    header("Location: pertanyaan.php");
    exit;
} else {
    echo "Gagal menghapus pertanyaan: " . mysqli_error($conn);
}

?>