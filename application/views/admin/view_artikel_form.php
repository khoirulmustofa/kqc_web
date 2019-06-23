<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			 <?php echo $button.' '.$page?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i>Dasboard</a></li>
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
								<label for="varchar">Judul <?php echo form_error('artikel_judul') ?></label>
								<input type="text" class="form-control" name="artikel_judul"
									id="artikel_judul" placeholder="Artikel Judul"
									value="<?php echo $artikel_judul; ?>" />
							</div>
							
							<div class="form-group">
								<label for="artikel_isi">Artikel Isi <?php echo form_error('artikel_isi') ?></label>
								<textarea class="form-control" rows="10" cols="80" name="artikel_isi"
									id="artikel_isi" placeholder="Artikel Isi"><?php echo $artikel_isi; ?></textarea>
							</div>
							<div class="form-group">
								<label for="varchar">Gambar <?php echo form_error('artikel_gambar') ?></label>

								<input type="file" id="artikel_gambar" name="artikel_gambar">
								<?php

        if ($artikel_gambar_1 != '') {
            ?>
								<a class="label label-success"
									href="<?php echo base_url('public/foto_artikel/').$artikel_gambar_1?>">Gambar yang di pilih  <?php echo $artikel_gambar_1 ?></a>	
								<?php } ?>
						</div>
						<div class="form-group">
						<label for="int">Kategori <?php echo form_error('kategori_id') ?></label>
							<?php echo cmb_dinamis('kategori_id', 'kategori', 'kategori_nama', 'kategori_id', $kategori_id,'Pilih Kategory'); ?>
					</div>

							<div class="form-group">
								<label for="varchar">Tag <?php echo form_error('artikel_tag') ?></label>
								<select multiple class="form-control select2"
									name="artikel_tag[]" data-placeholder="Pilih Tag"
									style="width: 100%;">
								
								<?php
								$_arrNilai = explode(',', $artikel_tag);
								foreach ($tag_data as $artikel_tag) {
								    $_ck = (array_search($artikel_tag->tag_seo, $_arrNilai) === false) ? '' : 'selected="selected"';
            ?>
									<option value="<?php echo $artikel_tag->tag_seo ?>" <?php echo $_ck;?>><?php echo $artikel_tag->tag_nama ?></option>
                				<?php } ?>
							</select>

							</div>

						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<input type="hidden" name="artikel_gambar_1"
								value="<?php echo $artikel_gambar_1; ?>" /> <input type="hidden"
								name="artikel_id" value="<?php echo $artikel_id; ?>" />
							<button type="submit" class="btn btn-success"><?php echo $button ?></button>
							<a href="<?php echo site_url('admin/artikel') ?>"
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