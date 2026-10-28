<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SKM DPMPTSP Kabupaten Langkat</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: #f4f7fb;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #0d6efd;
        }

        .navbar-brand {
            font-weight: bold;
            color: white !important;
        }

        .hero {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-skm {
            width: 100%;
            max-width: 800px;
            background: white;
            border-radius: 20px;
            padding: 50px;
            text-align: center;
            box-shadow: 0 5px 25px rgba(0,0,0,0.10);
        }

        .icon {
            font-size: 65px;
            margin-bottom: 20px;
        }

        .judul {
            font-size: 32px;
            font-weight: bold;
            color: #222;
        }

        .instansi {
            font-size: 22px;
            color: #0d6efd;
            font-weight: bold;
            margin-top: 10px;
        }

        .deskripsi {
            color: #666;
            margin-top: 20px;
            line-height: 1.7;
        }

        .btn-survei {
            margin-top: 25px;
            padding: 13px 35px;
            font-size: 18px;
            border-radius: 10px;
        }

        footer {
            background: #0d6efd;
            color: white;
            text-align: center;
            padding: 15px;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            SKM DPMPTSP LANGKAT
        </a>

       <a href="login_admin.php" class="btn btn-light">
    Login Admin
</a>
    </div>
</nav>


<!-- HALAMAN UTAMA -->
<section class="hero">

    <div class="container">

        <div class="card-skm">

            <div class="icon">
                📋
            </div>

            <div class="judul">
                Survei Kepuasan Masyarakat
            </div>

            <div class="instansi">
                DPMPTSP Kabupaten Langkat
            </div>

            <p class="deskripsi">
                Selamat datang di Sistem Data Survei Kepuasan Masyarakat
                Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu
                Kabupaten Langkat.
            </p>

            <p class="deskripsi">
                Silakan mengisi survei untuk memberikan penilaian terhadap
                kualitas pelayanan yang telah diberikan.
            </p>

            <a href="survei_masyarakat.php"
               class="btn btn-primary btn-survei">

                📝 Isi Survei Sekarang

            </a>

        </div>

    </div>

</section>


<!-- FOOTER -->
<footer>
    <div>
        © 2026 DPMPTSP Kabupaten Langkat
    </div>

    <div>
        Sistem Data Survei Kepuasan Masyarakat
    </div>
</footer>


</body>
</html>