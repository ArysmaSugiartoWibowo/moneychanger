<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Card untuk form edit -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Data Kurs</h3>
          </div>
          <!-- Form dimulai dengan dukungan multipart -->
          <?php echo form_open_multipart('controller_kurs/edit/'.$tb_kurs->id_kurs);?>
          <div class="card-body">
            <?php echo validation_errors(); ?>
            <?php if(isset($alert)) echo '<div class="alert alert-info">'.$alert.'</div>'; ?>
            <div class="form-group">
              <label for="valas">Valas</label>
              <input type="text" class="form-control" id="valas" name="valas" placeholder="Masukkan valas " value="<?php echo set_value('valas', $tb_kurs->valas); ?>">
            </div>
            <div class="form-group">
              <label for="pecahan">Pecahan / Kondisi</label>
              <input type="text" class="form-control" id="pecahan" name="pecahan" placeholder="Masukkan pecahan / kondisi" value="<?php echo set_value('pecahan', $tb_kurs->pecahan); ?>">
            </div>
            <div class="form-group">
              <label for="fisik">Fisik</label>
              <input type="text" class="form-control" id="fisik" name="fisik" placeholder="Masukkan fisik " value="<?php echo set_value('fisik', $tb_kurs->fisik); ?>">
            </div>
            <div class="form-group">
              <label for="th">Tahun (Min.)</label>
              <input type="text" class="form-control" id="th" name="th" placeholder="Masukkan tahun minimal" value="<?php echo set_value('th', $tb_kurs->th); ?>">
            </div>
            <div class="form-group">
              <label for="beli">Beli</label>
              <input type="text" class="form-control" id="beli" name="beli" placeholder="Masukkan beli " value="<?php echo set_value('beli', $tb_kurs->beli); ?>">
            </div>
            <div class="form-group">
              <label for="jual">Jual</label>
              <input type="text" class="form-control" id="jual" name="jual" placeholder="Masukkan jual " value="<?php echo set_value('jual', $tb_kurs->jual); ?>">
            </div>
            <div class="form-group">
              <label for="beli_m">Beli (Mitra)</label>
              <input type="text" class="form-control" id="beli_m" name="beli_m" placeholder="Masukkan beli_m " value="<?php echo set_value('beli_m', $tb_kurs->beli_m); ?>">
            </div>
            <div class="form-group">
              <label for="jual_m">Jual (Mitra)</label>
              <input type="text" class="form-control" id="jual_m" name="jual_m" placeholder="Masukkan jual_m " value="<?php echo set_value('jual_m', $tb_kurs->jual_m); ?>">
              
          
            <div class="form-group">
              <label for="flag">FLag</label>
              <!-- Input file untuk upload flag -->
              <input type="file" class="form-control" id="flag" name="flag">
              <!-- Tampilkan preview flag lama jika ada -->
              <?php if(!empty($tb_kurs->flag)): ?>
                <img src="<?php echo base_url('uploads/'.$tb_kurs->flag); ?>" alt="Flag" style="width:100px; margin-top:10px;">
              <?php endif; ?>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo site_url('controller_kurs'); ?>" class="btn btn-secondary">Kembali</a>
          </div>
          <?php echo form_close(); ?>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>