<h2>Add Product</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>
		<div class="form-group">
		<label>Rating</label>
		<input type="number" class="form-control" name="rating">
	</div>
	<div>
		<div class="form-group">
		<label>Jenis Product</label>
		<input type="text" class="form-control" name="jenis_product">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Gambar</label>
		<input type="file" class="form-control" name="gambar">
	</div>
	<button class="btn btn-primary" name="save">Save</button>
</form>
<?php
if (isset($_POST['save'])) 
{
	$nama = $_FILES['gambar']['name'];
	$lokasi=$_FILES['gambar']['tmp_name'];
	move_uploaded_file($lokasi, "gambar/".$nama);
	$CON->query("INSERT INTO product (nama,harga,gambar) VALUES('$_POST[nama]','$_POST[harga]','$nama')");
	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=product'>";
}
?>