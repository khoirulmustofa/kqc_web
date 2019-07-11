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
								<label for="varchar">Nama <?php echo form_error('tentang_kami_nama') ?></label>
								<input type="text" class="form-control" name="tentang_kami_nama"
									id="tentang_kami_nama" placeholder="Tentang Kami Nama"
									value="<?php echo $tentang_kami_nama; ?>" disabled />
							</div>
							<div class="form-group">
								<label for="tentang_kami_isi"> Isi <?php echo form_error('tentang_kami_isi') ?></label>
								<textarea class="form-control" rows="10" cols="80" name="tentang_kami_isi"
									id="tentang_kami_isi" placeholder="Tentang Kami Isi"><?php echo $tentang_kami_isi; ?></textarea>
							</div>
							<div class="form-group">
								<label for="varchar">Gambar <?php echo form_error('tentang_kami_gambar') ?></label>

								<input type="file" id="tentang_kami_gambar" name="tentang_kami_gambar">
								<?php

        if ($tentang_kami_gambar_1 != '') {
            ?>
								<a class="label label-success"
									href="<?php echo base_url('template/assets/gambar_tentang_kami/').$tentang_kami_gambar_1?>">Gambar yang di pilih  <?php echo $tentang_kami_gambar_1 ?></a>	
								<?php } ?>
						</div>
							

						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<input type="hidden" name="tentang_kami_gambar_1"
								value="<?php echo $tentang_kami_gambar_1; ?>" /> <input
								type="hidden" name="tentang_kami_id"
								value="<?php echo $tentang_kami_id; ?>" />
							<button type="submit" class="btn btn-success pull-right"><?php echo $button.' '.$page ?></button>
							<a href="<?php echo site_url('admin/tentang_kami') ?>"
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