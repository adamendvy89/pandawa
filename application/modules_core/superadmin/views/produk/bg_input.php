
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1>Tambah Produk</h1>
				</div>
				
				<div class="input-append">
				<?php echo form_open("superadmin/produk/set"); ?>
				<input type="search" class="span2" id="appendedInputButton" name="by_nama" placeholder="Cari berdasarkan judul" /><input type="submit" class="btn btn-primary" type="button" value="Filter">
				<?php echo form_close(); ?>
				</div>
				
				<?php echo $this->breadcrumb->output(); ?>
					
				<?php echo form_open_multipart("superadmin/produk/simpan"); ?>

          <legend>Penambahan Data Produk</legend>
          <table class="table">
			<tr>
			  <td>Pilih Kategori</td>
			  <td>
			    <select name="kategori" >

			    </select>
			  </td>
              <td class="trInformation">&laquo; Silakan memilih kategori Produk</td>
			</tr>
			<tr>
			  <td>Nama Produk</td>
			  <td><input type="text" style="height:28px;" name="nama" size="30"  value="<?php echo $nama;?>"></td>
			  <td class="trInformation">&laquo; Silakan isi nama Produk</td>
			</tr>
			<tr>
			  <td>Tipe Produk</td>
			  <td><input type="text" style="height:28px;" name="tipe" size="30"  value="<?php echo $tipe_p;?>"></td>
			  <td class="trInformation">&laquo; Silakan isi tipe Produk</td>
			</tr>
			<tr>
			  <td>Harga Jual</td>
			  <td><input type="text" style="height:28px;" name="harga" size="30"  value="<?php echo $harga;?>"></td>
			  <td class="trInformation">&laquo; Isi harga dengan bilangan integer</td>
			</tr>
			<tr>
			  <td>Harga Beli</td>
			  <td><input type="text" style="height:28px;" name="harga_beli" size="30"  value="<?php echo $harga_beli;?>"></td>
			  <td class="trInformation">&laquo; Isi harga dengan bilangan integer</td>
			</tr>
			<tr>
			  <td>Gambar</td>
			  <td><input type="file" style="height:28px;" name="userfile" size="24" ></td>
              <td class="trInformation">&laquo; Silahkan masukan gambar Produk</td>
			</tr>
			<tr>
			  <td>Stok</td>
			  <td><input type="text" style="height:28px;" name="stok" size="30"  value="<?php echo $stok;?>"></td>
			  <td class="trInformation">&laquo; Masukan jumlah stok Produk ini</td>
			</tr>
			<tr>
			  <td>Diskon</td>
			  <td><input type="text" style="height:28px;" name="diskon" size="30"  value="<?php echo $diskon;?>"></td>
			  <td class="trInformation">&laquo; Masukan diskon Produk ini</td>
			</tr>
            <tr>
			  <td colspan="3"> Deskripsi <br /><br />
			  <textarea name="deskripsi" id="alamat" cols="50" rows="6" ><?php echo $deskripsi;?></textarea></td>
            </tr>
			<tr>
			  <td colspan="3" align="center">
                <input type="submit" name="s_tipe" value="Tambah" class="btn btn-info">
				<input type="reset" value="Reset" class="btn btn-info">
			  </td>
			</tr>
		  </table>
		
				<?php echo form_close(); ?>
				<div class="cleaner_h20"></div>
					
			</section>