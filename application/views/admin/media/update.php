<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Card untuk form edit -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Data Media</h3>
          </div>
          <!-- /.card-header -->
          <!-- Form dimulai -->
          <?php echo form_open('controller_media/edit/'.$tb_media->id_media); ?>
          <div class="card-body">
            <?php echo validation_errors(); ?>
            <div class="form-group">
              <label for="instagram">Instagram</label>
              <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Masukkan Nama Admin" value="<?php echo set_value('instagram', $tb_media->instagram); ?>">
            </div>
            <div class="form-group">
              <label for="tiktok">Tiktok</label>
              <input type="text" class="form-control" id="tiktok" name="tiktok" placeholder="Masukkan Nomor WA" value="<?php echo set_value('tiktok', $tb_media->tiktok); ?>">
            </div>
            <div class="form-group">
              <label for="gmail">Gmail</label>
              <input type="email" class="form-control" id="gmail" name="gmail" placeholder="Masukkan Nomor WA" value="<?php echo set_value('gmail', $tb_media->gmail); ?>">
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
