<div class="container">

	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Maaf !!!</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool"
								data-widget="remove">
								<i class="fa fa-fw fa-hourglass-o"></i>
							</button>
						</div>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<p>Kata kunci <strong><?php echo $cari?></strong> yang anda cari
						tidak ada dalam artikel KQC <a
							href="<?php echo  base_url('artikel') ?>">Klik Disini Untuk Semua
							Artikel</a>
						</p>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
			<?php $this->load->view('adminlte/sidebar');?>	
		</div>
	</section>
</div>