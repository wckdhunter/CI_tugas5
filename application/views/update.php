<form method="POST">
	<input type="hidden" name="id_penjual" value="<?=$data->id_penjual?>">
	<div class="form-group">
	    <label>Nama warung</label>
		<input type="text" name="nama_warung" class="form-control" placeholder="Nama Warung" value="<?=$data->nama_warung?>">
	</div>
	<div class="form-group">
		<label>Nama Penjual</label>
		<input type="text" name="nama_penjual" class="form-control" placeholder="Nama Penjual" value="<?=$data->nama_penjual?>">
	</div>
	<button type="submit" class="btn btn-primary" name="submit" value="1!1">Simpan</button>
</form>