<div class="container">
	<section class="content-header">
		<h1>TENTANG KAMI</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url()?>"><i class="fa fa-dashboard"></i>
					Beranda</a></li>
			<li><a>Tentang Kami</a></li>
			<li class="active"><?php echo $page;?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">
							<i class="fa fa-fw fa-object-group"></i> <?php echo $page;?>
						</h3>
					</div>
					<div class="box-body">
						<img class="img-responsive"
							src="<?php echo site_url('template/assets/gambar_tentang_kami/').$tentang_kami_gambar ?>"
							alt="User profile picture">

					</div>
					<div class="box-footer ">
					<?php echo $tentang_kami_isi ?></div>
				</div>
			</div>
			<?php $this->load->view('adminlte/view_highlight');?>
		</div>
	</section>
</div>
