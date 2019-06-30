<div class="col-md-4">

	<div class="box box-success">
		<div class="box-body">
		<form action="<?php echo $action?> " method="get">
			<div class="input-group">
				<input type="text" name="cari" id="cari" class="form-control" value="<?php echo $cari; ?>"
					placeholder="Silahkan cari disini ..."> <span
					class="input-group-btn">
					<button id="btn_cari" type="submit"
						class="btn btn-success btn-flat">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
			</form>
		</div>
	</div>

	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">Kategori :</h3>
		</div>
		<div class="box-body">
			<div class="box-footer no-padding">
              <ul class="nav nav-stacked">
              <?php foreach ($kategori_data as $kategori) { ?>
                <li ><a class="btn bg-olive" href="<?php echo site_url('artikel/kategori/').$kategori->kategori_seo ?>"><?php echo ucwords($kategori->kategori_nama)?></a></li>
                <?php }?>               
              </ul>
            </div>
			
		</div>
	</div>

	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">Tag :</h3>
		</div>
		<div class="box-body">
		<?php
            foreach ($tag_data as $tag)
            {
                ?>
			<a href="<?php echo site_url('artikel/tag/').$tag->tag_seo ?>" class="btn btn bg-purple" style="margin: 5px;"><?php echo ucwords($tag->tag_nama) ?></a> <?php
            }
            ?>
		</div>
	</div>
	
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">
				<i class="fa fa-tag"></i> Highlight
			</h3>
		</div>
		<div class="box-body">
			<div id="carousel-example-generic" class="carousel slide"
				data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0"
						class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"
						class=""></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"
						class=""></li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img class="img-responsive" style="width: 100%;" src="<?php echo site_url('template/assets/hl1.png')?>"
							alt="First slide">

						<div class="carousel-caption">
							<p>
								<strong> Kami persilahkan bila ada yang ingin Anda ketahui atau
									tanyakan perihal Kampung Qur'an Cikarang melalui Form Hubungi
									Kami ini</strong> <br>Anda dapat juga menghubungi atau SMS kami
								melalui no.telp serta dapat melalui email
							</p>
						</div>
					</div>
					<div class="item">
						<img  class="img-responsive" style="width: 100%;"src="<?php echo site_url('template/assets/hl1.png')?>"
							alt="Second slide">

						<div class="carousel-caption">
							<p>
								<strong> Kami persilahkan bila ada yang ingin Anda ketahui atau
									tanyakan perihal Kampung Qur'an Cikarang melalui Form Hubungi
									Kami ini</strong> <br>Anda dapat juga menghubungi atau SMS kami
								melalui no.telp serta dapat melalui email
							</p>
						</div>
					</div>
					<div class="item">
						<img class="img-responsive" style="width: 100%;" src="<?php echo site_url('template/assets/hl1.png')?>"
							alt="Third slide">

						<div class="carousel-caption">
							<p>
								<strong> Kami persilahkan bila ada yang ingin Anda ketahui atau
									tanyakan perihal Kampung Qur'an Cikarang melalui Form Hubungi
									Kami ini</strong> <br>Anda dapat juga menghubungi atau SMS kami
								melalui no.telp serta dapat melalui email
							</p>
						</div>
					</div>
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
</div>