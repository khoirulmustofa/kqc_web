<div class="container">
	<section class="content-header">
		<h1>
			<i class="fa fa-fw fa-credit-card"></i>SEDEKAH
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url()?>"><i class="fa fa-dashboard"></i>
					Beranda</a></li>
			<li class="active"><?php echo $page;?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">No Rekening Sedekah</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool"
							data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<div class="col-md-12 hover-black">
						<div class="box-body table-responsive no-padding">
							<table class="table table-hover table-striped">
								<thead style="font-size: medium;">
									<tr>
										<th>No</th>
										<th>Nama Bank</th>
										<th>No. Rekening</th>
									</tr>
								</thead>
								<tbody>
								<?php
        $start = 0;
        foreach ($rekening_sedekah_data as $rekening_sedekah) {
            ?>
                <tr>
										<td><?php echo ++$start ?></td>
										<td><?php echo $rekening_sedekah->rekening_sedekah_nama_bank ?></td>
										<td><?php echo $rekening_sedekah->rekening_sedekah_no_rekening ?></td>
									</tr>
                <?php
        }
        ?>
								
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Sedekah Lewat Jemput Sedakah</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool"
							data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<div class="col-md-12 hover-black">
					<a href="https://api.whatsapp.com/send?phone=628981234567&text=Halo%20saya%20mau%20sedekah"><img class="img-responsive" src="https://pppa.or.id/img/program/jemput%20sedekah%20pppa%20daarul%20quran%20.jpg"></a>
					</div>
				</div>
			</div>

			<!-- <div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Sedekah Lewat Transfer ATM</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool"
							data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<div class="col-md-6 hover-black">
						<ul class="timeline">
							<li class="time-label"><span class="bg-green"> Lewat ATM BRI ke
									rekening sesama BRI </span></li>

							<li><i class="fa fa-fw fa-flag bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Masukkan kartu ATM ke dalam mesin
										ATM seperti biasa.</div>
								</div></li>
							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Untuk setelan bahasa yang akan
										digunakan, silahkan sesuaikan saja. Lalu pilih Lanjutkan.</div>
								</div></li>

							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Masukkan nomor PIN ATM BRI.</div>
								</div></li>

							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Pilih Transaksi Lain.</div>
								</div></li>

							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Pilih Transfer.</div>
								</div></li>

							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Pilih BRI.</div>
								</div></li>

							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Masukkan nomor rekening BRI yang
										dituju, lalu pilih benar (jika rekening sudah benar).</div>
								</div></li>

							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Masukkan jumlah uang yang akan di
										transfer, pilih benar (pastikan jumlah uangnya sudah benar).</div>
								</div></li>

							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">
										Nanti akan ada informasi transfer yang terdiri dari rekening
										anda, rekening tujuan, nama pemilik rekening tujuan serta
										jumlah uang yang di trasnfer. Pijit saja tombol <strong>YA</strong>,
										jika informasi tersebut sudah benar dan tunggu sampai
										prosesnya selesai.
									</div>
								</div></li>

							<li><i class="fa fa-fw fa-check-circle bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Selesai.</div>
								</div></li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="timeline">
							<li class="time-label"><span class="bg-green">Lewat ATM BRI ke
									Bank Lain </span></li>

							<li><i class="fa fa-fw fa-flag bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Masukkan kartu ATM ke dalam mesin
										ATM seperti biasa.</div>
								</div></li>
							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Untuk setelan bahasa yang akan
										digunakan, silahkan sesuaikan saja. Lalu pilih Lanjutkan.</div>
								</div></li>

							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Masukkan nomor PIN ATM BRI.</div>
								</div></li>

							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Pilih Transaksi Lain.</div>
								</div></li>

							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Pilih Transfer.</div>
								</div></li>

							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Pilih BRI.</div>
								</div></li>

							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Masukkan nomor rekening BRI yang
										dituju, lalu pilih benar (jika rekening sudah benar).</div>
								</div></li>

							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Masukkan jumlah uang yang akan di
										transfer, pilih benar (pastikan jumlah uangnya sudah benar).</div>
								</div></li>

							<li><i class="fa fa-fw fa-arrow-down bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">
										Nanti akan ada informasi transfer yang terdiri dari rekening
										anda, rekening tujuan, nama pemilik rekening tujuan serta
										jumlah uang yang di trasnfer. Pijit saja tombol <strong>YA</strong>,
										jika informasi tersebut sudah benar dan tunggu sampai
										prosesnya selesai.
									</div>
								</div></li>

							<li><i class="fa fa-fw fa-check-circle bg-green"></i>
								<div class="timeline-item">
									<div class="timeline-body">Selesai.</div>
								</div></li>
						</ul>
					</div>
				</div>
			</div> -->


		</div>
	</section>
</div>
