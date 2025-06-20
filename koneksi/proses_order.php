<?php
include 'koneksi.php';
setlocale(LC_TIME, 'id_ID.UTF-8');

$nama = $_POST['nama_pemesan'];
$menu_terpilih = $_POST['menu_check'];
$jumlah_menu = $_POST['menu'];
$tanggal = strftime("%e %B %Y");

$pesanan = [];
$total_bayar = 0;

foreach ($menu_terpilih as $nama_menu) {
  $qty = isset($jumlah_menu[$nama_menu]) ? (int)$jumlah_menu[$nama_menu] : 0;

  if ($qty > 0) {
    $query = mysqli_query($koneksi, "SELECT harga FROM menu WHERE nama_menu = '$nama_menu' LIMIT 1");
    $row = mysqli_fetch_assoc($query);
    $harga = $row['harga'];

    $subtotal = $harga * $qty;
    $total_bayar += $subtotal;

    $pesanan[] = "$nama_menu $qty";
  }
}

$pesanan_str = implode(", ", $pesanan);

mysqli_query($koneksi, "INSERT INTO `order` (nama_pemesan, pesanan, status, tanggal, total_bayar) VALUES ('$nama', '$pesanan_str', 'Belum', '$tanggal', '$total_bayar')");

header("Location: ../order.php?alert=berhasil");
exit;
?>
