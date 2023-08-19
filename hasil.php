<?php

require 'koneksi.php';

session_start();

$get_id = '';
$get_id = $_GET['id'];

if (!isset($_SESSION['daftar'])) {
    header("Location:pbeasiswa.php");
}

if (!isset($_GET['id'])) {
    header("Location:pbeasiswa.php");
}

$query = "SELECT * FROM t_mahasiswa WHERE id = '$get_id'";
$result = mysqli_query($beasiswa_db, $query);

foreach ($result as $mhs) {
    $statusAjuan = $mhs['status_ajuan'];
    $nama = $mhs['nama'];
    $email = $mhs['email'];
    $semester = $mhs['semester'];
    $ipk = $mhs['ipk'];
    $jbebasiswa = $mhs['jbeasiswa'];
    $nohp = $mhs['nohp'];
    $gambar = $mhs['gambar'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @media print {
            nav {
                display: none !important;
            }

            .hide-on-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <!-- NAV -->
    <nav class="">
        <ul class="nav nav-underline nav-fill justify-content-center bg-white">
            <li class="nav-item">
                <a class="nav-link fw-medium fs-4" href="pbeasiswa.php">Pilihan Beasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-medium fs-4" href="daftar.php">Daftar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active fw-medium fs-4" href="#">Hasil</a>
            </li>
        </ul>
    </nav>
    <!-- Button -->
    <div class="card mx-auto mt-5 hide-on-print" style="width: 45rem;">
        <a href="index.php" class="btn btn-dark">Kembali</a>
    </div>
    <!-- Content -->
    <div class="card mx-auto mt-2" style="width: 45rem;" id="print-area">
        <div class="alert alert-danger col-3 fw-bold" role="alert">Status Ajuan : <?= $statusAjuan; ?></div>
        <h3 class="text-center fw-bold">Gambar</h3>
        <img src="<?= $gambar; ?>" class="card-img-top mx-auto" alt="#" style="width: 150px;">
        <div class="card-body p-3 ms-5">
            <div class="mt-3">
                <ul class="list-unstyled">
                    <li class="fw-medium">NAMA : <?= $nama; ?></li>
                    <li class="fw-medium">EMAIL : <?= $email; ?></li>
                    <li class="fw-medium">NO. HP : <?= $nohp; ?></li>
                    <li class="fw-medium">SEMESTER SAAT INI : <?= $semester; ?></li>
                    <li class="fw-medium">IPK TERAKHIR : <?= $ipk; ?></li>
                    <li class="fw-medium">PILIHAN BEASISWA : <?= $jbebasiswa; ?></li>
                </ul>
            </div>
        </div>
        <div class="hide-on-print ms-5 mb-5" id="hide-pdf">
            <button class="btn btn-primary" id="pdf-btn">PDF</button>
            <button class="btn btn-warning" id="print-btn">PRINT</button>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- html2pdf library -->
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script>
    <script src="JS/html2pdf.js"></script>

</body>

</html>