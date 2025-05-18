<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Card untuk form edit -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Data Jumbotron</h3>
          </div>
          <!-- Form dimulai dengan dukungan multipart -->
          <?php echo form_open_multipart('controller_jumbotron/edit/'.$tb_jumbotron->id_jumbotron); ?>
          <div class="card-body">
            <?php echo validation_errors(); ?>
            <?php if($this->session->flashdata('alert')): ?>
              <div class="alert alert-success"><?php echo $this->session->flashdata('alert'); ?></div>
            <?php endif; ?>
            <!-- Field Nama Jumbotron -->
            <div class="form-group">
              <label for="judul_1">Judul 1 </label>
              <input type="text" class="form-control" id="judul_1" name="judul_1" placeholder="Masukkan Judul Jumbotron" value="<?php echo set_value('judul_1', $tb_jumbotron->judul_1); ?>">
            </div>
            <div class="form-group">
              <label for="judul_2">Judul 2 </label>
              <input type="text" class="form-control" id="judul_2" name="judul_2" placeholder="Masukkan Judul Jumbotron" value="<?php echo set_value('judul_1', $tb_jumbotron->judul_1); ?>">
            </div>
            <div class="form-group">
              <label for="paragraft_1">Paragraft 1</label>
              <textarea class="form-control" id="paragraft_1" name="paragraft_1" placeholder="Masukkan Paragraft Jumbotron"><?php echo set_value('paragraft_1', $tb_jumbotron->paragraft_1); ?></textarea>
            </div>
            <div class="form-group">
              <label for="paragraft_2">Paragraft 2</label>
              <textarea class="form-control" id="paragraft_2" name="paragraft_2" placeholder="Masukkan Paragraft Jumbotron"><?php echo set_value('paragraft_2', $tb_jumbotron->paragraft_2); ?></textarea>
            </div>

           
            <!-- Field Upload Logo Jumbotron -->
            <div class="form-group">
              <label for="gambar_1">Gambar 1 Jumbotron</label>
              <input type="file" class="form-control" id="gambar_1" name="gambar_1">
              <?php if(!empty($tb_jumbotron->gambar_1)): ?>
                <img src="<?php echo base_url('uploads/'.$tb_jumbotron->gambar_1); ?>" alt="Logo Jumbotron" style="width:100px; margin-top:10px;">
              <?php endif; ?>
            </div>
            <!-- Field Upload Izin Jumbotron -->
            <div class="form-group">
              <label for="gambar_2">Gambar 2 Jumbotron</label>
              <input type="file" class="form-control" id="gambar_2" name="gambar_2">
              <?php if(!empty($tb_jumbotron->gambar_2)): ?>
                <img src="<?php echo base_url('uploads/'.$tb_jumbotron->gambar_2); ?>" alt="Izin Jumbotron" style="width:100px; margin-top:10px;">
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
