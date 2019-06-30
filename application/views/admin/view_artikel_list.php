<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			 <?php echo $button.' '.$page;?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin')?>"><i
					class="fa fa-dashboard"></i>Dasboard</a></li>
			<li class="active"><?php echo $button.' '.$page?></li>
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
                <?php echo anchor(site_url('admin/artikel/create'),'Tambah '.$page, 'class="btn btn-success"'); ?>
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
								<thead style="font-size: medium;">
									<tr>
										<th>No</th>
										<th>Kategori</th>
										<th>Username</th>
										<th>Judul</th>
										<th>Hari</th>
										<th>Tanggal</th>
										<th>View</th>
										<th>Tag</th>
										<th style="text-align: center">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
        foreach ($artikel_data as $artikel) {
            ?>
                <tr>
										<td><?php echo ++$start ?></td>
										<td><?php echo $artikel->kategori_nama ?></td>
										<td><?php echo $artikel->artikel_username ?></td>
										<td><?php echo $artikel->artikel_judul ?></td>
										<td><?php echo $artikel->artikel_hari ?></td>
										<td><?php echo $artikel->artikel_tanggal ?></td>
										<td><?php echo $artikel->artikel_view ?></td>
										<td><?php echo $artikel->artikel_tag ?></td>
										<td style="text-align: center">
				<?php
            echo anchor(site_url('admin/artikel/update/' . $artikel->artikel_id), 'Update', 'class="btn btn-primary btn-xs"');
            echo ' | ';
            echo anchor(site_url('admin/artikel/delete/' . $artikel->artikel_id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')" class="btn btn-danger btn-xs"');
            ?>
			</td>
									</tr>
                <?php
        }
        ?></tbody>
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