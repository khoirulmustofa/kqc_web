<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>KQC | Top Navigation</title>
<!-- Tell the browser to be responsive to screen width -->
<meta
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
	name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet"
	href="<?php echo base_url('template/').template();?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet"
	href="<?php echo base_url('template/').template();?>/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet"
	href="<?php echo base_url('template/').template();?>/bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet"
	href="<?php echo base_url('template/').template();?>/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet"
	href="<?php echo base_url('template/').template();?>/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet"
	href="<?php echo base_url('template/toast/toastr.css')?>">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- Google Font -->
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
#loading {
	text-align: center;
	background: url('<?php echo base_url(' template/ assets/ ajax-loader.gif '); ?>')
		no-repeat center;
	height: 150px;
}
</style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-black-light layout-top-nav fixed">
	<div class="wrapper">
		<header class="main-header">
			<nav class="navbar navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<a
							href="<?php echo base_url('template/').template();?>/index2.html"
							class="navbar-brand"><b>Admin</b>LTE</a>
						<button type="button" class="navbar-toggle collapsed"
							data-toggle="collapse" data-target="#navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse pull-left"
						id="navbar-collapse">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo site_url('beranda')?>">BERANDA</a></li>
							<li class="dropdown"><a href="#" class="dropdown-toggle"
								data-toggle="dropdown">TENTANG KAMI <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo site_url('manajemen')?>">Manajemen</a></li>
									<li><a href="<?php echo site_url('sejarah')?>">Sejarah</a></li>
									<li><a href="<?php echo site_url('visi-misi')?>">Visi Misi</a></li>
									<li><a href="#">KQC Methode</a></li>
									<li><a href="#">Legal Formal</a></li>
									<li><a href="#">Salam Pimpinan</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul></li>
							<li class="dropdown"><a href="#" class="dropdown-toggle"
								data-toggle="dropdown">PROGRAM <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo site_url('pendidikan-dakwah')?>">Pendidikan
											dan Dakwah</a></li>
									<li><a href="#">Sosial dan Kemanusian</a></li>
									<li><a href="#">Pengembangan Masyarakat</a></li>
								</ul></li>
							<li class="dropdown"><a href="#" class="dropdown-toggle"
								data-toggle="dropdown">SEDEKAH <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo site_url('cara-sedekah')?>">Cara Sedekah</a></li>
									<li><a href="#">Konfirmasi Sedekah</a></li>
									<li><a href="#">Jemput Sedekah</a></li>
								</ul></li>
							<li class="active"><a href="<?php echo site_url('artikel')?>">ARTIKEL</a></li>
							<li><a href="#">KQC SCHOOL</a></li>
							<li><a href="<?php echo site_url('hubungi_kami')?>">HUBUNGI KAMI</a></li>

						</ul>

					</div>
					<!-- /.navbar-collapse -->
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown user user-menu">
								<!-- Menu Toggle Button --> <a href="#" class="dropdown-toggle"
								data-toggle="dropdown"> <!-- The user image in the navbar--> <img
									src="<?php echo base_url('template/').template();?>/dist/img/user2-160x160.jpg"
									class="user-image" alt="User Image"> <!-- hidden-xs hides the username on small devices so only the image appears. -->
									<span class="hidden-xs">Alexander Pierce</span>
							</a>
								<ul class="dropdown-menu">
									<!-- The user image in the menu -->
									<li class="user-header"><img
										src="<?php echo base_url('template/').template();?>/dist/img/user2-160x160.jpg"
										class="img-circle" alt="User Image">
										<p>
											Alexander Pierce - Web Developer <small>Member since Nov.
												2012</small>
										</p></li>
									<!-- Menu Body -->
									<li class="user-body">
										<div class="row">
											<div class="col-xs-4 text-center">
												<a href="#">Followers</a>
											</div>
											<div class="col-xs-4 text-center">
												<a href="#">Sales</a>
											</div>
											<div class="col-xs-4 text-center">
												<a href="#">Friends</a>
											</div>
										</div> <!-- /.row -->
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-left">
											<a href="#" class="btn btn-default btn-flat">Profile</a>
										</div>
										<div class="pull-right">
											<a href="#" class="btn btn-default btn-flat">Sign out</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
					<!-- /.navbar-custom-menu -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</header>
		<!-- Full Width Column -->
		<div class="content-wrapper" style="padding-top: 50px">
  <?php echo $contents;?>
  <!-- /.container -->
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="container">
				<div class="row" style="border-bottom: 1px solid #fff;">
					<div class="col-md-6">
						<p>
							<strong>Lorem ipsum represents a</strong> long-held tradition for
							designers, typographers and the like. Some people hate it and
							argue for its demise, but others ignore the hate as they create
							awesome tools to help create filler text for everyone from bacon
							lovers to Charlie Sheen fans.
						</p>
						<address>
							<strong>Admin, Inc.</strong><br> 795 Folsom Ave, Suite 600<br>
							San Francisco, CA 94107<br> Phone: (804) 123-5432<br> Email:
							info@almasaeedstudio.com
						</address>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
							<h3 class="box-title">Modul</h3>
								<ul>
									<li>Phasellus iaculis neque</li>
									<li>Purus sodales ultricies</li>
									<li>Vestibulum laoreet porttitor sem</li>
									<li>Ac tristique libero volutpat at</li>
								</ul>
							</div>
							<div class="col-md-6">
							<h3 class="box-title">Unordered List</h3>
								<ul>
									<li>Phasellus iaculis neque</li>
									<li>Purus sodales ultricies</li>
									<li>Vestibulum laoreet porttitor sem</li>
									<li>Ac tristique libero volutpat at</li>
								</ul>
							</div>
						</div>
						<!-- /.row -->
					</div>
				</div>				
				<marquee><strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed
						Studio</a>.
				</strong> All rights reserved.</marquee>
				
			</div>
			<!-- /.container -->
		</footer>
	</div>
	<!-- ./wrapper -->
	<!-- jQuery 3 -->
	<script
		src="<?php echo base_url('template/').template();?>/bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap 3.3.7 -->
	<script
		src="<?php echo base_url('template/').template();?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script
		src="<?php echo base_url('template/').template();?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script
		src="<?php echo base_url('template/').template();?>/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script
		src="<?php echo base_url('template/').template();?>/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script
		src="<?php echo base_url('template/').template();?>/dist/js/demo.js"></script>
	<script src="<?php echo base_url('template/toast/toastr.js')?>"></script>
	<script type="text/javascript">
        var base_url = "<?php echo base_url();?>";
    </script>
	 <?php include 'js.php';?> 

</body>
</html>