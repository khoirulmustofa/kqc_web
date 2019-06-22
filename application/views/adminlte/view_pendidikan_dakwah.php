<div class="container">
	<section class="content-header">

		<h1>
			<i class="fa fa-fw fa-graduation-cap"></i> PENDIDIKAN DAKWAH
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Layout</a></li>
			<li class="active">Top Navigation</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-8">
				
				<div class="col-md-6" style="padding-left: 3px; padding-right: 3px;">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title">Pesantren Tahfidz Daarul Qur'an</h3>

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
							<img src="<?php echo site_url('template/assets/rumahtafizhinfografis.jpg')?>">
						</div>						
					</div>
				</div>
				<div style="text-align: center; background-color: #fff;"><ul class="pagination" style="margin: 5px"><li class="active"><a>1</a></li><li><a href="http://localhost:81/kqc_web/artikel/?start=5" data-ci-pagination-page="2">2</a></li><li><a href="http://localhost:81/kqc_web/artikel/?start=10" data-ci-pagination-page="3">3</a></li><li><a href="http://localhost:81/kqc_web/artikel/?start=5" data-ci-pagination-page="2" rel="next">Next</a></li><li><a href="http://localhost:81/kqc_web/artikel/?start=60" data-ci-pagination-page="13">Last</a></li></ul></div>
			</div>
		
			<?php $this->load->view('adminlte/view_highlight');?>
			</div>
	</section>
</div>
