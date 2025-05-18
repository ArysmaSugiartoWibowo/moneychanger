<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Data Nomor Whats App</h3>
            <!-- Tombol Tambah -->
            
          </div>
          <div class="card-body">
          <a href="<?=base_url("controller_wa/create")?>" class="btn btn-primary btn-sm mb-1">Tambah</a>
            <div class="table-responsive">
              <table id="a" class="table table-striped">
                <thead>
                  <tr>
                    <th>Nama Admin</th>
                    <th>Nomor Whats App</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($wa)): ?>   
                    <?php foreach ($wa as $w): ?>
                      <tr>
                        <td><?= $w->nama_admin ?></td>
                        <td><?= $w->nomor_wa ?></td>
                        <td>
                          <a href="<?=base_url("controller_wa/edit/$w->id_wa")?>" class="btn btn-warning btn-sm">Edit</a>
                          <a href="<?=base_url("controller_wa/delete/$w->id_wa")?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
