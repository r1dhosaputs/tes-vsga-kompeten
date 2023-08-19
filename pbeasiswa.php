<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilihan Beasiswa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- NAV -->
    <nav class="">
        <ul class="nav nav-underline nav-fill justify-content-center bg-white">
            <li class="nav-item">
                <a class="nav-link active fw-medium fs-4" aria-current="page" href="#">Pilihan Beasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-medium fs-4" href="daftar.php">Daftar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-medium fs-4" href="hasil.php">Hasil</a>
            </li>
        </ul>
    </nav>
    <!-- Content -->
    <section id="costum-margin">
        <div class="container mt-5 ">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2>Pilih Beasiswa</h2>
                    <form action="daftar.php" method="post">
                        <div class="form-group">
                            <label class="form-label">Pilih Jenis Beasiswa :</label>
                            <select name="jbeasiswa" id="jbeasiswa" class="form-select" required>
                                <option value="" disabled selected>Jenis Beasiswa</option>
                                <option value="akademik">Beasiswa Akademik</option>
                                <option value="non_akademik">Beasiswa Non Akademik</option>
                            </select>
                        </div>
                        <a href="index.php" class="btn btn-dark mt-3">Kembali</a>
                        <button type="submit" class="btn btn-primary mt-3" name="pbeasiswa">Lanjut >></button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>