<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			 <?php echo $button.' '.$page?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin')?>"><i
					class="fa fa-dashboard"></i>Dasboard</a></li>
			<li class="active"><?php echo $button.' '.$page?></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-success">
					<div class="box-body">
					<?php
    $attributes = array(
        'role' => 'form'
    );
    echo form_open_multipart($action, $attributes)?>				
				<div class="box-body">
							<div class="form-group">
								<label for="varchar">Nama Bank <?php echo form_error('rekening_sedekah_nama_bank') ?></label>
								<input type="text" class="form-control"
									name="rekening_sedekah_nama_bank"
									id="rekening_sedekah_nama_bank"
									placeholder="Nama Bank"
									value="<?php echo $rekening_sedekah_nama_bank; ?>" />
							</div>
							<div class="form-group">
								<label for="varchar">No Rekening <?php echo form_error('rekening_sedekah_no_rekening') ?></label>
								<input type="text" class="form-control"
									name="rekening_sedekah_no_rekening"
									id="rekening_sedekah_no_rekening"
									placeholder="No Rekening"
									value="<?php echo $rekening_sedekah_no_rekening; ?>" />
							</div>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<input type="hidden" name="rekening_sedekah_id"
								value="<?php echo $rekening_sedekah_id; ?>" />
							<button type="submit" class="btn btn-success pull-right"><?php echo $button.' '.$page ?></button>
							<a href="<?php echo site_url('admin/kategori') ?>"
								class="btn btn-default">Batal</a>
						</div>
						<!-- /.box-footer-->
			<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>