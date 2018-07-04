<h2>Ubah Product</h2>
<?php
$ambil = $CON->query("SELECT * FROM product WHERE id_product='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Product</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama']?>;">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga']?>;">
	</div>
	<div class="form-group">
		<label>Rating</label>
		<input type="number" class="form-control" name="rating" value="<?php echo $pecah['rating']?>;">
	</div>
	<div class="form-group">
		<label>Jenis Product</label>
		<input type="text" class="form-control" name="jenis_product" value="<?php echo $pecah['jenis_product']?>;">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"><?php echo $pecah['deskripsi'];?></textarea>
	</div>
	<div class="form-group">
		<img src="../images/<?php $pecah['gambar']?>" width="200px">
	</div>
	<div class="form-group">
		<label>Ganti Gambar</label>
		<input type="file" name="gambar" class="form-control">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php
if (isset($_POST['ubah']))
{
	$id = $_GET['id'];
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$rating = $_POST['rating'];
	$jenis = $_POST['jenis_product'];
	$deskrip = $_POST['deskripsi'];
	$namagambar=$_FILES['gambar']['nama'];
	$lokasigambar = $_FILES['gambar']['tmp_nama'];
	if (!empty($lokasigambar))
	{
		move_uploaded_file($lokasigambar, "../images/$namagambar");
		$CON->query("UPDATE product SET nama = '$nama', harga = '$harga', rating = '$rating', jenis_product = '$jenis', deskripsi = '$deskrip', gambar='$namagambar' WHERE id_product='$id'");
	}
	else
	{
		$CON->query("UPDATE product SET nama = '$nama', harga = '$harga', rating = '$rating', jenis_product = '$jenis', deskripsi = '$deskrip' WHERE id_product='$id'");
	}
	echo "<script>alert('Data Product Telah Diubah');</script>";
	echo "<script>location='index.php?halaman=product';</script>";
}
?>