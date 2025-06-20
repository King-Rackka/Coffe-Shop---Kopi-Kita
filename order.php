<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Order Menu - Kopi Kita</title>
  <link rel="stylesheet" href="css/order.css">
  <link rel="icon" type="image/png" href="Gambar/logo_cafe_icon.png">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <?php
    include 'navbar.html';
    ?>

    <?php
    $selectedMenu = isset($_GET['menu']) ? urldecode($_GET['menu']) : '';
    ?>

<script>
    function toggleQty(id) {
        const input = document.getElementById('qty_' + id);
        if (input.style.display === 'none' || input.style.display === '') {
            input.style.display = 'inline-block';
            input.value = 1;
        } else {
            input.style.display = 'none';
            input.value = '';
        }
    }

    window.onload = function() {
        <?php if (!empty($selectedMenu)): ?>
            const menuId = "<?= strtolower(str_replace(' ', '_', $selectedMenu)) ?>";
            const checkbox = document.querySelector(`input[value="<?= $selectedMenu ?>"]`);
            
            if (checkbox) {
                checkbox.checked = true;
                document.getElementById('qty_' + menuId).style.display = 'inline-block';
                document.getElementById('qty_' + menuId).value = 1;
            }
        <?php endif; ?>
    };
</script>

<?php 
      if (isset($_GET['alert']) && $_GET['alert'] == 'berhasil') : ?>
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Terima kasih!',
          text: 'Pesanan Anda telah kami terima.',
          confirmButtonColor: '#55A630'
        });
      </script>
  <?php endif; ?>

<div class="order-wrapper">
  <form action="koneksi/proses_order.php" method="POST">
    <label for="nama_pemesan"><b>Nama Pemesan</b></label>
    <input type="text" name="nama_pemesan" placeholder="Silahkan Masukkan Nama Anda" id="nama_pemesan" required>
    <h4>Pilih Menu dan Jumlah:</h4>

    <?php
      include 'koneksi/koneksi.php';
      $data = mysqli_query($koneksi, "SELECT * FROM menu ORDER BY nama_menu ASC");
      while ($d = mysqli_fetch_array($data)) {
      $menuId = strtolower(str_replace(' ', '_', $d['nama_menu']));
    ?>

      <div class="menu-item">
        <label>
          <input type="checkbox" name="menu_check[]" value="<?= $d['nama_menu']; ?>" onclick="toggleQty('<?= $menuId ?>')">
          <?= $d['nama_menu']; ?>    (Rp. <?= number_format($d['harga'], 0, ',', '.'); ?>)
        </label>
        <input  type="number" name="menu[<?= $d['nama_menu']; ?>]" id="qty_<?= $menuId ?>" min="1" style="display: none; width: 60px;">
      </div>

    <?php 
      } 
    ?>

    <button type="submit">Kirim Pesanan</button>
  </form>
</div>

<?php
include 'footer.html';
?>

</body>
</html>
