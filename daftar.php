<?php

require 'koneksi.php';

session_start();

if (!isset($_POST['pbeasiswa'])) {
    header("Location:pbeasiswa.php");
}

if (isset($_POST['pbeasiswa'])) {
    $_SESSION['pbeasiswa'] = true;
}

// menghasilkan $ipk otomatis ipk random 0.1 - 4.0
$ipk = number_format(mt_rand(200, 400) / 100, 2);
define('BATAS_IPK', 3.0);

$jbeasiswa = $_POST['jbeasiswa'];  // akademik atau non

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Daftar</title>
</head>

<body>
    <!-- NAV -->
    <nav class="">
        <ul class="nav nav-underline nav-fill justify-content-center bg-white">
            <li class="nav-item">
                <a class="nav-link fw-medium fs-4" aria-current="page" href="pbeasiswa.php">Pilihan Beasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active fw-medium fs-4" href="#">Daftar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-medium fs-4" href="hasil.php">Hasil</a>
            </li>
        </ul>
    </nav>

    <!-- Content -->
    <div class="container mt-5">
        <h2 class="text-center fw-bold">DAFTAR BEASISWA</h2>
        <div class="card mx-auto mt-4" style="width: 40rem;">
            <div class="card-body p-3">
                <h6 class="card-subtitle mb-2 text-body-secondary fw-medium text-decoration-underline">Registrasi Beasiswa</h6>
                <form action="daftarproses.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="status_ajuan" value="Belum Diverifikasi">
                    <div class="mb-3 mt-4">
                        <label for="nama" class="form-label fw-medium">Nama :</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium">Email :</label>
                        <input type="email" name="email" id="email" placeholder="@gmail.com (Masukkan Email)" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label fw-medium ">Nomor HP :</label>
                        <input type="number" name="nohp" id="nohp" class="form-control" placeholder="No. HP" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label class="form-label fw-medium">Semester Saat Ini :</label>
                            <select name="semester" id="semester" class="form-select" required>
                                <option value="" disabled selected>Pilih</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ipk" class="form-label fw-medium">IPK Terakhir :</label>
                        <input class="form-control" type="text" id="ipk" name="ipk" value="<?= $ipk; ?>" disabled readonly>
                        <input type="hidden" name="ipk" id="ipk" value="<?= $ipk; ?>">
                    </div>

                    <?php if ($ipk >= BATAS_IPK) : ?>
                        <div class="mb-3">
                            <div class="form-group">
                                <label class="form-label fw-medium">Pilihan Beasiswa :</label>
                                <select name="jbeasiswa" id="jbeasiswa" class="form-select" required autofocus>
                                    <option value="" disabled selected>Pilihan Beasiswa</option>
                                    <option value="akademik" <?= ($jbeasiswa == 'akademik') ? 'selected' : ''; ?>>Beasiswa Akademik</option>
                                    <option value="non_akademik" <?= ($jbeasiswa == 'non_akademik') ? 'selected' : ''; ?>>Beasiswa Non Akademik</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label fw-medium">Upload Berkas Syarat : (max 5mb)</label>
                            <input type="file" name="gambar" id="gambar" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="p-2">
                                <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
                            </div>
                            <div class="p-2">
                                <a href="index.php" class="btn btn-dark">Batal</a>
                            </div>
                        </div>

                    <?php else : ?>
                        <div class="mb-3">
                            <div class="form-group">
                                <label class="form-label fw-medium">Pilihan Beasiswa :</label>
                                <select name="jbeasiswa" id="jbeasiswa" class="form-select" required disabled>
                                    <option value="" disabled selected>Pilihan Beasiswa</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label fw-medium">Upload Berkas Syarat : (max 5mb, jpg,jpeg,png)</label>
                            <input type="file" name="gambar" id="gambar" class="form-control" disabled>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="p-2">
                                <button type="submit" name="daftar" class="btn btn-primary" disabled>Daftar</button>
                            </div>
                            <div class="p-2">
                                <a href="kembali.php" class="btn btn-dark">Batal</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>