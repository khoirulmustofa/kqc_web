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
								<label for="varchar">Nama <?php echo form_error('program_nama') ?></label>
								<input type="text" class="form-control" name="program_nama"
									id="program_nama" placeholder="Program Nama"
									value="<?php echo $program_nama; ?>" />
							</div>
							<div class="form-group">
								<label for="varchar">Kategori <?php echo form_error('program_kategori') ?></label>
								<select name="program_kategori" class="form-control">
									<option value="">-- Pilih kategori --</option>
									<option value="pendidikan-dan-dakwah" <?php echo $program_kategori=='pendidikan-dan-dakwah'? "selected":"" ?>>Pendidikan dan Dakwah</option>
									<option value="sosial-dan-kemanusian" <?php echo $program_kategori=='sosial-dan-kemanusian'? "selected":"" ?>>Sosial dan Kemanusian</option>
									<option value="pengembangan-masyarakat" <?php echo $program_kategori=='pengembangan-masyarakat'? "selected":"" ?>>Pengembangan Masyarakat</option>
								</select>
							</div>
							<div class="form-group">
								<label for="varchar">Gambar <?php echo form_error('program_gambar') ?></label>

								<input type="file" id="program_gambar" name="program_gambar">
								<?php

        if ($program_gambar_1 != '') {
            ?>
								<a class="label label-success"
									href="<?php echo base_url('public/program/').$program_gambar_1?>">Gambar yang di pilih  <?php echo $program_gambar_1 ?></a>	
								<?php } ?>
						</div>
							<div class="form-group">
								<label for="program_isi">Program Isi <?php echo form_error('program_isi') ?></label>
								<textarea class="form-control" rows="10" name="program_isi"
									cols="80" id="program_isi" placeholder="Program Isi"><?php echo $program_isi; ?></textarea>

							</div>
							<div class="form-group">
								<label for="enum">Status <?php echo form_error('program_status') ?></label>
								<select name="program_status" class="form-control">
									<option value="">-- Pilih Status --</option>
									<option value="Y" <?php echo $program_status=='Y'? "selected":"" ?>>Aktif</option>
									<option value="N" <?php echo $program_status=='N'? "selected":"" ?>>Tidak Aktif</option>
								</select>
							</div>

						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<input type="hidden" name="program_id"
								value="<?php echo $program_id; ?>" />
							<button type="submit" class="btn btn-success"><?php echo $button ?></button>
							<a href="<?php echo site_url('admin/program') ?>"
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