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
		<title><?php echo $title ?></title>
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
				<div class="row">
					<div class="col-lg-12">
						<div class="card mb-10">
							<div class="card-header">
								<i class="fa fa-info"></i> Info Penjualan
							</div>
							<div class="card-body">
								<table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:50px;">Kode Order</th>
						<th style="text-align:center;width:50px;">Kode TIket</th>
                        <th>Nama Pembeli</th>
                        <th>Tanggal Keberangkatan</th>
                        <th>Harga Tiket</th>
						<!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($tiket as $value) { ?>
                    <tr>
                        <td style="text-align:center;vertical-align:middle"><?php echo strtoupper($value['kd_order']) ?></td>
                        <td style="text-align:center;vertical-align:middle"><?php echo $value['kd_tiket'] ?></td>
						<td style="vertical-align:middle;"><?php echo $value['nama_tiket'] ?></td>
                        <td style="vertical-align:middle;"><?php echo $value['tgl_berangkat_order'] ?></td>
                        <td style="vertical-align:middle;"><?php echo $value['harga_tiket'] ?></td>
                        <!-- <td><a href="<php echo base_url('tiket/sendpayment/'.$value['kd_order']) ?>" class="btn btn-primary">Send Payment</a></td> -->
                    </tr>
                 <?php } ?>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
						<th></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
						<th></th>
                        <th>Total</th>
						<?php
						//var_dump($jumlah);
							foreach($jumlah as $item){ ?>
							<td style="vertical-align:middle;"><?php echo $item['total'] ?></td>
							<?php }
						?>
                        
                    </tr>
                </tbody>
            </table>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->
			<!-- start footer Area -->
			<?php $this->load->view('frontend/include/base_footer'); ?>
			<!-- js -->

			<?php $this->load->view('frontend/include/base_js'); ?>
			<script type="text/javascript">
			 $(function(){
			 	var date = new Date();
				date.setDate(date.getDate());

			  $(".datepicker").datepicker({
			  		startDate: date,
			      format: 'yyyy-mm-dd',
			      autoclose: true,
			      todayHighlight: true,
			  });
			 });
			</script>
			<script type="text/javascript">
				$(document).ready(function() {
				$('.js-example-basic-single').select2();
				});
			</script>
		</body>
	</html>
	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cara Pemesanan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<ol class="ordered-list" align="left"><span class="center_content2"><li>Cari tiket kemudian klik pada tombol <b>Pesan</b>&nbsp;pada tiket yang ingin Anda pesan.</li>
					<li style="font-weight: normal;">Tiket yang Anda pesan akan masuk ke dalam <span style="font-weight: bold">Tiket Keranjang</span>.</li>
					<li style="font-weight: normal;">Jika sudah selesai, klik tombol <span style="font-weight: bold">Selesai Pesan</span>, maka akan tampil form untuk pengisian data kustomer/pembeli.</li>
					<li style="font-weight: normal;">Setelah data pembeli selesai diisikan, klik tombol <span style="font-weight: bold">Proses</span>,
					maka akan tampil data pembeli beserta tiketyang dipesannya (jika
					diperlukan catat nomor ordernya). Dan juga ada total pembayaran serta
				nomor rekening pembayaran.</li>
				<li style="font-weight: normal;">Apabila telah melakukan pembayaran, bawalah bukti pembayaran pada saat keberangkatan dan dilakukan penukaran satu jam sebelum keberangkatan. </li></span></ol><w:worddocument></w:worddocument>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
</div>