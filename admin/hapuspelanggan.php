<?php
$ambil = $CON->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$CON->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
echo "<script>alert('Pelanggan ini telah terhapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";
?>