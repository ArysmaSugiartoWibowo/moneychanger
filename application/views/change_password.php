<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Card untuk form edit -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Ubah Password Admin</h3>
          </div>
          <!-- /.card-header -->
          <!-- Form dimulai -->
        <?= $this->session->flashdata('pesan'); ?>
        <?php echo form_open('auth/change_action'); ?>
            <div class="card">
                <div class="card-body">
                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                    <label for="current_password">Password Lama</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Masukkan Password Lama" value="<?php echo set_value('current_password'); ?>">
                    <span class="text-danger"><?= form_error('current_password') ?></span>
                    </div>
                    <div class="form-group">
                    <label for="new_password">Password Baru</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Masukkan Password Baru" value="<?php echo set_value('new_password'); ?>">
                    <span class="text-danger"><?= form_error('new_password') ?></span>
                    </div>
                    <div class="form-group">
                    <label for="confirm_password">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password Baru" value="<?php echo set_value('confirm_password'); ?>">
                    <span class="text-danger"><?= form_error('confirm_password') ?></span>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>  
                </div>
            </div>
        <?php echo form_close(); ?>

        </diV>
        <!-- /.card -->
    </div>
 </div>
</section>
