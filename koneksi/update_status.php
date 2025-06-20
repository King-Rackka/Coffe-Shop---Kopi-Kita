<?php

include 'koneksi.php';
$id = $_POST['id_order'];

mysqli_query($koneksi, "UPDATE `order` SET status = 'Terima' WHERE id_order = '$id'");

header("location:../Admin/dashboard.php#order");

?>