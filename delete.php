<?php 
include 'koneksi.php';
$pro = $_GET['id'];
mysqli_query($CON, "DELETE FROM cart WHERE id_product='$pro'");
echo "<script>alert('produk berhasil dihapus dari cart');location='cart.php';</script>";
 ?>