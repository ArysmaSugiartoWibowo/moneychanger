<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Card untuk form create -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Data Kurs</h3>
          </div>
          <!-- Form dimulai dengan dukungan multipart -->
          <?php echo form_open_multipart('controller_kurs/create'); ?>
          <div class="card-body">
            <?php echo validation_errors(); ?>
            <?php if(isset($alert)) echo '<div class="alert alert-info">'.$alert.'</div>'; ?>
            <!-- Field Valas -->
            <div class="form-group">
              <label for="valas">Valas</label>
              <input type="text" class="form-control" id="valas" name="valas" placeholder="Masukkan Valas" value="<?php echo set_value('valas'); ?>">
            </div>
            <!-- Field Pecahan -->
            <div class="form-group">
              <label for="pecahan">Pecahan / Kondisi</label>
              <input type="text" class="form-control" id="pecahan" name="pecahan" placeholder="Masukkan Pecahan/ Kondisi" value="<?php echo set_value('pecahan'); ?>">
            </div>
            <!-- Field Fisik -->
            <div class="form-group">
              <label for="fisik">Fisik</label>
              <input type="text" class="form-control" id="fisik" name="fisik" placeholder="Masukkan fisik " value="<?php echo set_value('fisik'); ?>">
            </div>
            <!-- Field TH -->
            <div class="form-group">
              <label for="th">Tahun (Min)</label>
              <input type="text" class="form-control" id="th" name="th" placeholder="Masukkan tahun Minimal" value="<?php echo set_value('th'); ?>">
            </div>
            <!-- Field Beli -->
            <div class="form-group">
              <label for="beli">Beli</label>
              <input type="text" class="form-control" id="beli" name="beli" placeholder="Masukkan beli " value="<?php echo set_value('beli'); ?>">
            </div>
            <!-- Field Jual -->
            <div class="form-group">
              <label for="jual">Jual</label>
              <input type="text" class="form-control" id="jual" name="jual" placeholder="Masukkan jual " value="<?php echo set_value('jual'); ?>">
            </div>
            <!-- Field Beli -->
            <div class="form-group">
              <label for="beli_m">Beli (Mitra)</label>
              <input type="text" class="form-control" id="beli_m" name="beli_m" placeholder="Masukkan Beli Mitra " value="<?php echo set_value('beli_m'); ?>">
            </div>
            <!-- Field Jual -->
            <div class="form-group">
              <label for="jual_m">Jual (Mitra)</label>
              <input type="text" class="form-control" id="jual_m" name="jual_m" placeholder="Masukkan Jual Mitra" value="<?php echo set_value('jual_m'); ?>">
            </div>
            <!-- Field Flag -->
            <div class="form-group">
              <label for="flag">Flag</label>
              <input type="file" class="form-control" id="flag" name="flag">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo site_url('controller_kurs'); ?>" class="btn btn-secondary">Kembali</a>
          </div>
          <?php echo form_close(); ?>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
