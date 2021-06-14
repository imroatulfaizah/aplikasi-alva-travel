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
      <h1 class="h3 mb-2 text-gray-800">Data Driver</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#ModalTujuan">
          Tambah Driver
          </button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode driver</th>
                  <th>Nama driver</th>
                  <th>Alamat driver</th>
                  <th>No Hp Driver</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ; foreach ($driver as $row ) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo strtoupper($row['kd_driver']); ?></td>
                  <td><?php echo strtoupper($row['nama_driver']); ?></td>
                  <td><?php echo strtoupper($row['alamat_driver']); ?></td>
                  <td><?php echo $row['hp_driver'] ?></td>
                  <?php if ($row['status_driver'] == '1') { ?>
                    <td class="btn-success"> Online</td> 
                    <?php } else { ?>
                    <td class="btn-danger">Offline</td>
                  <?php } ?>
                  <td align="center"><a href="<?php echo base_url('backend/driver/viewdriver/'.$row['kd_driver'])?>" class="btn btn btn-primary">View</a></a>
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
<!-- Modal -->
<div class="modal fade" id="ModalTujuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Tambah driver</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form action="<?php echo base_url()?>backend/driver/tambahdriver" method="post">
      <div class="form-group">
        <label for="nama_driver" class="">Nama driver</label>
        <input type="text" class="form-control" name="nama_driver" placeholder="Nama driver">
      </div>
      <div class="form-group">
        <label for="alamat_driver" class="">Alamat driver</label>
        <input type="text" class="form-control" name="alamat_driver" placeholder="Alamat driver">
      </div>
      <div class="form-group">
        <label for="hp_driver" class="">No HP Driver</label>
        <input type="text" class="form-control" id="hp_driver" name="hp_driver" placeholder="No. Hp">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<!-- js -->
<?php $this->load->view('backend/include/base_js'); ?>
</body>
</html>