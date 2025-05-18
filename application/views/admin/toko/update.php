<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Card untuk form edit -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Data Toko</h3>
          </div>
          <!-- Form dimulai dengan dukungan multipart -->
          <?php echo form_open_multipart('controller_toko/edit/'.$tb_toko->id_toko); ?>
          <div class="card-body">
            <?php echo validation_errors(); ?>
            <?php if($this->session->flashdata('alert')): ?>
              <div class="alert alert-success"><?php echo $this->session->flashdata('alert'); ?></div>
            <?php endif; ?>
            <!-- Field Nama Toko -->
            <div class="form-group">
              <label for="nama_toko">Nama Toko</label>
              <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Masukkan Nama Toko" value="<?php echo set_value('nama_toko', $tb_toko->nama_toko); ?>">
            </div>
            <!-- Field Lokasi Toko -->
            <div class="form-group">
              <label for="lokasi_toko">Lokasi Toko</label>
              <input type="text" class="form-control" id="lokasi_toko" name="lokasi_toko" placeholder="Masukkan Lokasi Toko" value="<?php echo set_value('lokasi_toko', $tb_toko->lokasi_toko); ?>">
            </div>
            <!-- Field Lokasi Maps -->
            <div class="form-group">
              <label for="lokasi_maps">Lokasi Maps</label>
              <input type="text" class="form-control" id="lokasi_maps" name="lokasi_maps" placeholder="Masukkan Link Lokasi Maps" value="<?php echo set_value('lokasi_maps', $tb_toko->lokasi_maps); ?>">
            </div>
            <!-- Field Upload Logo Toko -->
            <div class="form-group">
              <label for="logo_toko">Logo Toko</label>
              <input type="file" class="form-control" id="logo_toko" name="logo_toko">
              <?php if(!empty($tb_toko->logo_toko)): ?>
                <img src="<?php echo base_url('uploads/'.$tb_toko->logo_toko); ?>" alt="Logo Toko" style="width:100px; margin-top:10px;">
              <?php endif; ?>
            </div>
            <!-- Field Upload Izin Toko -->
            <div class="form-group">
              <label for="izin_toko">Izin Toko</label>
              <input type="file" class="form-control" id="izin_toko" name="izin_toko">
              <?php if(!empty($tb_toko->izin_toko)): ?>
                <img src="<?php echo base_url('uploads/'.$tb_toko->izin_toko); ?>" alt="Izin Toko" style="width:100px; margin-top:10px;">
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
