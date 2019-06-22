<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Blank page <small>it all starts here</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Examples</a></li>
			<li class="active">Blank page</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-success">
					<div class="box-header">
						<div class="row">
							<div class="col-md-4">
                <?php echo anchor(site_url('admin/artikel/create'),'Tambah Artikel Baru', 'class="btn btn-success"'); ?>
            </div>
							<div class="col-md-4 text-center">
								<div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
							</div>
							<div class="col-md-1 text-right"></div>
							<div class="col-md-3 text-right">
								<form action="<?php echo site_url('admin/artikel'); ?>"
									class="form-inline" method="get">
									<div class="input-group">
										<input type="text" class="form-control" name="cari"
											value="<?php echo $cari; ?>"> <span class="input-group-btn">
                            <?php
                            if ($cari != '') {
                                ?>
                                    <a
											href="<?php echo site_url('admin/artikel'); ?>"
											class="btn btn-default">Reset</a>
                                    <?php
                            }
                            ?>
                          <button class="btn btn-info" type="submit">Cari</button>
										</span>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="box-body">

						<div class="box-body table-responsive no-padding">
							<table class="table table-bordered table-striped table-hover">
								<tr>
									<th>No</th>
									<th>Kategori</th>
									<th>Artikel Username</th>
									<th>Artikel Judul</th>
									<th>Artikel Hari</th>
									<th>Artikel Tanggal</th>
									<th>Artikel View</th>
									<th>Artikel Tag</th>
									<th>Action</th>
								</tr><?php
        foreach ($artikel_data as $artikel) {
            ?>
                <tr>
									<td width="80px"><?php echo ++$start ?></td>
									<td><?php echo $artikel->kategori_nama ?></td>
									<td><?php echo $artikel->artikel_username ?></td>
									<td><?php echo $artikel->artikel_judul ?></td>
									<td><?php echo $artikel->artikel_hari ?></td>
									<td><?php echo $artikel->artikel_tanggal ?></td>
									<td><?php echo $artikel->artikel_view ?></td>
									<td><?php echo $artikel->artikel_tag ?></td>
									<td style="text-align: center" width="200px">
				<?php
            echo anchor(site_url('admin/artikel/update/' . $artikel->artikel_id), 'Update','class="btn btn-primary btn-xs"');
            echo ' | ';
            echo anchor(site_url('admin/artikel/' . $artikel->artikel_id), 'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')" class="btn btn-danger btn-xs"');
            ?>
			</td>
								</tr>
                <?php
        }
        ?>
        </table>
						</div>
					</div>
					<div class="box-footer clearfix">
						<div class="col-md-6">
							<a class="btn bg-navy">Total Record : <?php echo $total_rows ?></a>
						</div>
						<div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>