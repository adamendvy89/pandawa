<div id="content-center">
<div id="box-title">DATA SEKOLAH</div>
	<div id="box-index">+ INDEXS DATA SEKOLAH</div>
	<div id="box-line"></div>
	<div class="cleaner_h20"></div>
	<?php echo form_open("web/data_sekolah/set"); ?>
	<select name="id_jenjang_pendidikan">
			<option value="semua">Semua Jenjang Pendidikan</option>
		<?php foreach($dt_pendidikan_dropdown->result_array() as $dt_pd)
		{
			if($this->session->userdata("by_id_jenjang_pendidikan")==$dt_pd["id_super_jenjang_pendidikan"])
			{
		?>
			<option value="<?php echo $dt_pd['id_super_jenjang_pendidikan']; ?>" selected="selected"><?php echo $dt_pd['pendidikan']; ?></option>
		<?php 
			}
			else
			{
		?>
			<option value="<?php echo $dt_pd['id_super_jenjang_pendidikan']; ?>"><?php echo $dt_pd['pendidikan']; ?></option>
		<?php } } ?>
	</select>
	<input type="submit" value="FILTER" />
	<?php echo form_close(); ?>
	<div class="cleaner_h20"></div>
	
	<?php echo $dt_index_data_sekolah; ?>
</div>
