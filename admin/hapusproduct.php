<?php
$ambil = $CON->query("SELECT * FROM product WHERE id_product='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$gambar = $pecah['gambar'];
if (file_exists("../gambar/$gambar"))
{
	unlink("../gambar/$gambar");
}

$CON->query("DELETE FROM product WHERE id_product='$_GET[id]'");
echo "<script>alert('Produk Telah Terhapus');</script>";
echo "<script>location='index.php?halaman=product';</script>";
?>