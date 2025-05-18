<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title><?=$toko->nama_toko?></title>
<meta name="description" content="<?=$about->tentang_kami?>">
<meta name="keywords" content="vjmmoneychanger, money changer padang, penukaran uang, kurs valas,ptvalutamasjayamandiri">
<meta name="author" content="VJM Money Changer">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Schema Markup (SEO Bagus) -->
<?php
$teleponList = [];
foreach ($wa as $w) {
    $teleponList[] = $w->nama_admin . ' : ' . $w->nomor_wa;
}
$teleponFinal = implode(" | ", $teleponList);
?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "<?=$toko->nama_toko?>",
  "url": "https://vjmmoneychanger.com",
  "logo": "<?= base_url() ?>uploads/<?= $toko->logo_toko ?>",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Jalan Akses BIM",
    "addressLocality": "Padang Pariaman",
    "addressRegion": "Sumatera Barat",
    "postalCode": "25586",
    "addressCountry": "ID"
  },
  "telephone": "<?=$teleponFinal?>"
}
</script>

  <!-- Favicon -->
  <link href="<?=base_url()?>assets_main/img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <!-- Libraries Stylesheet -->
  <link href="<?=base_url()?>assets_main/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets_main/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="<?=base_url()?>assets_main/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="<?=base_url()?>assets_main/css/style.css" rel="stylesheet">

  <!-- Optional: Tambahkan scroll-behavior smooth untuk efek scroll yang halus -->
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>

<!-- Tambahkan data-bs-spy, data-bs-target, dan data-bs-offset di sini. Pastikan tabindex="0" agar scrollspy bekerja -->
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70" tabindex="0">
  <div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
    <a href="#home" class="navbar-brand">
  <h4 class="m-0 text-primary" style="font-family: Calibri, sans-serif;">
    <img src="<?= base_url() ?>uploads/<?= $toko->logo_toko ?>" style="width: 10%;" alt="Logo">
    <?= $toko->nama_toko ?>
  </h4>
</a>

      <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto">
          <a href="#home" class="nav-item nav-link">Rumah</a>
          <a href="#about" class="nav-item nav-link">Tentang Kami</a>
          <a href="#classes" class="nav-item nav-link">Kurs Mata Uang</a>
          <a href="#footer" class="nav-item nav-link">Kontak Kami</a>
          <?php if ($this->session->userdata('session_login')) : ?>
        <a href="<?= base_url('controller_wa')?>" class="nav-link">Admin</a>
        <?php else : ?>
          <a href="<?= base_url('auth/login')?>" class="nav-link">Login</a>
          <?php endif; ?>
        </div>
        
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Carousel Start (id="home") -->
    <div id="home" class="container-fluid p-0 mb-5" style="scroll-margin-top: 90px;">
      <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
          <img class="img-fluid" src="<?=base_url()?>uploads/<?= $jumbotron->gambar_1?>" alt="">
          <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
            <div class="container">
              <div class="row justify-content-start">
                <div class="col-10 col-lg-8">
                  <h1 class="display-2 text-white animated slideInDown mb-4"><?= $jumbotron->judul_1?></h1>
                  <p class="fs-5 fw-medium text-white mb-4 pb-2"><?= $jumbotron->paragraft_1?></p>
                  <div class="dropdown">
                    <button class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft dropdown-toggle" type="button" id="hubungiKamiDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                      Hubungi Kami
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="hubungiKamiDropdown">
                      <?php foreach ($wa as $w): ?>
                        <li>
                          <a class="dropdown-item" href="https://api.whatsapp.com/send?phone=<?= $w->nomor_wa ?>" target="_blank">
                           Admin: <?= $w->nama_admin ?>
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="owl-carousel-item position-relative">
          <img class="img-fluid" src="<?=base_url()?>uploads/<?= $jumbotron->gambar_2?>" alt="">
          <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
            <div class="container">
              <div class="row justify-content-start">
                <div class="col-10 col-lg-8">
                  <h1 class="display-2 text-white animated slideInDown mb-4"><?= $jumbotron->judul_2?></h1>
                  <p class="fs-5 fw-medium text-white mb-4 pb-2"><?= $jumbotron->paragraft_2?></p>
                  <div class="dropdown">
                    <button class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft dropdown-toggle" type="button" id="hubungiKamiDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                      Hubungi Kami
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="hubungiKamiDropdown">
                      <?php foreach ($wa as $w): ?>
                        <li>
                          <a class="dropdown-item" href="https://api.whatsapp.com/send?phone=<?= $w->nomor_wa ?>" target="_blank">
                           Admin: <?= $w->nama_admin ?>
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start (id="about") -->
    <div id="about" class="container-xxl py-5" style="scroll-margin-top: 70px;">
      <div class="container">
        <div class="row g-5 align-items-center">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-4">Ketahui Kami Lebih Jauh</h1>
            <p class="mb-4"><?=$about->tentang_kami?>
            </p>
            <div class="row g-4 align-items-center">
              <div class="col-sm-6">
                <div class="d-flex align-items-center">
                  <img class="rounded-circle flex-shrink-0" src="<?=base_url()?>uploads/<?= $owner->foto?>" alt="" style="width: 45px; height: 45px;">
                  <div class="ms-3">
                    <h6 class="text-primary mb-1"><?= $owner->nama?></h6>
                    <small>CEO & Founder</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
            <div class="row">
              <div class="col-12 text-center">
                <img class="img-fluid w-75 rounded-circle bg-light p-3" src="<?=base_url()?>uploads/<?=$toko->logo_toko;?>" alt="">
              </div>
              <div class="col-6 text-start" style="margin-top: -150px;">
                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="<?=base_url()?>uploads/<?= $jumbotron->gambar_1?>" alt="">
              </div>
              <div class="col-6 text-end" style="margin-top: -150px;">
                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="<?=base_url()?>uploads/<?= $jumbotron->gambar_2?>" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Classes Start (id="classes") -->
    <div id="classes" class="container-xxl py-5" style="scroll-margin-top: 70px;">
      <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
          <h1 class="mb-3">Harga Yang Kami Tawarkan</h1>
          <p>Kami menawarkan kurs yang kompetitif dan transparan untuk setiap transaksi penukaran valuta asing. Dengan pembaruan harga secara real-time, kami memastikan Anda mendapatkan nilai terbaik untuk setiap pertukaran. Tanpa biaya tersembunyi dan proses yang cepat, PT Valutamas Jaya Mandiri adalah pilihan tepat untuk kebutuhan valuta asing Anda. Hubungi kami sekarang untuk informasi lebih lanjut!</p>
        </div>
        <div class="row justify-content-center wow fadeInUp" data-wow-delay=".1s">
  <div class="col-md-10">
    <!-- 1. Info message -->
    <div class="alert alert-info text-center">
      Harga kurs di bawah akan berubah-ubah secara real time.
    </div>

    <!-- 2. Tampilkan tanggal hari ini -->
    <div id="current-date" class="text-center mb-3 font-weight-bold"></div>

    <div class="table-responsive">
    <table id='a' class="table table-striped table-bordered mb-0">
                <thead class="text-success text-center align-middle" style="background-color: #98FB98 ;" >
                  <tr class="text-center align-middle">
                    <th rowspan="2">Valas</th>
                    <th rowspan="2">Pecahan / Kondisi</th>
                    <th rowspan="2">Fisik</th>
                    <th rowspan="2">Th. (min)</th>
                    <th colspan="2">Konsumen</th>
                    <th colspan="2">Mitra</th>
                  </tr>
                  <tr class="text-center align-middle">
                    <th>VJM Beli</th>
                    <th>VJM Jual</th>
                    <th class="mitra-col">VJM Beli</th>
                    <th class="mitra-col">VJM Jual</th>
                  </tr>
                </thead>
                  <tbody>
                    <?php if(!empty($kurs)): ?>   
                      <?php foreach ($kurs as $w): ?>
                        <tr>
                        <td>
                          <img
                            src="<?= base_url('uploads/') . $w->flag ?>"
                            alt="<?= $w->valas ?>"
                            class="rounded-circle"
                            style="width: 30px; height: 30px; object-fit: cover;"
                          >
                          
                          <?= $w->valas ?>
                        </td>

                          <td><?= $w->pecahan ?></td>
                          <td><?= $w->fisik ?></td>
                          <td><?= $w->th ?></td>
                          <!-- Konsumen -->
                          <td><?= $w->beli ?></td>
                          <td><?= $w->jual ?></td>
                          <!-- Mitra -->
                          <td class="mitra-col"><?= $w->beli_m ?></td>
                          <td class="mitra-col"><?= $w->jual_m ?></td>
                          
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
    </div>
  </div>
</div>


      </div>
    </div>
    <!-- Classes End -->

    <!-- Call To Action Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="bg-light rounded">
          <div class="row g-0">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
              <div class="position-relative h-100">
                <img class="position-absolute w-100 h-100 rounded" src="<?=base_url()?>uploads/<?= $jumbotron->gambar_1?>" style="object-fit: cover;">
              </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
              <div class="h-100 d-flex flex-column justify-content-center p-5">
                <h1 class="mb-4">Tunggu Apalagi?</h1>
                <p class="mb-4">Jangan ragu untuk menghubungi kami dan dapatkan layanan terbaik dalam penukaran valuta asing. Tim kami siap membantu Anda dengan kurs kompetitif dan proses cepat. Hubungi kami hari ini dan mulailah transaksi yang lebih mudah dan aman!</p>
                <a class="btn btn-primary py-3 px-5" href="">Mulai Sekarang<i class="fa fa-arrow-right ms-2"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Call To Action End -->

    <!-- Footer Start (id="footer") -->
    <div id="footer" class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="row g-5 justify-content-around">
          <div class="col-lg-3 col-md-6">
            <h3 class="text-white mb-4">Hubungi Kami</h3>
            <p class="mb-2"><a href="<?= $toko->lokasi_maps?>"><i class="fa fa-map-marker-alt me-3"></i><?=$toko->lokasi_toko?></a></p>
            <p class="mb-2"><i class="fa fa-envelope me-3"></i><?= $media->gmail ?></p>
            <div class="d-flex pt-2">
              <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/<?= $media->instagram ?>"><i class="fab fa-instagram"></i></a>
              <a class="btn btn-outline-light btn-social" href="https://www.tiktok.com/@<?= $media->tiktok ?>"><i class="fa-brands fa-tiktok"></i></a>
              <div class="dropdown">
                <button class="btn btn-outline-light btn-social dropdown-toggle" type="button" id="whatsappDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-brands fa-whatsapp"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="whatsappDropdown">
                <?php
                  foreach ($wa as $w) : ?>
                  <li>
                    <a class="dropdown-item" href="https://api.whatsapp.com/send?phone=<?= $w->nomor_wa ?>" target="_blank">
                    Admin: <?= $w->nama_admin ?>
                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="col-12">
              <img class="img-fluid rounded bg-light p-1" src="<?=base_url()?>uploads/<?=$toko->izin_toko?>" alt="">
            </div>
          </div>


    <!-- Back to Top -->
    <a href="#home" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
  </div>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>assets_main/lib/wow/wow.min.js"></script>
  <script src="<?=base_url()?>assets_main/lib/easing/easing.min.js"></script>
  <script src="<?=base_url()?>assets_main/lib/waypoints/waypoints.min.js"></script>
  <script src="<?=base_url()?>assets_main/lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="<?=base_url()?>assets_main/js/main.js"></script>

  <!-- Tambahkan ini tepat sebelum tag </body> -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Ambil elemen untuk menampilkan tanggal
    var el = document.getElementById('current-date');
    if (!el) return;

    // Buat objek Date untuk hari ini
    var today = new Date();

    // Opsi format tanggal: Senin, 1 Januari 2025
    var options = {
      weekday: 'long',
      day: 'numeric',
      month: 'long',
      year: 'numeric'
    };

    // Render dalam locale Bahasa Indonesia
    el.textContent = today.toLocaleDateString('id-ID', options);
  });
</script>
<style>
/* Sticky kolom Valas di header */
#a thead th:first-child {
  position: sticky;
  left: 0;
  background-color: #98FB98  ; /* Warna latar header Valas (optional) */
  z-index: 5;
}

/* Sticky kolom Valas di baris isi */
#a tbody td:first-child {
  position: sticky;
  left: 0;
  background-color: #fff; /* Warna latar sel Valas agar tidak tembus */
  z-index: 2;
}


</style>

</body>

</html>
