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
                <?php echo anchor(site_url('admin/program/create'), 'Tambah '.$page, 'class="btn btn-success"'); ?>
            </div>
							<div class="col-md-4 text-center">
								<div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
							</div>
							<div class="col-md-1 text-right"></div>
							<div class="col-md-3 text-right">
								<form action="<?php echo site_url('admin/program'); ?>"
									class="form-inline" method="get">
									<div class="input-group">
										<input type="text" class="form-control" name="cari"
											value="<?php echo $cari; ?>"> <span class="input-group-btn">
                            <?php
                            if ($cari != '') {
                                ?>
                                    <a
											href="<?php echo site_url('admin/program'); ?>"
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
										<th>Nama</th>
										<th>Kategori</th>
										<th>Status</th>
										<th style="text-align:center">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
        foreach ($program_data as $program) {
            ?>
                <tr>
									<td><?php echo ++$start ?></td>
									<td><?php echo $program->program_nama ?></td>
									<td><?php echo $program->program_kategori ?></td>
									<td><?php echo $program->program_status ?></td>
									<td style="text-align: center">
				<?php
            echo anchor(site_url('admin/program/update/' . $program->program_id), 'Update', 'class="btn btn-primary btn-xs"');
            echo ' | ';
            echo anchor(site_url('admin/program/delete/' . $program->program_id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')" class="btn btn-danger btn-xs"');
            ?>
			</td>
								</tr>
                <?php
        }
        ?>
        </tbody>
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