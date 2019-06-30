<div class="container">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Top Navigation <small>Example 2.0</small>
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
				<div class="box box-success">
					<div class="box-body">
						<a href="#"><img class="img-responsive pad"
							src="<?php echo base_url('template/').template();?>/dist/img/photo2.png"
							alt="Photo"></a>


						<div class="user-block">
							<img class="img-circle img-bordered-sm"
								src="<?php echo base_url('template/').template();?>/dist/img/user6-128x128.jpg"
								alt="User Image"> <span class="username"> <?php echo ucwords($artikel_username)?> </span> <span><i
								class="fa fa-fw fa-clock-o"></i><?php echo tgl_indo($artikel_tanggal)?> | </span><span><i
								class="fa fa-fw fa-eye"></i> <?php echo $artikel_view?> kali dilihat | </span>
							<span>Kategori : <a href="<?php echo site_url('artikel/kategori/').$kategori_seo ?>" class="btn bg-olive btn-xs"><?php echo $kategori_nama?></a> | Tag : </span> 
							<?php

    $tags_explode = tag_explode($artikel_tag);
    foreach ($tags_explode as $tag) {
        ?>
							    <span><a
								href="<?php echo site_url('artikel/tag/').str_replace(" ","-", $tag)?>"
								class="btn bg-purple btn-xs"><?php echo show_tag($tag) ?></a></span>
							<?php }?>
							<?php ?>
							
						</div>
						<h2 class="page-header">
							<?php echo $artikel_judul; ?>
						</h2>
						<p><?php echo $artikel_isi; ?></p>


					</div>
					<div class="box-footer box-comments">
						<h4>Komentar :</h4>
						<?php
						foreach ($komentar_data->result() as $komentar)
						{
						?>
						   <div class="box-comment">
							<!-- User image -->
							<img class="img-circle img-sm"
								src="<?php echo base_url('template/').template();?>/dist/img/user3-128x128.jpg"
								alt="User Image">

							<div class="comment-text">
								<span class="username"> <?php echo ucwords($komentar->komentar_nama)?> <span
									class="text-muted pull-right"><?php echo tgl_lengkap($komentar->komentar_tanggal)?></span>
								</span>
								<?php echo $komentar->komentar_isi?>
							</div>

						</div>
						<?php 
						$q_balas_komentar= $this->Komentar_model->get_balas_komentar_by_artikel_id($artikel_id,$komentar->komentar_id);
						//print_r($q_balas_komentar);
						foreach ($q_balas_komentar->result() as $balas_komentar) {
						    
						        ?>
						        <div class="box-comment" style="padding-left: 50px; background-color: #e5fbe0">
							<img class="img-circle img-sm"
								src="<?php echo base_url('template/').template();?>/dist/img/avatar5.png"
								alt="User Image">

							<div class="comment-text">
								<span class="username"> <?php echo ucwords($balas_komentar->komentar_nama)?> <span
									class="text-muted pull-right"><?php echo tgl_lengkap($balas_komentar->komentar_tanggal)?></span>
								</span>
								<?php echo $balas_komentar->komentar_isi?>
							</div>
						</div>
						   <?php
						}
						}?>
						
					</div>
					<div class="box-footer">
						<h4>Tulis Komentar :</h4>
						<form id="form_komentar" method="POST">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama</label> <input type="text" class="form-control"
										id="komentar_nama" name="komentar_nama" required="required"
										placeholder="Masukan Nama ...">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Email</label> <input type="email" class="form-control"
										id="komentar_email" name="komentar_email" required="required"
										placeholder="Masukan Email ...">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Isi Komentar</label>
									<textarea class="form-control" id="komentar_isi" required="required"
										name="komentar_isi" rows="3" placeholder="Masukan Isi ..."></textarea>
								</div>
								<input type="hidden" id="artikel_id" name="artikel_id"
									value="<?php echo $artikel_id; ?>" />
								<button id="kirim_komentar" class="btn btn-info pull-right">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php $this->load->view('adminlte/view_sidebar');?>				
		</div>
	</section>
</div>