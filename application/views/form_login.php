<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <!-- Include CSS (FontAwesome, AdminLTE, dan custom style) -->
    <link rel="stylesheet" href="<?= base_url('vendor/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
</head>
<body class="hold-transition login-page gradient-background">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b><?= $toko->nama_toko?></b> Admin</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan Login Terlebih Dahulu Untuk Mode Admin</p>
      
      <!-- Tampilkan flashdata pesan error -->
      <?= $this->session->flashdata('pesan'); ?>
      
      <form method="post" action="<?= site_url('auth/login') ?>" class="user">
          <div class="input-group mb-3">
              <input type="text" name="username" class="form-control" placeholder="Masukkan Username Anda">
              <div class="input-group-append">
                  <div class="input-group-text">
                      <span class="fas fa-user"></span>
                  </div>
              </div>
          </div>
          <?= form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>
          <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda">
              <div class="input-group-append">
                  <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                  </div>
              </div>
          </div>
          <?= form_error('password', '<div class="text-danger small ml-2">', '</div>'); ?>
          <button type="submit" class="btn btn-primary form-control">Login</button>
          <div class="mt-3">
            <a href="<?= base_url() ?>" class="btn btn-secondary form-control">
              <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
          </div>
          
      </form>
      <hr>
    </div>
  </div>
</div>
<!-- Include JavaScript (jQuery, Bootstrap, AdminLTE) -->
<script src="<?= base_url('vendor/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('vendor/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
