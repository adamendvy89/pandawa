<div id="content-center-large">
<div id="box-title">DATA BERITA DINAS</div>
	<div id="box-index">+ INDEXS DATA BERITA DINAS</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("admin_dinas/berita_dinas/set"); ?>
	<input type="text" name="by_nama" placeholder="Cari berdasarkan nama" />
	<input type="submit" value="FILTER" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>
	<?php echo $dt_data_berita_dinas; ?>

</div>
<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>
</div>

