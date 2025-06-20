<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="icon" type="image/png" href="Gambar/logo_cafe_icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Home - Kopi Kita</title>
</head>

    <?php
    include 'navbar.html';
    ?>

  <div class="container">
    <div class="kiri">
        <h3>Welcome To</h3>
        <h1>Kopi Kita.</h1>
        <p>
            Tempat ngopi paling asik buat nongkrong bareng temen atau me-time sendirian.
            Dari kopi susu kekinian sampe espresso strong, semua bisa lo nikmatin di sini.
            Suasananya cozy banget, ada wifi kenceng, colokan banyak, tinggal bawa cerita lo aja.
        </p>
  </div>
  <div class="kanan">
        <img src="Gambar/logo_cafe_icon.png" />
  </div>
</div>

<section class="menu">
    <h2 class="menu-title">Our Special Menu</h2>
      <div class="menu-container">

        <?php
        include 'koneksi/koneksi.php';
        $data = mysqli_query($koneksi, "SELECT * FROM menu WHERE kategori = 'spesial' LIMIT 6 ");
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
                        <a href="order.php" style="text-decoration: none;">
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
<section class="about-section">
  <div class="about-wrapper">
    <h2 class="about-title">Little More About</h2>
      <div class="about-card">
        <div class="about-image">
          <img src="gambar/logo_cafe.png" alt="Kopi Kita Logo">
        </div>
        <div class="about-text">
          <h2>Kenapa Harus Kopi Kita?</h2>
           <p>
              Kopi Kita bukan sekadar tempat ngopi, 
              tapi ruang hangat untuk berbagi cerita, ide, dan inspirasi. 
              Dengan mengusung konsep lokal yang modern, setiap sudut café ini 
              dirancang agar nyaman untuk semua baik kamu yang ingin bekerja, 
              bersantai, atau bertemu teman. Kopi Kita menyajikan kopi pilihan dari 
              biji-biji lokal terbaik Nusantara yang disangrai dengan teknik presisi oleh 
              barista profesional. Jadi, bukan hanya soal rasa, tapi juga soal pengalaman dari 
              aroma yang membangkitkan semangat hingga suasana yang bikin betah berlama-lama.
              Yuk, mampir ke Kopi Kita tempat di mana kopi, koneksi, dan kreativitas ngumpul jadi satu!
              Ngopi di sini gak cuma nikmatin rasa, tapi juga nambah cerita!
          </p>
        </div>
      </div>
  </div>
</section>

<section class="review-section">
  <h2 class="review-title">What Our Guests Say</h2>
    <div class="review-container">

    <?php
      $data = mysqli_query($koneksi, "SELECT * FROM review WHERE rating >= 4 ORDER BY id_review DESC LIMIT 5");
      while ($d = mysqli_fetch_array($data)) {
    ?>
      <div class="review-card">
        <h4><?php echo $d['nama'] ?></h4>
          <div class="rating">
            <?php for ($i = 1; $i <= 5; $i++): ?>
              <i class="fas fa-star <?= $i <= $d['rating'] ? 'filled' : '' ?>"></i>
            <?php endfor; ?>
          </div>
            <p class="review-date"><?php echo $d['tanggal'] ?></p>
            <p class="review-comment"><?php echo $d['komentar'] ?></p>
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