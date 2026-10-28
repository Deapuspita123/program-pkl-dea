<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

include "koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: pertanyaan.php");
    exit;
}

$id = (int) $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM pertanyaan WHERE id = $id"
);

if (!$query || mysqli_num_rows($query) == 0) {
    echo "Data pertanyaan tidak ditemukan.";
    exit;
}

$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {

   $nomor = (int) $_POST['nomor'];
$pertanyaan = mysqli_real_escape_string($conn, $_POST['pertanyaan']);

$sql = "UPDATE pertanyaan SET
            nomor = $nomor,
            pertanyaan = '$pertanyaan'
        WHERE id = $id";

$update = mysqli_query($conn, $sql);

if ($update) {
    header("Location: pertanyaan.php");
    exit;
} else {
    echo "<div style='margin:20px;padding:15px;background:#f8d7da;color:#842029;'>";
    echo "<strong>Gagal menyimpan perubahan!</strong><br>";
    echo mysqli_error($conn);
    echo "</div>";
}

    $update = mysqli_query($conn, $sql);

    if ($update) {

        header("Location: pertanyaan.php");
        exit;

    } else {

        echo "<div style='margin:20px; padding:15px; background:#f8d7da; color:#842029; border:1px solid #f5c2c7;'>";
        echo "<strong>Gagal menyimpan perubahan!</strong><br><br>";
        echo "Error MySQL: " . mysqli_error($conn);
        echo "</div>";

    }

}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Pertanyaan SKM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container mt-4">

    <a href="pertanyaan.php" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    <h3>Edit Pertanyaan SKM</h3>

    <div class="card mt-3">

        <div class="card-header bg-warning">
            Edit Pertanyaan
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
                           value="<?= htmlspecialchars($data['nomor']); ?>"
                           required>
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        Pertanyaan
                    </label>

                    <textarea name="pertanyaan"
                              class="form-control"
                              rows="4"
                              required><?= htmlspecialchars($data['pertanyaan']); ?></textarea>
                </div>


                <div class="mb-3">
                    <label class="form-label">
                        Status
                    </label>

                    <select name="status" class="form-select">

                        <option value="Aktif"
                            <?= $data['status'] == 'Aktif' ? 'selected' : ''; ?>>
                            Aktif
                        </option>

                        <option value="Nonaktif"
                            <?= $data['status'] == 'Nonaktif' ? 'selected' : ''; ?>>
                            Nonaktif
                        </option>

                    </select>
                </div>


                <button type="submit"
                        name="update"
                        class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="pertanyaan.php"
                   class="btn btn-secondary">
                    Batal
                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>