<?php

session_start();

include "koneksi.php";

$error = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users
         WHERE username='$username'
         AND password='$password'"
    );

    if (mysqli_num_rows($query) == 1) {

        $data = mysqli_fetch_assoc($query);

        $_SESSION['admin'] = $data['nama'];

       header("Location: dasboard_admin.php");

        exit;

    } else {

        $error = "Username atau password salah.";

    }

}

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Login Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

</head>

<body>

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-5">

<div class="card">

<div class="card-header bg-primary text-white text-center">

<h4>Login Admin</h4>

</div>

<div class="card-body">

<?php if ($error) { ?>

<div class="alert alert-danger">
<?= $error; ?>
</div>

<?php } ?>

<form method="POST">

<div class="mb-3">

<label>Username</label>

<input type="text"
       name="username"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Password</label>

<input type="password"
       name="password"
       class="form-control"
       required>

</div>

<button type="submit"
        name="login"
        class="btn btn-primary w-100">

Login

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>