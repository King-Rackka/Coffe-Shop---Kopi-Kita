<?php
session_start();
include '../koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../Gambar/logo_cafe_icon.png">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Dashboard Admin</title>
</head>
<body>

<?php 
  if (isset($_GET['alert']) && $_GET['alert'] == 'berhasil') : ?>
    <script>
        Swal.fire({
          icon: 'success',
          title: 'Login Berhasil',
          text: 'Hallo, Selamat Datang Admin',
          confirmButtonColor: '#55A630'
        });
    </script>
<?php endif; ?>


<script>
  function konfirmasiHapus(button) {
    Swal.fire({
      title: 'Yakin ingin menghapus?',
      text: "Data akan dihapus secara permanen!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#aaa',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        // Submit form terdekat (parent form)
        button.closest('form').submit();
      }
    });
  }
</script>

<button id="hamburger-btn" class="hamburger">&#9776;</button>

<div class="admin-container">
  <section class="sidebar">
    <div class="sidebar-header">
      <img src="../Gambar/logo_cafe_icon.png" class="logo">
      <h2><?= $_SESSION['nama'] ?? 'Admin'; ?></h2>
    </div>
    <nav class="menu">
      <ul>
        <li><a href="#menu">Daftar Menu Cafe</a></li>
        <li><a href="#order">Daftar Order</a></li>
        <li><a href="#review">Komentar Customer</a></li>
      </ul>
    </nav>
    <div class="logout-section">
      <form action="../koneksi/logout.php" method="POST">
        <button type="submit" class="logout-button"><i class="fas fa-sign-out-alt"></i> Logout</button>
      </form>
    </div>
  </section>

<div class="content">
  <section id="menu">
    <h2>Daftar Menu Cafe</h2>
      <table class="menu-table">
        <thead>
          <tr>
            <th style="width:20px;">No</th>
            <th style="width: 80px;">Nama Menu</th>
            <th style="width: 40px;">Jenis</th>
            <th style="width: 240px;">Deskripsi</th>
            <th style="width: 50px;">Gambar</th>
            <th style="width: 80px;">Harga</th>
            <th style="width: 60px;">Kategori</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM menu");
        while ($d = mysqli_fetch_array($data)) {
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['nama_menu']; ?></td>
            <td><?php echo $d['jenis']; ?></td>
            <td><?php echo $d['deskripsi']; ?></td>
            <td>
              <img src="../gambar/menu/<?php echo $d['link_gambar'] ?>" style="width : 100px;" alt="">
            </td>
            <td>Rp <?php echo number_format($d['harga'], 0, ',', '.'); ?></td>
            <td><?php echo $d['kategori']; ?></td>
          </tr>
        <?php 
          } 
        ?>
      </tbody>
    </table>
  </section>

    <section id="order">
      <h2>Daftar Orderan Pesanan</h2>
      <table class="order-table">
        <thead>
          <tr>
            <th style="width: 40px;">No</th>
            <th style="width: 120px;">Customer</th>
            <th style="width: 120px;">Tanggal Pesanan</th>
            <th>Pesanan</th>
            <th style="width: 100px;">Total Bayar</th>
            <th style="width: 100px;">Status</th>
            <th style="width: 100px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM `order` ORDER BY tanggal DESC");
        while ($d = mysqli_fetch_array($data)) {
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['nama_pemesan']; ?></td>
            <td><?php echo $d['tanggal']; ?></td>
            <td><?php echo $d['pesanan']; ?></td>
            <td>Rp <?php echo number_format($d['total_bayar'], 0, ',', '.'); ?></td>
            <td style="text-align : center;">
              <?php if ($d['status'] === 'Belum'): ?>
                <form action="../koneksi/update_status.php" method="POST">
                  <input type="hidden" name="id_order" value="<?= $d['id_order']; ?>">
                  <button type="submit" class="status-button green">Selesai</button>
                </form>
              <?php else: ?>
                <span>Selesai</span>
              <?php endif; ?>
            </td>
            <td>
               <form action="../koneksi/hapus_data.php" method="POST">
                  <input type="hidden" name="id_order" value="<?= $d['id_order']; ?>">
                  <button type="button" class="status-button-hapus" onclick="konfirmasiHapus(this)">Hapus</button>
                </form>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </section>

    <section id="review">
      <h2>Komentar Customer</h2>
      <table class="review-table">
        <thead>
          <tr>
            <th style="width: 40px;">No</th>
            <th style="width: 160px;">Customer</th>
            <th style="width: 180px;">Email</th>
            <th style="width: 130px;">Tanggal</th>
            <th>Komentar</th>
            <th style="width: 180px;">Rating</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM review ORDER BY tanggal DESC");
        while ($r = mysqli_fetch_array($data)) {
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['nama']; ?></td>
            <td><?php echo $r['email']; ?></td>
            <td><?php echo $r['tanggal']; ?></td>
            <td style="width : 450px;" ><?php echo $r['komentar']; ?></td>
            <td>
              <?php for ($i = 1; $i <= 5; $i++): ?>
                <i class="fas fa-star" style="color: <?= $i <= $r['rating'] ? '#ffc107' : '#ddd'; ?>"></i>
              <?php endfor; ?>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </section>
  </div>
</div>

<script>
  const links = document.querySelectorAll('.menu a');
  const sections = document.querySelectorAll('.content section');

    links.forEach(link => {
      link.addEventListener('click', e => {
        e.preventDefault();
        const id = link.getAttribute('href').substring(1);
        sections.forEach(s => s.classList.remove('active'));
        document.getElementById(id).classList.add('active');
        history.pushState(null, null, '#' + id);
      });
    });

  const current = window.location.hash.substring(1);
    if (current) {
      sections.forEach(s => s.classList.remove('active'));
      const section = document.getElementById(current);
      if (section) section.classList.add('active');
    } else {
      document.getElementById('menu').classList.add('active');
    }
</script>

<script>
  const hamburgerBtn = document.getElementById("hamburger-btn");
  const sidebar = document.querySelector(".sidebar");

  hamburgerBtn.addEventListener("click", () => {
    sidebar.classList.toggle("sidebar-open");
  });
</script>

</body>
</html>
