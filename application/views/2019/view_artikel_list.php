<div id="inner-banner">
	<div class="container">
		<h1>ARTIKEL</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url()?>">Beranda</a></li>
			<li class="active"><?php echo $page?></li>
		</ol>
	</div>
</div>
<div id="main">
	<section class="blog-section">
		<div class="container">
			<div class="row">

				<div class="col-md-8 col-sm-8">
					<!--STICKY POST START-->
            <?php
            foreach ($artikel_data->result() as $artikel) {
                ?>
            <div class="post-box">
						<div class="frame">
							<a href="#"><img
								src="<?php echo base_url('template/').template();?>/images/blog-img-1.jpg"
								alt="img"></a>
						</div>
						<div class="text-box">
							<h2>
								<a href="#"><?php echo $artikel->artikel_judul ?></a>
							</h2>
							<div class="post-meta">
								<ul>
									<li><a><i class="fa fa-calendar" aria-hidden="true"></i><?php echo tgl_indo($artikel->artikel_tanggal)?></a></li>
									<li><a><i class="fa fa-user" aria-hidden="true"></i><?php echo ucwords($artikel->artikel_username) ?></a></li>
									<li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i><?php echo ucwords($artikel->kategori_nama)?></a></li>
									<li><a><i class="fa fa-eye" aria-hidden="true"></i><?php echo $artikel->artikel_view?> Dilihat
											</a></li>
									
									<?php

        $tags_explode = tag_explode($artikel->artikel_tag);
        foreach ($tags_explode as $tag) {
            ?>
            <li><a><i class="fa fa-tag" aria-hidden="true"></i><?php echo $artikel->kategori_nama?>
											</a></li>
            <?php }?>
								</ul>
							</div>
							<p><?php echo limit_words($artikel->artikel_isi, 27)." ..." ?></p>
							<a href="#" class="read-post">Baca Detail ...</a>
						</div>
					</div>
            <?php
            }
            ?>            
            <!--STICKY POST END-->

					<!--PAGINATION START-->
					<div class="pagination-col">
					
						<nav aria-label="Page navigation">
							<?php echo $pagination ?>
						</nav>
					</div>
					<!--PAGINATION END-->
				</div>
				<div class="col-md-4 col-sm-4">
					<aside>
						<div class="sidebar">
							<div class="sidebar-box">
								<h3>Silahkan Cari Disini</h3>
								<form action="<?php echo $action?> " method="get">
									<input placeholder="Silahkan Cari Disini ..." name="cari" id="cari" required type="text" value="<?php echo $cari; ?>">
									<button type="submit" value="">
										<i class="fa fa-search" aria-hidden="true"></i>
									</button>
								</form>
							</div>
							<div class="sidebar-box">
								<h3>Upcoming Events</h3>
								<div class="news-widget">
									<ul>
										<li>
											<div class="thumb">
												<a href="#"><img
													src="<?php echo base_url('template/').template();?>/images/news-thumb-img-1.jpg"
													alt="img"></a>
											</div>
											<div class="text-col">
												<a href="#">Quran Recitation..</a> <span>02 Sep, 2017</span>
											</div>
										</li>
										<li>
											<div class="thumb">
												<a href="#"><img
													src="<?php echo base_url('template/').template();?>/images/news-thumb-img-2.jpg"
													alt="img"></a>
											</div>
											<div class="text-col">
												<a href="#">Quran Recitation..</a> <span>06 Sep, 2017</span>
											</div>
										</li>
										<li>
											<div class="thumb">
												<a href="#"><img
													src="<?php echo base_url('template/').template();?>/images/news-thumb-img-3.jpg"
													alt="img"></a>
											</div>
											<div class="text-col">
												<a href="#">Quran Recitation..</a> <span>08 Sep, 2017</span>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="sidebar-box">
								<h3>KATEGORI</h3>
								<div class="tags">
									<a href="#">Quran</a> <a href="#">Islam</a> <a href="#">Donate</a>
									<a href="#">Salat</a> <a href="#">Azan</a> <a href="#">Zakat</a>
									<a href="#">Roza</a>
								</div>
							</div>
							<div class="sidebar-box">
								<h3>TAG</h3>
								<div class="tags">
									<a href="#">Quran</a> <a href="#">Islam</a> <a href="#">Donate</a>
									<a href="#">Salat</a> <a href="#">Azan</a> <a href="#">Zakat</a>
									<a href="#">Roza</a>
								</div>
							</div>
							<div class="sidebar-box">
								<h3>Instagram</h3>
								<div class="instagram-widget">
									<ul>
										<li><a href="#"><img
												src="<?php echo base_url('template/').template();?>/images/instagram-img-1.jpg"
												alt=""></a></li>
										<li><a href="#"><img
												src="<?php echo base_url('template/').template();?>/images/instagram-img-2.jpg"
												alt=""></a></li>
										<li><a href="#"><img
												src="<?php echo base_url('template/').template();?>/images/instagram-img-3.jpg"
												alt=""></a></li>
										<li><a href="#"><img
												src="<?php echo base_url('template/').template();?>/images/instagram-img-4.jpg"
												alt=""></a></li>
									</ul>
								</div>
							</div>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</section>
</div>