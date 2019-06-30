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
								<label for="varchar">Nama <?php echo form_error('carousel_nama') ?></label>
								<input type="text" class="form-control" name="carousel_nama"
									id="carousel_nama" placeholder="Carousel Nama"
									value="<?php echo $carousel_nama; ?>" />
							</div>							
							<div class="form-group">
								<label for="varchar">Gambar <?php echo form_error('carousel_gambar') ?></label>

								<input type="file" id="carousel_gambar" name="carousel_gambar">
								<?php

        if ($carousel_gambar_1 != '') {
            ?>
								<a class="label label-success"
									href="<?php echo base_url('template/assets/gambar_carousel/').$carousel_gambar_1?>">Gambar yang di pilih  <?php echo $carousel_gambar_1 ?></a>	
								<?php } ?>
						</div>
							<div class="form-group">
            <label for="varchar">Link <?php echo form_error('carousel_link') ?></label>
            <input type="text" class="form-control" name="carousel_link" id="carousel_link" placeholder="Carousel Link" value="<?php echo $carousel_link; ?>" />
        </div>

						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<input type="hidden" name="carousel_gambar_1"
								value="<?php echo $carousel_gambar_1; ?>" /> <input type="hidden"
								name="carousel_id" value="<?php echo $carousel_id; ?>" />
							<button type="submit" class="btn btn-success pull-right"><?php echo $button.' '.$page ?></button>
							<a href="<?php echo site_url('admin/carousel') ?>"
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