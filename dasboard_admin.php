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

$total_pertanyaan = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total FROM pertanyaan"
    )
)['total'];
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - SKM DPMPTSP</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f4f7fb;
            color: #1e293b;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar-custom {
            background: linear-gradient(135deg, #0d47a1, #1976d2);
            padding: 16px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
        }

        .brand {
            color: white;
            font-size: 21px;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: 0.3px;
        }

        .brand span {
            font-size: 25px;
            margin-right: 8px;
        }

        .logout-btn {
            background: #ef4444;
            color: white;
            border: none;
            padding: 9px 20px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #dc2626;
            color: white;
            transform: translateY(-2px);
        }

        /* =========================
           CONTAINER
        ========================= */

        .dashboard-container {
            max-width: 1150px;
            margin: 0 auto;
            padding: 45px 20px 60px;
        }

        /* =========================
           WELCOME
        ========================= */

        .welcome-box {
            margin-bottom: 35px;
        }

        .welcome-box h1 {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #0f172a;
        }

        .welcome-box h1 span {
            color: #1976d2;
        }

        .welcome-box p {
            color: #64748b;
            font-size: 15px;
            margin: 0;
        }

        /* =========================
           STAT CARDS
        ========================= */

        .stat-card {
            position: relative;
            border: none;
            border-radius: 18px;
            overflow: hidden;
            min-height: 210px;
            padding: 28px;
            color: white;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.10);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.16);
        }

        .responden-card {
            background: linear-gradient(135deg, #1976d2, #42a5f5);
        }

        .pertanyaan-card {
            background: linear-gradient(135deg, #15803d, #22c55e);
        }

        .card-icon {
            width: 55px;
            height: 55px;
            border-radius: 15px;
            background: rgba(255,255,255,0.20);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
            margin-bottom: 20px;
        }

        .stat-card h5 {
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 5px;
            opacity: 0.95;
        }

        .total-number {
            font-size: 43px;
            font-weight: 800;
            margin: 0 0 18px;
            line-height: 1;
        }

        .card-button {
            display: inline-block;
            background: white;
            color: #1976d2;
            text-decoration: none;
            padding: 9px 16px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            transition: 0.3s;
        }

        .card-button:hover {
            background: #f1f5f9;
            color: #0d47a1;
            transform: translateX(3px);
        }

        .pertanyaan-card .card-button {
            color: #15803d;
        }

        /* =========================
   MENU PENGELOLAAN
========================= */

.menu-title {
    font-size: 21px;
    font-weight: 700;
    margin-top: 45px;
    margin-bottom: 20px;
    color: #0f172a;
}


/* CARD MENU */

.menu-card {
    position: relative;
    background: white;
    border-radius: 20px;
    padding: 28px;
    min-height: 215px;
    height: 100%;
    text-decoration: none;
    color: #1e293b;
    display: block;
    overflow: hidden;

    border: 1px solid #e5e7eb;

    box-shadow:
        0 8px 25px rgba(15, 23, 42, 0.07);

    transition: all 0.35s ease;
}


/* GARIS WARNA DI ATAS CARD */

.menu-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: linear-gradient(
        90deg,
        #1976d2,
        #42a5f5
    );
}


/* CARD KEDUA */

.menu-card:nth-child(1)::before {
    background: linear-gradient(
        90deg,
        #1976d2,
        #42a5f5
    );
}


/* HOVER */

.menu-card:hover {
    transform: translateY(-8px);

    box-shadow:
        0 18px 40px rgba(15, 23, 42, 0.13);

    color: #1e293b;
}


/* ICON */

.menu-icon {
    width: 65px;
    height: 65px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 18px;

    font-size: 31px;

    margin-bottom: 20px;

    background: linear-gradient(
        135deg,
        #e0edff,
        #f1f6ff
    );

    box-shadow:
        0 6px 15px rgba(25, 118, 210, 0.10);

    transition: 0.35s;
}


/* ICON BERGERAK SAAT HOVER */

.menu-card:hover .menu-icon {
    transform: scale(1.08) rotate(-3deg);
}


/* JUDUL */

.menu-card h5 {
    font-size: 19px;
    font-weight: 700;

    margin-bottom: 8px;

    color: #0f172a;
}


/* DESKRIPSI */

.menu-card p {
    font-size: 13.5px;
    line-height: 1.7;

    color: #64748b;

    margin-bottom: 17px;
}


/* LINK */

.menu-link {
    display: inline-flex;
    align-items: center;

    color: #1976d2;

    font-size: 13px;
    font-weight: 700;

    transition: 0.3s;
}


/* LINK BERGESER */

.menu-card:hover .menu-link {
    transform: translateX(6px);
}


/* CARD LAPORAN DIBUAT AGAK BERBEDA */

.menu-card:nth-child(2) .menu-icon {
    background: linear-gradient(
        135deg,
        #eee8ff,
        #f7f3ff
    );
}

.menu-card:nth-child(2) .menu-link {
    color: #7c3aed;
}

        /* =========================
           FOOTER
        ========================= */

        .footer {
            text-align: center;
            margin-top: 55px;
            color: #94a3b8;
            font-size: 13px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .dashboard-container {
                padding-top: 30px;
            }

            .welcome-box h1 {
                font-size: 25px;
            }

            .brand {
                font-size: 17px;
            }

            .stat-card {
                margin-bottom: 15px;
            }

        }

    </style>

</head>

<body>

<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar-custom">

    <div class="container d-flex justify-content-between align-items-center">

        <a href="dasboard_admin.php" class="brand">
            <span>📊</span>
            SKM DPMPTSP Kabupaten Langkat
        </a>

        <a href="logout.php" class="logout-btn">
            Logout
        </a>

    </div>

</nav>


<!-- =========================
     DASHBOARD
========================= -->

<div class="dashboard-container">

    <!-- WELCOME -->

    <div class="welcome-box">

        <h1>
            Selamat Datang, <span><?= $_SESSION['admin']; ?></span> 👋
        </h1>

        <p>
            Kelola dan pantau data Survei Kepuasan Masyarakat DPMPTSP Kabupaten Langkat.
        </p>

    </div>


    <!-- STATISTIK -->

    <div class="row g-4">

        <!-- TOTAL RESPONDEN -->

        <div class="col-md-6">

            <div class="stat-card responden-card">

                <div class="card-icon">
                    👥
                </div>

                <h5>Total Responden</h5>

                <div class="total-number">
                    <?= $total_responden; ?>
                </div>

                <a href="data_responden.php" class="card-button">
                    Lihat Data →
                </a>

            </div>

        </div>


        <!-- TOTAL PERTANYAAN -->

        <div class="col-md-6">

            <div class="stat-card pertanyaan-card">

                <div class="card-icon">
                    📝
                </div>

                <h5>Total Pertanyaan</h5>

                <div class="total-number">
                    <?= $total_pertanyaan; ?>
                </div>

                <a href="pertanyaan.php" class="card-button">
                    Kelola Pertanyaan →
                </a>

            </div>

        </div>

    </div>


    <!-- MENU -->

    <div class="menu-title">
        Menu Pengelolaan
    </div>


    <div class="row g-4">

        <!-- HASIL SKM -->

        <div class="col-md-6">

            <a href="hasil_skm.php" class="menu-card">

                <div class="menu-icon">
                    📊
                </div>

                <h5>Hasil SKM</h5>

                <p>
                    Lihat dan pantau hasil Survei Kepuasan Masyarakat.
                </p>

                <div class="menu-link">
                    Lihat Hasil →
                </div>

            </a>

        </div>


        <!-- LAPORAN -->

        <div class="col-md-6">

            <a href="laporan.php" class="menu-card">

                <div class="menu-icon">
                    📄
                </div>

                <h5>Laporan</h5>

                <p>
                    Kelola dan cetak laporan hasil Survei Kepuasan Masyarakat.
                </p>

                <div class="menu-link">
                    Buka Laporan →
                </div>

            </a>

        </div>

    </div>


    <!-- FOOTER -->

    <div class="footer">

        Sistem Survei Kepuasan Masyarakat<br>
        DPMPTSP Kabupaten Langkat

    </div>

</div>


</body>
</html>