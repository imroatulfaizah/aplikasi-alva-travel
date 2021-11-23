<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="assets/img/logobus.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Dapat Tiket</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--CSS-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/datepicker/dcalendar.picker.css">
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-4">
						<!-- Default Card Example -->
						<div class="card wobble animated">
					  <div class="card-header">
					    Konfirmasi Pembayaran
					  </div>
					  <div class="card-body">
					    <form action="<?php echo base_url() ?>tiket/insertkonfirmasi" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="exampleInputEmail1">Kode Order</label>
										<input type="text" id="" class="form-control" id="" name="kd_order" value="<?php echo $id ?>" placeholder="Kode Tiket">
									</div>
									<?php  
										// $this->load->library('session');
        								// echo "<pre>". print_r((array)$this->session, true) ."</pre>"; 
										$kode = $this->session->userdata('kd_agen');
										$cut = substr($kode, 0, 2);
										//echo $cut;
										// if($cut == "AG"){
										// 	echo "yes";
										// }else{
										// 	echo "no";
										// }
										//
										// 
										?>
									<div class="form-group">
										<label for="exampleInputEmail1">Pembayaran Kamu</label>
										<select class="form-control" name="bank_km" id="bank_km">
											<option value="" selected disabled="">Pilih Pembayaran</option>
											<?php
												if($cut == "AG"){ ?>
													<option value="Lunas Agen">Lunas Agen</option>
												<?php }else { ?>
													<option value="Transfer">Transfer</option>
												<?php }
											?>
											<option value="Bayar Driver">Bayar Driver</option>
										</select>
									</div>
									<!-- <div class="form-group" id="id_agen" style="display:none;" required>
										<label for="exampleInputEmail1">Agen</label>
										<select class="form-control" name="agen">
											<option value="" selected disabled="">Pilih Agen</option>
											<php foreach ($agen as $row) { ?>
											<option value="<php echo $row['kd_agen'] ?>"><php echo $row['nama_agen']; ?></option>
											<php } ?>
										</select>
									</div> -->
									<!-- <div class="form-group" id="id_bayar">
										<label for="exampleInputEmail1">METODE PEMBAYARAN</label>
										<input type="text" class="form-control" name="id_bayar" value="<php 
										foreach($order as $row){
											echo $row['kd_bank'];
										}
										?>" readonly>
									</div> -->
									<div class="form-group" id="id_agen" style="display:none;">
										<label for="exampleInputEmail1">AGEN</label>
										<input type="text" class="form-control" name="id_agen" value="<?php echo $this->session->userdata('kd_agen'); ?>" readonly>
									</div>
									<div class="form-group" id="id_norek" style="display:none;">
										<label for="exampleInputEmail1">Nomor Rekening</label>
										<input type="number" class="form-control" name="nomrek" value="" placeholder="Nomor Rekening">
									</div>
									<div class="form-group" id="id_pengirim" style="display:none;">
										<label for="exampleInputEmail1">Nama Pengirim</label>
										<input type="text" class="form-control" name="nama" value="" placeholder="Nama Pengirim">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Jumlah Pembayaran</label>
										<input type="number" class="form-control" name="total" value="<?php echo $total ?>" placeholder="Total Harga" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Upload Poto Transaksi</label>
										<input type="file" class="form-control" name="userfile" required="">
									</div>
									<button type="submit" class="btn btn-primary pull-right">Konfirmasi </button>
								</form>
					  </div>
					</div>
					</div>
			</section>
			<!-- End banner Area -->
			<!-- start footer Area -->
			<?php $this->load->view('frontend/include/base_footer'); ?>
			<!-- js -->
			<?php $this->load->view('frontend/include/base_js'); ?>
		</body>
	</html>

	<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
    <script type='text/javascript'>
	$("#bank_km").change(function () {
                if ($("#bank_km").val() === "Lunas Agen") {
                    $("#id_norek").hide();
					$("#id_pengirim").hide();
					$("#id_agen").show();
                    //$("#expired").attr('required', false);

                } else if ($("#bank_km").val() === "Bayar Driver") {
					$("#id_norek").hide();
					$("#id_pengirim").hide();
					$("#id_agen").hide();
					$('#id_agen').removeAttr('required');
					$('#agen').removeAttr('required');
                } else {
					console.log("3");
                    $("#id_norek").show();
					$("#id_pengirim").show();
					$("#id_agen").hide();
					$('#id_agen').removeAttr('required');
					$('#agen').removeAttr('required');
                }
            });
	</script>
