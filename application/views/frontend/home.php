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
		<title>Alva Travel</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<style type="text/css">
		.combined {
		-webkit-text-stroke: 1px black;
		color: white;}
		
		</style>
		<!-- <style>
			* {box-sizing: border-box}
			body {font-family: Verdana, sans-serif; margin:0}
			.mySlides {display: none}
			img {vertical-align: middle;}

			/* Slideshow container */
			.slideshow-container {
			max-width: 1000px;
			position: relative;
			margin: auto;
			}

			/* Next & previous buttons */
			.prev, .next {
			cursor: pointer;
			position: absolute;
			top: 50%;
			width: auto;
			padding: 16px;
			margin-top: -22px;
			color: white;
			font-weight: bold;
			font-size: 18px;
			transition: 0.6s ease;
			border-radius: 0 3px 3px 0;
			user-select: none;
			}

			/* Position the "next button" to the right */
			.next {
			right: 0;
			border-radius: 3px 0 0 3px;
			}

			/* On hover, add a black background color with a little bit see-through */
			.prev:hover, .next:hover {
			background-color: rgba(0,0,0,0.8);
			}

			/* Caption text */
			.text {
			color: #f2f2f2;
			font-size: 15px;
			padding: 8px 12px;
			position: absolute;
			bottom: 8px;
			width: 100%;
			text-align: center;
			}

			/* Number text (1/3 etc) */
			.numbertext {
			color: #f2f2f2;
			font-size: 12px;
			padding: 8px 12px;
			position: absolute;
			top: 0;
			}

			/* The dots/bullets/indicators */
			.dot {
			cursor: pointer;
			height: 15px;
			width: 15px;
			margin: 0 2px;
			background-color: #bbb;
			border-radius: 50%;
			display: inline-block;
			transition: background-color 0.6s ease;
			}

			.active, .dot:hover {
			background-color: #717171;
			}

			/* Fading animation */
			.fade {
			-webkit-animation-name: fade;
			-webkit-animation-duration: 1.5s;
			animation-name: fade;
			animation-duration: 1.5s;
			}

			@-webkit-keyframes fade {
			from {opacity: .4} 
			to {opacity: 1}
			}

			@keyframes fade {
			from {opacity: .4} 
			to {opacity: 1}
			}

			/* On smaller screens, decrease text size */
			@media only screen and (max-width: 300px) {
			.prev, .next,.text {font-size: 11px}
			}
		</style> -->
	</head>
	<body>
	<!-- <div class="slideshow-container fullscreen">
	<section class="banner-area relative section-gap relative" id="home">
			<div class="container">
				<div class="row fullscreen d-flex align-items-center justify-content-end">
					<div class="banner-content col-lg-7 col-md-12">
							<h2 class="combined" >
						ALVA TRAVEL<br>
						Resmi, Murah, Mudah, dan Nyaman.<br><br>				
							</h2>
						<a href="<php echo base_url() ?>tiket" class="primary-btn header-btn text-uppercase">Cari & Pesan Tiket</a>
					</div>
				</div>
			</div>
		</section>
		<div class="mySlides fade">
		<div class="numbertext">1 / 3</div>
		<img src="http://localhost/alvatravel/assets/frontend/img/jkt.jpg" style="width:100%">
		<div class="text">Caption Text</div>
		</div>

		<div class="mySlides fade">
		<div class="numbertext">2 / 3</div>
		<img src="http://localhost/alvatravel/assets/frontend/img/header-bg.jpg" style="width:100%">
		<div class="text">Caption Two</div>
		</div>

		<div class="mySlides fade">
		<div class="numbertext">3 / 3</div>
		<img src="http://localhost/alvatravel/assets/frontend/img/header-bg.jpg" style="width:100%">
		<div class="text">Caption Three</div>
		</div>

		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>

		</div>
		<br>

		<div style="text-align:center">
		<span class="dot" onclick="currentSlide(1)"></span> 
		<span class="dot" onclick="currentSlide(2)"></span> 
		<span class="dot" onclick="currentSlide(3)"></span> 
		</div> -->

		<?php $this->load->view('frontend/include/base_css'); ?>
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<!-- start banner Area -->
		<section class="banner-area relative section-gap relative" id="home">
			<div class="container">
				<div class="row fullscreen d-flex align-items-center justify-content-end">
					<div class="banner-content col-lg-7 col-md-12">
							<h2 class="combined" >
						ALVA TRAVEL<br>
						Resmi, Murah, Mudah, dan Nyaman.<br><br>				
							</h2>
						<a href="<?php echo base_url() ?>tiket" class="primary-btn header-btn text-uppercase">Cari & Pesan Tiket</a>
					</div>
				</div>
			</div>
		</section>
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-md-8 pb-40 header-text">
						<h1>CARA PEMESANAN TIKET</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<img class="img-fluid" src="<?php echo base_url() ?>assets/frontend/img/a1.png" width="100" height="100" alt="">
							<h4>Pilih rincian perjalanan
							</h4>
							<p>
								Masukkan tempat keberangkatan, tujuan, tanggal perjalanan dan kemudian klik 'Cari'
							</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<img class="img-fluid" src="<?php echo base_url() ?>assets/frontend/img/a3.png" width="100" height="100" alt="">
							<h4>Pilih kota tujuan dan tempat duduk anda</h4>
							<p>
								Pilih kota tujuan, tempat duduk, tempat keberangkatan, tujuan, isi rincian penumpang dan klik 'Pembayaran'
							</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<img class="img-fluid" src="<?php echo base_url() ?>assets/frontend/img/a2.png" width="100" height="100" alt="">
							<h4>Cara Pembayaran yang Mudah</h4>
							<p>
								Pembayaran dapat dilakukan melalui transfer ATM, Internet banking.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End service Area -->
		<!-- End feature Area -->
		<!-- End Generic Start -->
		<!-- start footer Area -->
		<?php $this->load->view('frontend/include/base_footer'); ?>
		<!-- js -->
		<?php $this->load->view('frontend/include/base_js'); ?>
	</body>
	<script>
		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		showSlides(slideIndex = n);
		}

		function showSlides(n) {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		if (n > slides.length) {slideIndex = 1}    
		if (n < 1) {slideIndex = slides.length}
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
		}
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex-1].style.display = "block";  
		dots[slideIndex-1].className += " active";
		}
		</script>
</html>