<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Card untuk form tambah data -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Data WA</h3>
          </div>
          <!-- /.card-header -->
          <?php echo form_open('controller_wa/create'); ?>
          <div class="card-body">
            <?php echo validation_errors(); ?>
            <div class="form-group">
              <label for="nama_admin">Nama Admin</label>
              <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Masukkan Nama Admin" value="<?php echo set_value('nama_admin'); ?>">
            </div>
            <div class="form-group">
              <label for="nomor_wa">Nomor WA</label>
              <input type="text" class="form-control" id="nomor_wa" name="nomor_wa" placeholder="Masukkan Nomor WA" value="<?php echo set_value('nomor_wa'); ?>">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo site_url('controller_wa'); ?>" class="btn btn-secondary">Kembali</a>
          </div>
          <?php echo form_close(); ?>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
