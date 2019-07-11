<div class="container">
	<!-- Content Header (Page header) -->
	<section class="content-header">

		<h1>Hubungi Kami</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
			<li class="active">Hubungi Kami</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-4">
				<div class="box box-success text-center">
					<div class="box-body box-profile">
						<img class="img-responsive" style="width: 100%"
							src="<?php echo base_url('template/').template()?>/dist/img/avatar5.png"
							alt="User Avatar">
					</div>

					<div class="box-footer text-center">
						<p>
							<strong> Kami persilahkan bila ada yang ingin Anda ketahui atau
								tanyakan perihal Kampung Qur'an Cikarang melalui Form Hubungi
								Kami ini</strong> <br>Anda dapat juga menghubungi atau SMS kami
							melalui no.telp serta dapat melalui email
						</p>

					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="box box-success">
					<div class="box-body">
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
									<label>Telp/HP</label> <input type="text" class="form-control"
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
									<label>Perihal</label> <input type="text" class="form-control"
										id="komentar_email" name="komentar_email" required="required"
										placeholder="Masukan Perihal ...">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Pesan</label>
									<textarea class="form-control" id="komentar_isi"
										required="required" name="komentar_isi" rows="3"
										placeholder="Masukan Pesan ..."></textarea>
								</div>
								<button id="kirim_komentar" class="btn btn-success pull-right">Kirim
									Pesan Anda</button>
							</div>
						</form>
					</div>
					<div class="box-footer alert-warning">
						<p>
						Semua isian diatas wajib Anda isi untuk memudahkan kami dalam memberikan jawaban atas pertanyaan atau masukan yang Anda berikan. Terimakasih atas partisipasi Anda
						</p>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>