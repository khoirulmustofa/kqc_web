<div class="container">
	<section class="content-header">

		<h1>
			<i class="fa fa-fw fa-graduation-cap"></i> <?php echo $page;?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a><?php echo $menu?></a></li>
			<li class="active"><?php echo $page;?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<?php
				foreach ($program_data as $program) {
        
        ?>
				<div class="col-md-6" style="padding-left: 3px; padding-right: 3px;">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $program->program_nama ?></h3>

							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool"
									data-widget="remove">
									<i class="fa fa-times"></i>
								</button>
							</div>
							<!-- /.box-tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<a href="<?php echo site_url('')?>">
							<img class="img-responsive" style="width: 100%;" 
								src="<?php echo site_url('template/assets/gambar_program/').$program->program_gambar?>">
							</a>
						</div>
					</div>
				</div>
				<?php
    }
    ?>
				<div class="col-md-12 box">
				<div style="text-align: center;"><?php echo $pagination ?></div>
				</div>
			</div>
			
		
			<?php $this->load->view('adminlte/view_highlight');?>
			</div>
	</section>
</div>
