<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="icon" type="image/png" href="Gambar/logo_cafe_icon.png">
    <title>Menu - Kopi Kita</title>
</head>
<body>
    
    <?php
    include 'navbar.html';
    ?>

<section class="menu">
    <h2 class="menu-title">Our Menu</h2>
      <div class="menu-container">

        <?php
        include 'koneksi/koneksi.php';
        $data = mysqli_query($koneksi, "SELECT * FROM menu");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <div class="menu-card">
                <div class="menu-card-image">
                    <img src="gambar/Menu/<?php echo $d['link_gambar'] ?>" style="width: 180px;" alt="<?php echo $d['nama_menu']; ?>" class="menu-image">
                </div>
                <div class="menu-card-content">
                    <h3><?php echo $d['nama_menu']; ?></h3>
                    <p><?php echo $d['deskripsi']; ?></p>
                      <div class="price-row">
                        <a href="order.php?menu=<?= urlencode($d['nama_menu']) ?>" style="text-decoration: none;">
                            <button class="price-button">
                                <span class="price-text">Rp. <?= number_format($d['harga'], 0, ',', '.'); ?></span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
          <?php
          }
          ?>
      </div>
</section>  

<?php
include 'footer.html';
?>

</body>
</html>