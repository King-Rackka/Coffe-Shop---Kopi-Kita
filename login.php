<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/png" href="Gambar/logo_cafe_icon.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php 
      if (isset($_GET['pesan']) && $_GET['pesan'] == 'gagal') : ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Gagal Login',
          text: 'Email atau Password Anda Salah',
          confirmButtonColor: '#ff0000'
        });
      </script>
  <?php endif; ?>

    <div class="login-container">
        <div class="login-left">
            <img src="gambar/logo_cafe_icon.png" alt="Logo Cafe">
        </div>
    <div class="login-right">
        <h2>Welcome !</h2>
            <form action="koneksi/proses_login.php" method="POST">
                <p>Email</p>
                <input type="text" name="email" placeholder="Masukkan Email Anda" required>
                <p>Password</p>
                <input type="password" name="password" placeholder="Masukkan Password Anda" required>
                <button class="tombol" type="submit">LOGIN</button>
            </form>
    </div>
</body>
</html>