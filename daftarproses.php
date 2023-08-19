<?php

require 'koneksi.php';

session_start();

if (isset($_POST['daftar'])) {
    $_SESSION['daftar'] = true;

    $statusAjuan = $_POST['status_ajuan'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $semester = $_POST['semester'];
    $ipk = $_POST['ipk'];
    $jbeasiswa = $_POST['jbeasiswa'];
    $nohp = $_POST['nohp'];
    $gambar = "";

    if (isset($_FILES['gambar'])) {
        $files = $_FILES['gambar'];

        // ambil 
        $namaFile = $files['name'];
        $ukuranFileByte = $files['size'];
        // konversi ke KB
        $ukuranFileKb = $ukuranFileByte / 1024;
        $tipeError = $files['error'];
        $fileTmp = $files['tmp_name'];

        //cek gambar yang di uplaod apakah gambar?
        $validEkstensi = ['jpg', 'jpeg', 'png'];

        $ekstensiGambarOld = explode('.', $namaFile); // explode pecahkan array
        $ekstensiGambarNew = strtolower(end($ekstensiGambarOld));

        if (in_array($ekstensiGambarNew, $validEkstensi)) {
            // ubah nama file agar tidak tertabrak sama
            $namaFileBaru = uniqid();
            // tambahkan titik serta ekstensi
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambarNew;

            if ($ukuranFileKb < 5000) {
                echo "Size Gambar Pas";

                $lokasiFile = 'img/UploadedImg/' . $namaFileBaru;
                move_uploaded_file($fileTmp, $lokasiFile);

                $gambar = $lokasiFile;
                //query 
                $query = "INSERT INTO t_mahasiswa VALUES ('','$statusAjuan','$nama','$email','$nohp','$semester','$ipk','$jbeasiswa','$gambar')";
                $results = mysqli_query($beasiswa_db, $query);

                if ($results) {
                    $insertedID = mysqli_insert_id($beasiswa_db);
                    echo "Data berhasil ditambahkan dengan ID: " . $insertedID;

                    if (mysqli_affected_rows($beasiswa_db)) {
                       
                        echo "<script>alert('Data Berhasil Ditambahkan');</script>";
                        echo "<script>window.location='hasil.php?id=$insertedID';</script>";
                    }
                }
            }
        }

    }
}
