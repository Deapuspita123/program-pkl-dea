
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

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f5f8fc;
            color: #1f2937;
        }

        /* ================= NAVBAR ================= */

        .navbar-custom {
            background: rgba(13, 71, 161, 0.97);
            padding: 16px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.10);
        }

        .brand {
            color: white !important;
            font-size: 20px;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            background: rgba(255,255,255,0.15);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .admin-btn {
            border: 1px solid rgba(255,255,255,0.5);
            color: white;
            border-radius: 10px;
            padding: 9px 18px;
            font-weight: 500;
            transition: 0.3s;
        }

        .admin-btn:hover {
            background: white;
            color: #0d47a1;
        }


        /* ================= HERO ================= */

        .hero {
            min-height: 620px;
            position: relative;
            overflow: hidden;

            background:
                radial-gradient(circle at 10% 20%, rgba(255,255,255,0.15), transparent 25%),
                radial-gradient(circle at 90% 80%, rgba(255,255,255,0.12), transparent 30%),
                linear-gradient(135deg, #0d47a1, #1976d2, #42a5f5);

            display: flex;
            align-items: center;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            top: -220px;
            right: -120px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            bottom: -180px;
            left: -100px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .welcome {
            color: rgba(255,255,255,0.85);
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }
        .welcome-text {
    width: 100%;
    overflow: hidden;
    white-space: nowrap;
    margin-bottom: 18px;
}

.welcome-text span {
    display: inline-block;
    padding-left: 100%;

    font-size: 24px;
    font-weight: 800;
    letter-spacing: 3px;

    color: #ffffff;

    text-shadow:
        0 2px 5px rgba(0,0,0,0.25),
        0 0 10px rgba(255,255,255,0.7),
        0 0 20px rgba(255,255,255,0.4);

    animation: welcomeJalan 11s linear infinite;
}

@keyframes welcomeJalan {
    0% {
        transform: translateX(0);
        opacity: 0;
    }

    10% {
        opacity: 1;
    }

    90% {
        opacity: 1;
    }

    100% {
        transform: translateX(-100%);
        opacity: 1;
    }
}

        .hero-title {
            color: white;
            font-size: 42px;
            line-height: 1.2;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .hero-title span {
            color: #e3f2fd;
        }

        .hero-description {
            color: rgba(255,255,255,0.88);
            font-size: 16px;
            line-height: 1.8;
            max-width: 620px;
            margin-bottom: 28px;
        }

        /* ================= BUTTON ================= */

        .btn-survei {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            background: white;
            color: #0d47a1;

            padding: 14px 28px;
            border-radius: 12px;

            font-size: 16px;
            font-weight: 700;

            text-decoration: none;

            box-shadow: 0 8px 25px rgba(0,0,0,0.15);

            transition: all 0.3s ease;
        }

        .btn-survei:hover {
            transform: translateY(-3px);
            color: #0d47a1;
            box-shadow: 0 12px 30px rgba(0,0,0,0.22);
        }


        /* ================= CARD ================= */

        .survey-card {
            background: rgba(255,255,255,0.97);
            border-radius: 24px;
            padding: 38px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.18);
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .survey-icon {
            width: 85px;
            height: 85px;
            margin: 0 auto 20px;

            border-radius: 22px;

            background: #e3f2fd;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 42px;
        }

        .survey-card h3 {
            font-weight: 700;
            color: #17365d;
            margin-bottom: 12px;
        }

        .survey-card p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.7;
        }

        .small-info {
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid #e5e7eb;
            font-size: 13px;
            color: #6b7280;
        }


        /* ================= INFO SECTION ================= */

        .info-section {
            padding: 70px 0;
            background: #ffffff;
        }

        .section-title {
            text-align: center;
            font-size: 28px;
            font-weight: 700;
            color: #17365d;
            margin-bottom: 10px;
        }

        .section-subtitle {
            text-align: center;
            color: #6b7280;
            margin-bottom: 45px;
        }

        .info-card {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 28px;
            height: 100%;
            transition: 0.3s;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        }

        .info-icon {
            font-size: 32px;
            margin-bottom: 15px;
        }

        .info-card h5 {
            font-weight: 700;
            color: #17365d;
        }

        .info-card p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 0;
        }


        /* ================= FOOTER ================= */

        footer {
            background: #0b2f6b;
            color: white;
            padding: 28px 0;
        }

        .footer-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .footer-text {
            color: rgba(255,255,255,0.7);
            font-size: 13px;
        }


        /* ================= RESPONSIVE ================= */

        @media (max-width: 991px) {

            .hero {
                padding: 70px 0;
            }

            .hero-title {
                font-size: 34px;
            }

            .survey-card {
                margin-top: 40px;
            }
        }

        @media (max-width: 576px) {

            .hero-title {
                font-size: 29px;
            }

            .hero-description {
                font-size: 14px;
            }

            .survey-card {
                padding: 28px 20px;
            }

            .brand {
                font-size: 16px;
            }
        }

    </style>
</head>

<body>


<!-- ================= NAVBAR ================= -->

<nav class="navbar-custom">
    <div class="container d-flex justify-content-between align-items-center">

        <a href="index.php" class="brand">

            <div class="brand-icon">
                🏢
            </div>

            <div>
                DPMPTSP LANGKAT
            </div>

        </a>

        <a href="login_admin.php" class="btn admin-btn">
            🔐 Login Admin
        </a>

    </div>
</nav>



<!-- ================= HERO ================= -->

<section class="hero">

    <div class="container hero-content">

        <div class="row align-items-center g-5">

            <!-- TEXT -->

            <div class="col-lg-7">

            <div class="welcome-text">
                <span>✨ SELAMAT DATANG DI SISTEM SURVEI ✨</span>
            </div>

                <h1 class="hero-title">
                    Survei Kepuasan<br>
                    <span>Masyarakat</span>
                </h1>

                <p class="hero-description">

                    Bantu kami meningkatkan kualitas pelayanan publik
                    dengan memberikan penilaian dan masukan melalui
                    Survei Kepuasan Masyarakat (SKM) DPMPTSP
                    Kabupaten Langkat.

                </p>

                <a href="survei_masyarakat.php" class="btn-survei">

                    📝 Isi Survei Sekarang

                    <span>→</span>

                </a>

            </div>


            <!-- CARD -->

            <div class="col-lg-5">

                <div class="survey-card">

                    <div class="survey-icon">
                        📋
                    </div>

                    <h3>
                        Suara Anda Penting!
                    </h3>

                    <p>

                        Pendapat Anda membantu kami mengetahui
                        tingkat kepuasan masyarakat terhadap pelayanan
                        yang diberikan.

                    </p>

                    <div class="small-info">

                        ✓ Mudah &nbsp;&nbsp;
                        ✓ Cepat &nbsp;&nbsp;
                        ✓ Terpercaya

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ================= INFO ================= -->

<section class="info-section">

    <div class="container">

        <h2 class="section-title">
            Mengapa Mengisi Survei?
        </h2>

        <p class="section-subtitle">
            Setiap penilaian Anda berkontribusi untuk pelayanan yang lebih baik.
        </p>


        <div class="row g-4">

            <div class="col-md-4">

                <div class="info-card">

                    <div class="info-icon">
                        ⭐
                    </div>

                    <h5>
                        Berikan Penilaian
                    </h5>

                    <p>
                        Sampaikan tingkat kepuasan Anda terhadap
                        pelayanan yang telah diterima.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="info-card">

                    <div class="info-icon">
                        💡
                    </div>

                    <h5>
                        Berikan Masukan
                    </h5>

                    <p>
                        Saran dan kritik dari masyarakat membantu
                        meningkatkan kualitas pelayanan publik.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="info-card">

                    <div class="info-icon">
                        📈
                    </div>

                    <h5>
                        Pelayanan Lebih Baik
                    </h5>

                    <p>
                        Hasil survei digunakan sebagai bahan evaluasi
                        untuk meningkatkan pelayanan DPMPTSP.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ================= FOOTER ================= -->

<footer>

    <div class="container text-center">

        <div class="footer-title">
            DPMPTSP Kabupaten Langkat
        </div>

        <div class="footer-text">
            Sistem Data Survei Kepuasan Masyarakat
        </div>

        <div class="footer-text mt-2">
            © 2026 DPMPTSP Kabupaten Langkat
        </div>

    </div>

</footer>


</body>
</html>
```
