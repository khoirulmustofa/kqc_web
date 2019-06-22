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
				<div class="box">
					<div class="box-body">
						<div class="box-body table-responsive no-padding">
							<table class="table table-bordered table-hover">
								<tr>
                <th>No</th>
		<th>Kategori Id</th>
		<th>Artikel Username</th>
		<th>Artikel Judul</th>
		<th>Artikel Judul Seo</th>
		<th>Artikel Isi</th>
		<th>Artikel Hari</th>
		<th>Artikel Tanggal</th>
		<th>Artikel Gambar</th>
		<th>Artikel View</th>
		<th>Artikel Tag</th>
		<th>Action</th>
            </tr><?php
            foreach ($artikel_data as $artikel)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $artikel->kategori_id ?></td>
			<td><?php echo $artikel->artikel_username ?></td>
			<td><?php echo $artikel->artikel_judul ?></td>
			<td><?php echo $artikel->artikel_judul_seo ?></td>
			<td><?php echo $artikel->artikel_isi ?></td>
			<td><?php echo $artikel->artikel_hari ?></td>
			<td><?php echo $artikel->artikel_tanggal ?></td>
			<td><?php echo $artikel->artikel_gambar ?></td>
			<td><?php echo $artikel->artikel_view ?></td>
			<td><?php echo $artikel->artikel_tag ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('artikel/read/'.$artikel->artikel_id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('artikel/update/'.$artikel->artikel_id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('artikel/delete/'.$artikel->artikel_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
						</div>
					</div>
					<div class="box-footer">Footer</div>
				</div>
			</div>
		</div>
	</section>
</div>