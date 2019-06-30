<div class="container">
	<section class="content" style="padding: 0px;">
		<div class="row">
			<div class="box-body">
				<div id="carousel-example-generic" class="carousel slide"
					data-ride="carousel">
					<ol class="carousel-indicators">
					<?php
					foreach ($carousel_data as $generic) {
        ++ $start_generic;
        ?>
						<li data-target="#carousel-example-generic" data-slide-to="<?php echo $start_generic?>"
							class="<?php echo $start_generic == 1 ? 'active' : ''; ?>"></li>
							<?php
    }
    ?>
					</ol>
					<div class="carousel-inner">
					<?php
    foreach ($carousel_data as $carousel) {
        ++ $start;
        ?>
						<div class="<?php echo $start == 1 ? 'item active' : 'item'; ?>">
							<img style="max-height: 50vh; width: 100%;"
								src="<?php echo site_url('template/assets/gambar_carousel/').$carousel->carousel_gambar?>">
							<a class="carousel-caption btn-block btn-success btn-flat">
							<?php echo ucwords($carousel->carousel_nama)?>
								</a>
						</div>
						<?php
    }
    ?>
						
					</div>
					<a class="left carousel-control" href="#carousel-example-generic"
						data-slide="prev"> <span class="fa fa-angle-left"></span>
					</a> <a class="right carousel-control"
						href="#carousel-example-generic" data-slide="next"> <span
						class="fa fa-angle-right"></span>
					</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua"><i
						class="ion ion-ios-gear-outline"></i></span>

					<div class="info-box-content">
						<h2>Sedekah</h2>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-red"><i
						class="fa fa-fw fa-graduation-cap"></i></span>

					<div class="info-box-content">
						<h2>KQC School</h2>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->

			<!-- fix for small devices only -->
			<div class="clearfix visible-sm-block"></div>

			<div class="col-md-3 col-sm-6 col-xs-12 ">
				<div class="info-box">
					<span class="info-box-icon bg-green"><i
						class="ion ion-ios-cart-outline"></i></span>

					<div class="info-box-content">
						<h2>KQC Mart</h2>
					</div>
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-yellow"><i
						class="ion ion-ios-people-outline"></i></span>

					<div class="info-box-content">
						<h2>Kajian</h2>
					</div>
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
		</div>
		<div class="row" style="margin-bottom: 10px;">
			<div class="col-md-12"
				style="text-align: center; border-bottom: 2px solid #00a65a;">
				<h1>
					KABAR <strong>KQC</strong>
				</h1>
				<h4>Alqur'an Is My Life</h4>
			</div>
		</div>
		<div class="row">
		<?php
foreach ($artikel_kategori_kabar_data as $artikel_kategori_kabar) {
    ?>
			<div class="col-md-4">
				<div class="box box-solid">

					<div class="box-header with-border">
						<a
							href="<?php echo site_url('artikel/').$artikel_kategori_kabar->artikel_judul_seo ?>"><h3
								class="box-title text-green"><?php echo ucwords($artikel_kategori_kabar->artikel_judul)?></h3></a>
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<a
							href="<?php echo site_url('artikel/').$artikel_kategori_kabar->artikel_judul_seo ?>"><img
							class="img-responsive"
							src="<?php echo site_url('template/assets/gambar_artikel/').$artikel_kategori_kabar->artikel_gambar?>"></a>
					</div>
					<div class="box-footer">
					<?php echo limit_words($artikel_kategori_kabar->artikel_isi, 25)." ..." ?>
					<a class="badge bg-green"
							href="<?php echo site_url('artikel/').$artikel_kategori_kabar->artikel_judul_seo ?>">Baca
							Detail</a>
					</div>
				</div>
				<!-- /.box -->
			</div>
			<?php
}
?>
						
		</div>

		<div class="row" style="margin-bottom: 10px;">
			<div class="col-md-12"
				style="text-align: center; border-bottom: 2px solid #00a65a;">
				<h1>
					<strong>INSPIRASI</strong>
				</h1>

			</div>
		</div>
		<div class="row">
			<?php
foreach ($artikel_kategori_inspirasi_data as $artikel_kategori_inspirasi) {
    ?>
			<div class="col-md-4">
				<div class="box box-solid">

					<div class="box-header with-border">
						<a
							href="<?php echo site_url('artikel/').$artikel_kategori_inspirasi->artikel_judul_seo ?>">
							<h3 class="box-title text-aqua"><?php echo ucwords($artikel_kategori_inspirasi->artikel_judul)?></h3>
						</a>
					</div>

					<!-- /.box-header -->
					<div class="box-body">
						<a
							href="<?php echo site_url('artikel/').$artikel_kategori_inspirasi->artikel_judul_seo ?>"><img
							class="img-responsive"
							src="<?php echo site_url('template/assets/gambar_artikel/').$artikel_kategori_inspirasi->artikel_gambar?>"></a>
					</div>
					<div class="box-footer">
					<?php echo limit_words($artikel_kategori_inspirasi->artikel_isi, 25)." ..." ?>
					<a class="badge bg-aqua"
							href="<?php echo site_url('artikel/').$artikel_kategori_inspirasi->artikel_judul_seo ?>">Baca
							Detail</a>
					</div>
				</div>
				<!-- /.box -->
			</div>
			<?php
}
?>			
		</div>
	</section>
</div>
