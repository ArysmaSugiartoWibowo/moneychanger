<section class="content">
  <div class="container-fluid">

    <!-- PRINT HEADER -->
    <div class="print-header text-center">
    <img src="<?= base_url('uploads/' . $toko->logo_toko) ?>" 
     alt="Logo" 
     style="height:60px; margin-bottom:5px;">

      <h2 style="margin:0; font-size:18pt;">PT. VALUTAMAS JAYA MANDIRI</h2>
      <div style="font-size:12pt; font-weight:bold; margin-bottom:5px;">AUTHORIZED MONEY CHANGER</div>
      <div style="font-size:10pt; margin-bottom:2px;">Izin BI : 26/2/KEP.GBI/PDG/2024</div>
      <div style="font-size:10pt; margin-bottom:2px; color:green;">Menerima Penukaran Mata Uang Asing</div>
      <div style="font-size:9pt;">
       <?= $toko->lokasi_toko?><br>
        Wa: <?php if(!empty($wa)): ?>   
          <?php foreach ($wa as $w): ?>
            -<?= $w->nama_admin ?> : <?= $w->nomor_wa?> <br>
            <?php endforeach; ?>
                  <?php endif; ?>
      </div>
      <hr style="border:1px solid #000; margin:8px 0;">
    </div>
    <!-- END PRINT HEADER -->

    <div class="row">
      <div class="col-12">
        <!-- Kalender / Jam Digital -->
        <div id="clock" class="no-print text-right mb-2 font-weight-bold"></div>

        <div class="card card-primary">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Data Kurs Terkini</h3>
            <div>
              <!-- Tombol Tambah -->
              <a href="<?= base_url("controller_kurs/create") ?>" class="btn btn-primary btn-sm mb-1 no-print">Tambah</a>
              <!-- Tombol Print -->
              <button onclick="window.print()" class="btn btn-secondary btn-sm mb-1 no-print">Print</button>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table id='a' class="table table-striped table-bordered mb-0">
                <thead class="text-primary text-center align-middle"  style="background-color: white;">
                  <tr class="text-center align-middle">
                    <th rowspan="2">Valas</th>
                    <th rowspan="2">Pecahan / Kondisi</th>
                    <th rowspan="2">Fisik</th>
                    <th rowspan="2">Th. (min)</th>
                    <th colspan="2">Konsumen</th>
                    <th colspan="2">Mitra</th>
                    <th rowspan="2" class="aksi-col no-print">Aksi</th>
                  </tr>
                  <tr class="text-center align-middle">
                    <th>VJM Beli</th>
                    <th>VJM Jual</th>
                    <th class="mitra-col">VJM Beli</th>
                    <th class="mitra-col">VJM Jual</th>
                  </tr>
                </thead>
                  <tbody>
                    <?php if(!empty($kurs)): ?>   
                      <?php foreach ($kurs as $w): ?>
                        <tr>
                        <td>
                          <img
                            src="<?= base_url('uploads/') . $w->flag ?>"
                            alt="<?= $w->valas ?>"
                            class="rounded-circle"
                            style="width: 30px; height: 30px; object-fit: cover;"
                          >
                          
                          <?= $w->valas ?>
                        </td>
                          <td><?= $w->pecahan ?></td>
                          <td><?= $w->fisik ?></td>
                          <td><?= $w->th ?></td>
                          <!-- Konsumen -->
                          <td><?= $w->beli ?></td>
                          <td><?= $w->jual ?></td>
                          <!-- Mitra -->
                          <td class="mitra-col"><?= $w->beli_m ?></td>
                          <td class="mitra-col"><?= $w->jual_m ?></td>
                          <!-- Aksi -->
                          <td class="aksi-col no-print">
                            <a href="<?= base_url("controller_kurs/edit/$w->id_kurs") ?>"
                              class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url("controller_kurs/delete/$w->id_kurs") ?>"
                              class="btn btn-danger btn-sm"
                              onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>

            </div>
          </div>
        </div>

        <!-- PRINT FOOTER -->
        <div class="print-footer text-center">
          <div style="font-size:8pt; margin-bottom:4px;">
            Mohon maaf…, kondisi UKA yang tidak layak/rusak berat tidak dapat kami terima.<br>
            Harga sewaktu‑waktu bisa berubah mengikuti pergerakan kurs mata uang dunia
          </div>
          <div style="font-size:8pt;">
            Update : <?= date('d F Y') ?> &nbsp;&nbsp; <?= date('H:i:s') ?>
          </div>
        </div>
        <!-- END PRINT FOOTER -->

      </div>
    </div>
  </div>
</section>

<style>
  /* sembunyikan header/footer khusus print di tampilan layar */
  .print-header, .print-footer {
    display: none;
  }
  /* styling umum print */
  @media print {
    body {
      margin: 0;
    }
    /* tampilkan header/footer hanya di print */
    .print-header, .print-footer {
      display: block;
    }
    /* sembunyikan elemen non-print */
    .no-print, .aksi-col, #clock, .main-footer {
      display: none !important;
    }
    /* atur ukuran dan border tabel */
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 9pt;
    }
    table, th, td {
      border: 1px solid #000;
    }
    th, td {
      padding: 4px;
      text-align: center;
      vertical-align: middle;
    }
    /* judul kolom jadi bold */
    thead th {
      font-weight: bold;
    }
    /* hilangkan padding/margin card */
    .card, .card-body, .container-fluid {
      box-shadow: none !important;
      border: none !important;
      padding: 0 !important;
      margin: 0 !important;
    }
    /* paksa orientasi potrait dan atur ukuran kertas */
    @page {
      size: A4 portrait;
      margin: 10mm 10mm 10mm 10mm;
    }
  }
</style>

<style>
  /* Header */
  #a thead th .a {
    text-align: center !important;
    vertical-align: middle !important;
  }
  /* Body */
  #a tbody td {
    text-align: center !important;
    vertical-align: middle !important;
  }

  /* Border di layar & print untuk semua baris/kolom tabel #a */
#a {
  border-collapse: collapse; /* satukan border sel */
}
#a th {
  border: 1px solid #000 !important; /* garis tegas hitam */
}

</style>


<script>
  function updateClock() {
    var now = new Date();
    var dateString = now.toLocaleDateString();
    var timeString = now.toLocaleTimeString();
    document.getElementById('clock').innerHTML = dateString + ' ' + timeString;
  }
  setInterval(updateClock, 1000);
  updateClock();
</script>

<style>
/* Sticky kolom Valas di header */
#a thead th:first-child {
  position: sticky;
  left: 0;
  background-color: white; /* Warna latar header Valas (optional) */
  z-index: 5;
}

/* Sticky kolom Valas di baris isi */
#a tbody td:first-child {
  position: sticky;
  left: 0;
  background-color: #fff; /* Warna latar sel Valas agar tidak tembus */
  z-index: 2;
}

</style>