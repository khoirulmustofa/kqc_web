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
              <?php foreach ($kategori_data->result() as $kategori) { ?>
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
</div>