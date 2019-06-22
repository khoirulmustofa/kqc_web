<div class="container">
	<!-- Content Header (Page header) -->
	<section class="content-header">

		<h1>
			<?php echo $total_rows ?>
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
			<!-- Left col -->
			<div class="col-md-8">
				<div class="box box-success">
				<?php
    foreach ($artikel_data->result() as $artikel) {
        ?>
					<div class="box-body" style="border-bottom: 3px solid #00a65a">
						<a href="<?php echo strtolower($artikel->artikel_judul_seo)?>"><img
							class="img-responsive pad"
							src="<?php echo base_url('template/').template().'/dist/img/photo2.png'?>"
							alt="Photo"></a>


						<div class="user-block">
							<img class="img-circle img-bordered-sm"
								src="<?php echo base_url('template/').template().'/dist/img/avatar5.png'?>"
								alt="User Image"> <span class="username"> <?php echo ucwords($artikel->artikel_username) ?> </span>
							<span><i class="fa fa-fw fa-clock-o"></i><?php echo tgl_lengkap($artikel->artikel_tanggal)?> | </span><span><i
								class="fa fa-fw fa-eye"></i> <?php echo $artikel->artikel_view?> di lihat | </span>
							<span>Kategori : <a
								href="<?php echo site_url('artikel/kategori/').strtolower($artikel->kategori_seo)?>"
								class="btn bg-olive btn-xs"><?php echo ucwords($artikel->kategori_nama)?></a>
								| Tag :
							</span><?php

        $tags_explode = tag_explode($artikel->artikel_tag);
        foreach ($tags_explode as $tag) {
            ?>
        <span><a
								href="<?php echo site_url('artikel/tag/').strtolower($tag)?>"
								class="btn bg-purple btn-xs"><?php echo ucwords(str_replace("-", " ", $tag))?></a></span>
							<?php }?>

						</div>
						<h2 class="page-header">
							<a
								href="<?php echo site_url('artikel/').strtolower($artikel->artikel_judul_seo)?>"><?php echo ucwords($artikel->artikel_judul) ?></a>
						</h2>
						<?php echo limit_words($artikel->artikel_isi, 25)." ..." ?>
						<a href="<?php echo strtolower($artikel->artikel_judul_seo)?>">Read
							More <i class="fa fa-fw fa-folder-open-o"></i>
						</a>
					</div>
					<?php
    }
    ?>            
				</div>
				<div style="text-align: center; background-color: #fff;"><?php echo $pagination ?></div>

			</div>
			<?php $this->load->view('adminlte/sidebar');?>	
			<?php $this->load->view('adminlte/view_highlight');?>		
		</div>
	</section>
</div>