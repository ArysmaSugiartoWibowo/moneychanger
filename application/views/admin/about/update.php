<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Card untuk form edit -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Data Tentang Kami</h3>
          </div>
          <!-- /.card-header -->
          <!-- Form dimulai -->
          <?php echo form_open('controller_about/edit/'.$tb_about->id_about); ?>
          <div class="card-body">
            <?php echo validation_errors(); ?>
            <div class="form-group">
              <label for="tentang_kami">Tentang Kami</label>
              <textarea class="form-control" id="tentang_kami" name="tentang_kami" placeholder="Masukkan Tentang Kami" rows="10"><?php echo set_value('tentang_kami', $tb_about->tentang_kami); ?></textarea>

            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
          <?php echo form_close(); ?>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
