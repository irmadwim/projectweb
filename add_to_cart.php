<?php
session_start();
 include 'koneksi.php';?>
<?php 
$product = $_GET['id'];
$pelanggan = $_SESSION['pelanggan'];

$sql = mysqli_query($CON, "SELECT id_product FROM cart WHERE id_product = '$product'  AND id_pelanggan='$pelanggan' ");
$ketemu = mysqli_num_rows($sql);
if ($ketemu==0){
	mysqli_query($CON, "INSERT INTO cart (id_pelanggan, id_product, jumlah ) VALUES ('$pelanggan', '$product', 1) ");
}else{
	mysqli_query($CON, "UPDATE cart SET jumlah = jumlah + 1 WHERE  id_product='$product' AND id_pelanggan='$pelanggan'");
}
echo "<script>alert('Berhasil ditambahkan kedalam keranjang'); location='categories.php';</script>";
?>

<!-- product view -->