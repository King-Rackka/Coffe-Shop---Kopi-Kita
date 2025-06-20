<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/review.css" />
    <link rel="icon" type="image/png" href="Gambar/logo_cafe_icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Review - Kopi Kita</title>
</head>
<body>
    
    <?php
    include 'navbar.html';
    ?>

   <?php
      if (isset($_GET['alert'])) {
        if ($_GET['alert'] == 'gagal') {
          echo "
          <script>
            Swal.fire({
              icon: 'error',
              title: 'Komentar terlalu panjang!',
              text: 'Komentar tidak boleh lebih dari 150 karakter.',
              confirmButtonColor: '#d33'
            });
          </script>";
        } elseif ($_GET['alert'] == 'berhasil') {
          echo "
          <script>
            Swal.fire({
              icon: 'success',
              title: 'Review berhasil dikirim!',
              text: 'Terima kasih atas ulasan Anda.',
              confirmButtonColor: '#55A630'
            });
          </script>";
        }
      }
      ?>


<section class="review-box">
  
  <form class="review-form" action="koneksi/proses_input_review.php" method="POST">
    
    <label for="name">Nama</label>
    <input type="text" placeholder="Silahkan Masukkan Nama Anda" id="nama" name="nama" required>

    <label for="email">Email</label>
    <input type="email" placeholder="Silahkan Masukkan Email Anda" id="email" name="email" required>

    <label for="comment">Pesan atau Komentar</label>
    <textarea id="comment" placeholder="Tulis Pesan dan Komentar Kalian Disini...." name="komentar" rows="5" required></textarea>

    <label>Rating</label>
     <div class="star-rating">
      <input type="radio" name="rating" id="star5" value="5"><label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
      <input type="radio" name="rating" id="star4" value="4"><label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
      <input type="radio" name="rating" id="star3" value="3"><label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
      <input type="radio" name="rating" id="star2" value="2"><label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
      <input type="radio" name="rating" id="star1" value="1"><label for="star1" title="1 star"><i class="fas fa-star"></i></label>
    </div>

    
    <button type="submit" class="submit-button">Kirim</button>

  </form>
</section>

<?php
include 'footer.html';
?>

</body>
</html>