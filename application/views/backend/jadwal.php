<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title ?></title>
    <!-- css -->
    <?php $this->load->view('backend/include/base_css'); ?>
  </head>
  <body id="page-top">
    <!-- navbar -->
    <?php $this->load->view('backend/include/base_nav'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">Jadwal & Harga</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="<?php echo base_url('backend/jadwal/tambahjadwal') ?>" class="btn btn-primary pull-right" >
          Tambah Jadwal
          </a>
        </div>
        <div class="card-body">
        <div class="col-sm-14">
          <form action="<?php echo base_url()?>backend/jadwal/" method="post">
            <div class="row form-group">
              <label for="nama" class="control-label">Pilih Filter Range Waktu</label>
              <select class="form-control" name="filter" required>
                <option value="" selected disabled="">-Pilih Filter-</option>
                <option value="minggu" >1 Minggu</option>
                <option value="bulan" >1 Bulan</option>
                <option value="tahun" >1 Tahun</option>
              </select>
              
              <!-- <input type="hidden" name="kode" value="<php echo $bus['kd_bus']?>"> -->
            </div>
            <div>
            <input  type="submit" class="btn btn-primary pull-rigth" value="Cari">
            </div>
            <br>
          </div>
          </form>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Jadwal</th>
                  <th>Kota Asal</th>
                  <th>Kota Tujuan</th>
                  <th>Tanggal Keberangkatan</th>
                  <th>Jam Berangkat</th>
                  <th>Jam Sampai</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ; foreach ($jadwal as $row ) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['kd_jadwal']; ?></td>
                  <td><?php echo strtoupper($row['kota_tujuan']); ?></td>
                  <td><?php echo strtoupper($row['wilayah_jadwal']); ?></td>
                  <td><?php echo strtoupper($row['tanggal']); ?></td>
                  <td><?php echo date('H:i',strtotime($row['jam_berangkat_jadwal'])); ?></td>
                  <td><?php echo date('H:i',strtotime($row['jam_tiba_jadwal'])); ?></td>
                  <td>Rp <?php echo number_format((float)($row['harga_jadwal']),0,",","."); ?>,-</td>
                  <td><a href="<?php echo base_url('backend/jadwal/viewjadwal/'.$row['kd_jadwal']) ?>" class="btn btn-primary">VIEW</a></td>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer -->
<?php $this->load->view('backend/include/base_footer'); ?>
<!-- End of Footer -->
<!-- js -->
<?php $this->load->view('backend/include/base_js'); ?>
</body>
</html>