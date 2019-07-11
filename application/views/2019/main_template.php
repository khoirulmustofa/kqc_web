<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>KQC | <?php echo $page?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--Css Fils-->
<link
	href="<?php echo base_url('template/').template();?>/css/style.css"
	rel="stylesheet" type="text/css">
<link
	href="<?php echo base_url('template/').template();?>/css/bootstrap.css"
	rel="stylesheet" type="text/css">
<link
	href="<?php echo base_url('template/').template();?>/css/responsive.css"
	rel="stylesheet" type="text/css">
<link
	href="<?php echo base_url('template/').template();?>/css/color.css"
	rel="stylesheet" type="text/css">
<link
	href="<?php echo base_url('template/').template();?>/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
<link
	href="<?php echo base_url('template/').template();?>/css/owl.carousel.css"
	rel="stylesheet" type="text/css">
<link
	href="<?php echo base_url('template/').template();?>/css/audioplayer.css"
	rel="stylesheet" type="text/css">
<link
	href="<?php echo base_url('template/').template();?>/css/prettyPhoto.css"
	rel="stylesheet" type="text/css">
<link rel="icon"
	href="https://assets-a1.kompasiana.com/statics/v20106_kompasiana/images/favicon.ico"
	type="image/x-icon">
</head>

<body>
	<!--Wrapper-->
	<div id="wrapper">
		<!--Header-->
		<header id="header">
			<div class="container">
				<a
					href="<?php echo base_url('template/').template();?>/index-2.html"
					class="logo"><img
					src="<?php echo base_url('template/').template();?>/images/logo.png"
					alt="logo"></a>
				<div class="header-right">
					<div class="header-right-topbar">
						<div class="search-holder">
							<button id="trigger-overlay" type="button">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
						<ul class="top-menu">
							<li><a
								href="<?php echo base_url('template/').template();?>/donation.html">donate</a></li>
							<li><a href="<?php echo base_url('template/').template();?>/#"
								id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="true">azan</a>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									<li><strong class="title">25th jumada Al-Akhirah.</strong></li>
									<li><span>1438 h</span></li>
									<li><b>March 25,2017</b></li>
									<li>
										<div class="head">
											<span class="azan">Pray</span> <span class="time">Time</span>
										</div>
									</li>
									<li><a href="<?php echo base_url('template/').template();?>/#"><em
											class="azan">Fajr</em><strong class="time">06:04 AM</strong></a></li>
									<li><a href="<?php echo base_url('template/').template();?>/#"><em
											class="azan">Sunrise</em><strong class="time">07:34 AM</strong></a></li>
									<li><a href="<?php echo base_url('template/').template();?>/#"><em
											class="azan">Dhuhr</em><strong class="time">01:45 pm</strong></a></li>
									<li><a href="<?php echo base_url('template/').template();?>/#"><em
											class="azan">Asr</em><strong class="time">05:14 pm</strong></a></li>
									<li><a href="<?php echo base_url('template/').template();?>/#"><em
											class="azan">Maghrib</em><strong class="time">07:55 pm</strong></a></li>
									<li><a href="<?php echo base_url('template/').template();?>/#"><em
											class="azan">Isha</em><strong class="time">09:20 pm</strong></a></li>
									<li><a href="<?php echo base_url('template/').template();?>/#"><em
											class="azan">juma tul mubarak</em><strong class="time">01:30
												pm</strong></a></li>
								</ul></li>
							<li><a href="<?php echo base_url('template/').template();?>/#">iqamah</a></li>
						</ul>
					</div>
					<div class="navigation-row">
						<nav class="navbar navbar-inverse">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed"
									data-toggle="collapse" data-target="#navbar"
									aria-expanded="false" aria-controls="navbar">
									<span class="sr-only">Toggle navigation</span> <span
										class="icon-bar"></span> <span class="icon-bar"></span> <span
										class="icon-bar"></span>
								</button>
							</div>
							<div id="navbar" class="collapse navbar-collapse">
								<ul class="nav navbar-nav" id="nav">
									<li <?php echo  $menu=="Home" ? 'class="active"' :''?>><a
										href="<?php echo site_url()?>">BERANDA</a></li>
									<li <?php echo  $menu=="Tentang_kami" ? 'class="active"' :''?>><a>TENTANG KAMI<i class="fa fa-caret-down"
											aria-hidden="true"></i></a>
										<ul>
											<li><a href="<?php echo site_url('manajemen')?>">Manajemen</a></li>
											<li><a href="<?php echo site_url('sejarah')?>">Sejarah</a></li>
											<li><a href="<?php echo site_url('visi-misi')?>">Visi Misi</a></li>
											<li><a href="<?php echo site_url('methode')?>">KQC Methode</a></li>
											<li><a href="<?php echo site_url('legal-formal')?>">Legal
													Formal</a></li>
											<li><a href="<?php echo site_url('salam-pimpinan')?>">Salam
													Pimpinan</a></li>
										</ul></li>
									<li><a>PROGRAM<i class="fa fa-caret-down" aria-hidden="true"></i></a>
										<ul>
											<li><a href="<?php echo site_url('pendidikan-dakwah')?>">Pendidikan
													dan Dakwah</a></li>
											<li><a href="<?php echo site_url('sosial-kemanusian')?>">Sosial
													dan Kemanusian</a></li>
											<li><a
												href="<?php echo site_url('pengembangan-masyarakat')?>">Pengembangan
													Masyarakat</a></li>
										</ul></li>
									<li <?php echo  $menu=="#" ? 'class="active"' :''?>><a
										href="<?php echo site_url('sedekah')?>">SEDEKAH</a></li>
									<li <?php echo  $menu=="Artikel" ? 'class="active"' :''?>><a
										href="<?php echo site_url('artikel')?>">ARTIKEL</a></li>
									<li <?php echo  $menu=="#" ? 'class="active"' :''?>><a
										href="<?php echo site_url()?>">KQC SCHOOL</a></li>
									<li <?php echo  $menu=="Hubungi_kami" ? 'class="active"' :''?>><a
										href="<?php echo site_url('hubungi-kami')?>">HUBUNGI KAMI</a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
			<!--Search Bar-->
			<div class="overlay overlay-contentscale">
				<button type="button" class="overlay-close">Close</button>
				<div class="search-inner">
					<form method="get">
						<input type="text" placeholder="Search....." required>
						<button class="submit">
							<i class="fa fa-search"></i>
						</button>
					</form>
				</div>
				<!--Search Bar Inner-->
			</div>
			<!--Search Bar-->
		</header>
		<!--Header-->
<?php echo $contents;?>
		<!--Banner-->

		<!--Banner-->

		<!--Mian Content-->

		<!--Mian Content-->

		<!--Footer-->
		<footer id="footer">
			<section class="footer-section-1">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="footer-box">
								<a
									href="<?php echo base_url('template/').template();?>/index-2.html"
									class="footer-logo"><img
									src="<?php echo base_url('template/').template();?>/images/logo.png"
									alt="logo"></a>
								<p>This is Photoshop's version of Lorem Ipsum. Proin gravida
									nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis
									bibendum auctor,</p>
								<address>
									<ul>
										<li><i class="fa fa-map-o" aria-hidden="true"></i>209,
											Building - Avenue-02, United states</li>
										<li><i class="fa fa-paper-plane" aria-hidden="true"></i><a
											href="<?php echo base_url('template/').template();?>/mailto:">info@salat.com</a></li>
										<li><i class="fa fa-volume-control-phone" aria-hidden="true"></i>+
											1 315 - 000 - 6565</li>
									</ul>
								</address>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="footer-box">
								<h3>Latest News</h3>
								<div class="latest-news-widget">
									<ul>
										<li>
											<div class="thumb">
												<a href="<?php echo base_url('template/').template();?>/#"><img
													src="<?php echo base_url('template/').template();?>/images/latest-img-1.jpg"
													alt="latest"></a>
											</div>
											<div class="text-col">
												<h5>
													<a href="<?php echo base_url('template/').template();?>/#">Islamic
														center Youth participate</a>
												</h5>
												<span><i class="fa fa-calendar" aria-hidden="true"></i>22
													Aug, 2018</span>
											</div>
										</li>
										<li>
											<div class="thumb">
												<a href="<?php echo base_url('template/').template();?>/#"><img
													src="<?php echo base_url('template/').template();?>/images/latest-img-2.jpg"
													alt="latest"></a>
											</div>
											<div class="text-col">
												<h5>
													<a href="<?php echo base_url('template/').template();?>/#">Islamic
														center Youth participate</a>
												</h5>
												<span><i class="fa fa-calendar" aria-hidden="true"></i>22
													Aug, 2018</span>
											</div>
										</li>
										<li>
											<div class="thumb">
												<a href="<?php echo base_url('template/').template();?>/#"><img
													src="<?php echo base_url('template/').template();?>/images/latest-img-1.jpg"
													alt="latest"></a>
											</div>
											<div class="text-col">
												<h5>
													<a href="<?php echo base_url('template/').template();?>/#">Islamic
														center Youth participate</a>
												</h5>
												<span><i class="fa fa-calendar" aria-hidden="true"></i>22
													Aug, 2018</span>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="footer-box">
								<h3>newsletter</h3>
								<p>Lorem ipsum dolor sit amet,tetur adipiscing elit. Aliquam
									vehicula mollis urna vel dignissim.</p>
								<form action="#">
									<input type="text" placeholder="Your name" required>
									<div class="input-box">
										<input type="text" placeholder="Your email here" required>
										<button type="submit">
											<i class="fa fa-paper-plane" aria-hidden="true"></i>
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="footer-section-2">
				<div class="container">
					<strong class="copyright">&copy; 2017. All rights reserved. Salat
						by Themelooper</strong>
					<div class="footer-social">
						<ul>
							<li><a href="<?php echo base_url('template/').template();?>/#"><i
									class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="<?php echo base_url('template/').template();?>/#"><i
									class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="<?php echo base_url('template/').template();?>/#"><i
									class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</section>
		</footer>
		<!--Footer-->
	</div>
	<!--Wrapper-->
	<!--JQUERY START-->
	<script
		src="<?php echo base_url('template/').template();?>/js/jquery.js"></script>
	<!--Bootstrap-->
	<script
		src="<?php echo base_url('template/').template();?>/js/bootstrap.js"></script>
	<!--PRETTYPHOTO JS-->
	<script
		src="<?php echo base_url('template/').template();?>/js/jquery.prettyPhoto.js"></script>
	<!--Owl Carousel-->
	<script
		src="<?php echo base_url('template/').template();?>/js/owl.carousel.min.js"></script>
	<!--EVENT TIMER JS-->
	<script
		src="<?php echo base_url('template/').template();?>/js/jquery_countdown.js"></script>
	<!---Modernizr Script-->
	<script
		src="<?php echo base_url('template/').template();?>/js/modernizr.custom.js"></script>
	<!---Search Script-->
	<script
		src="<?php echo base_url('template/').template();?>/js/search-script.js"></script>
	<!--Custom Script-->
	<script
		src="<?php echo base_url('template/').template();?>/js/custom_script.js"></script>
</body>
</html>
