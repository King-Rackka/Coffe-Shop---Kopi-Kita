<?php

include 'koneksi.php';
setlocale(LC_TIME, 'id_ID.UTF-8');

$nama = $_POST['nama'];
$email = $_POST['email'];
$komentar = $_POST['komentar'];
$rating = $_POST['rating'];
$tanggal = strftime("%e %B %Y");

if (strlen($komentar) > 150) {
    header("Location: ../review.php?alert=gagal");
    exit;
}

mysqli_query($koneksi, "INSERT INTO review VALUES ('', '$nama', '$email', '$komentar', '$rating','$tanggal')");

header("location:../review.php?alert=berhasil");

?>