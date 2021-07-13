<header id="header" id="home">
		    <div class="container">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="<?php echo base_url() ?>"><h3><b>Alva Travel</b></h3></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li class="menu"><a href="<?php echo base_url() ?>">Home</a></li>
			          <li><a href="<?php echo base_url() ?>tiket">Cari & Pesan Tiket</a></li>
			          <li class="menu"><a href="<?php echo base_url() ?>profile/tiketsaya/<?php echo $this->session->userdata('kd_pelanggan') ?>">Tiket Saya</a></li>
			          <?php if ($this->session->userdata('username')) { ?>
				      	<li class="menu-has-children"><a href="">Hai, <?php echo $this->session->userdata('nama_lengkap'); ?></a>
						<ul>
							<?php if ($this->session->userdata('kd_agen') != NULL) { ?>
								<li><a href="<?php echo base_url() ?>profile/profilesaya/<?php echo $this->session->userdata('kd_agen') ?>"><i class="fa fa-id-card"></i> Profile Saya</a></li>
							<?php } else{ ?>
								<li><a href="<?php echo base_url() ?>profile/profilesaya/<?php echo $this->session->userdata('kd_pelanggan') ?>"><i class="fa fa-id-card"></i> Profile Saya</a></li>
							<?php } ?>
							<li><a href="<?php echo base_url() ?>login/logout"><i class="fa fa-sign-out"></i> Keluar</a></li>
						</ul>
						</li>
				      <?php }else{ ?>  
						<li class="menu-has-children"><a>Daftar</a>
						<ul>
							<li><a href="<?php echo base_url() ?>login/register/"><i class="fa fa-id-card"></i> Daftar Agen</a></li>
							<li class="menu wobble animated"><a href="<?php echo base_url() ?>login/Daftar"><i class="fa fa-id-card"></i>Daftar Customer</a></li>
						</ul>
						</li>
				  	  
 					  <li><a href="<?php echo base_url() ?>login">Login</a></li>
				  	  <?php } ?>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->	