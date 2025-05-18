<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Card untuk form edit -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Data Owner</h3>
          </div>
          <!-- Form dimulai dengan dukungan multipart -->
          <?php echo form_open_multipart('controller_owner/edit/'.$tb_owner->id_owner); ?>
          <div class="card-body">
            <?php echo validation_errors(); ?>
            <?php if(isset($alert)) echo '<div class="alert alert-info">'.$alert.'</div>'; ?>
            <div class="form-group">
              <label for="nama">Nama Owner</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Owner" value="<?php echo set_value('nama', $tb_owner->nama); ?>">
            </div>
            <div class="form-group">
              <label for="foto">Foto Owner</label>
              <!-- Input file untuk upload foto -->
              <input type="file" class="form-control" id="foto" name="foto">
              <!-- Tampilkan preview foto lama jika ada -->
              <?php if(!empty($tb_owner->foto)): ?>
                <img src="<?php echo base_url('uploads/'.$tb_owner->foto); ?>" alt="Foto Owner" style="width:100px; margin-top:10px;">
              <?php endif; ?>
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
