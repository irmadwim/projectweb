<?php
session_start();
include 'koneksi.php';
if (isset($_SESSION['pelanggan'])) {
	$pelanggan = $_SESSION['pelanggan'];
	$cari = $CON->query("SELECT * FROM cart WHERE id_pelanggan = '$pelanggan'");
	$hasil = mysqli_fetch_array($cari);
	$jumlah = mysqli_num_rows($cari);
} else {
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/cart.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">
		<div class="header_inner d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="index.php">FishMart.com</a></div>
			<nav class="main_nav">
				<ul>
					<li><a href="categories.php">shop</a></li>
					<li><a href="contact.php">contact</a></li>
					<?php
					if (!isset($_SESSION['pelanggan'])) {
						echo "<li><a href='login.php'>login</a></li>";
					} else {
						echo "<li><a href='logout.php'>logout</a></li>";
					}
					?>
				</ul>
			</nav>
			<div class="header_content ml-auto">
				<div class="search header_search">
					<form action="#">
						<input type="search" class="search_input" required="required">
						<button type="submit" id="search_button" class="search_button"><img src="images/magnifying-glass.svg" alt=""></button>
					</form>
				</div>
				<div class="shopping">
					<!-- Cart -->
					<a href="cart.php">
						<div class="cart">
							<img src="images/shopping-bag.svg" alt="">
							<div class="cart_num_container">
								<div class="cart_num_inner">
									<div class="cart_num"><?php echo $jumlah; ?></div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"><div></div><div></div><div></div></div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm"><a href="index.php">FishMart.com</a></div>
		<div class="search">
			<form action="#">
				<input type="search" class="search_input menu_mm" required="required">
				<button type="submit" id="search_button_menu" class="search_button menu_mm"><img class="menu_mm" src="images/magnifying-glass.svg" alt=""></button>
			</form>
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="index.php">home</a></li>
				<li class="menu_mm"><a href="airtawar.php">Ikan Air Tawar</a></li>
				<li class="menu_mm"><a href="airlaut.php">Ikan Air Laut</a></li>
				<li class="menu_mm"><a href="seafood.php">Seafood</a></li>
			</ul>
		</nav>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/header4.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_container">
						<div class="home_content">
							<div class="home_title">Shopping Cart</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li>Shopping Cart</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Cart -->

	<div class="cart_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="cart_title">your shopping cart</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="cart_bar d-flex flex-row align-items-center justify-content-start">
						<div class="cart_bar_title_name">Product</div>
						<div class="cart_bar_title_content ml-auto">
							<div class="cart_bar_title_content_inner d-flex flex-row align-items-center justify-content-end">
								<div class="cart_bar_title_price">Price</div>
								<div class="cart_bar_title_quantity">Quantity</div>
								<div class="cart_bar_title_total">Total</div>
								<div class="cart_bar_title_button"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="cart_products">
						<ul>
							<!-- Skrip buat nyari keterangan product -->
							<?php 							
							$q_cart = $CON->query("SELECT * FROM cart WHERE id_pelanggan = '$pelanggan'");
							$i = 1;
							while ($dt_cart = mysqli_fetch_array($q_cart)) {
								
							?>
							<li class=" cart_product d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
								<?php 
								$id_prod = $dt_cart['id_product'];
								$qry = $CON->query("SELECT * FROM product WHERE id_product = '$id_prod'");
								$dt_prod = mysqli_fetch_array($qry);
								?>
								<!-- Product Image -->
								<div style="width: 150px"><img src="images/<?php echo $dt_prod['gambar'] ?>" alt="" class="w-100"></div>
								<!-- Product Name -->
								<div class="cart_product_name"><a href="product.html"><?php echo $dt_prod['nama']; ?></a></div>
								<div class="cart_product_info ml-auto">
									<div class="cart_product_info_inner d-flex flex-row align-items-center justify-content-md-end justify-content-start">
										<!-- Product Price -->
										<div class="cart_product_price">Rp<span id="harga_prod"><?php echo $dt_prod['harga']; ?></span></div>
										<!-- Product Quantity -->
										<div class="product_quantity_container">
											<div class="product_quantity clearfix">
												<input id="quantity_input" type="number" pattern="[0-9]*" value="<?php echo $dt_cart['jumlah']; ?>" onchange="hitung();">
											</div>
										</div>
										<!-- Products Total Price -->
										<div class="cart_product_total"><input type="text" name="total" id="total_harga" readonly></div>
										<!-- Product Cart Trash Button -->
										<div class="cart_product_button">
											<a href="delete.php?id=<?= $dt_prod['id_product']; ?>" class="cart_product_remove"><img src="images/trash.png" alt=""></a>
										</div>
									</div>
								</div>
							</li>
							<?php 
							}
							?>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="cart_control_bar d-flex flex-md-row flex-column align-items-start justify-content-start">
						<a href="categories.php"><button class="button_update cart_button_2 ml-auto">continue shopping</button></a>
						<a href="checkout.php"><button class="button_update cart_button_2 ml-2">proceed to checkout</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="newsletter_content">
			<div class="newsletter_image parallax-window" data-parallax="scroll" data-image-src="images/header5.jpg" data-speed="0.8"></div>
			<div class="container">
				<div class="row options">

					<!-- Options Item -->
					<div class="col-lg-3">
						<div class="options_item d-flex flex-row align-items-center justify-content-start">
							<div class="option_image"><img src="images/option_1.png" alt=""></div>
							<div class="option_content">
								<div class="option_title">30 Days Returns</div>
								<div class="option_subtitle">No questions asked</div>
							</div>
						</div>
					</div>

					<!-- Options Item -->
					<div class="col-lg-3">
						<div class="options_item d-flex flex-row align-items-center justify-content-start">
							<div class="option_image"><img src="images/option_2.png" alt=""></div>
							<div class="option_content">
								<div class="option_title">Free Delivery</div>
								<div class="option_subtitle">On all orders</div>
							</div>
						</div>
					</div>

					<!-- Options Item -->
					<div class="col-lg-3">
						<div class="options_item d-flex flex-row align-items-center justify-content-start">
							<div class="option_image"><img src="images/option_3.png" alt=""></div>
							<div class="option_content">
								<div class="option_title">Secure Payments</div>
								<div class="option_subtitle">No need to worry</div>
							</div>
						</div>
					</div>

					<!-- Options Item -->
					<div class="col-lg-3">
						<div class="options_item d-flex flex-row align-items-center justify-content-start">
							<div class="option_image"><img src="images/option_4.png" alt=""></div>
							<div class="option_content">
								<div class="option_title">24/7 Support</div>
								<div class="option_subtitle">Just call us</div>
							</div>
						</div>
					</div>

				</div>
				<div class="row newsletter_row">
					<div class="col">
						<div class="section_title_container text-center">
							<div class="section_subtitle">only the best</div>
							<div class="section_title">subscribe for a 20% discount</div>
						</div>
					</div>
				</div>
				<div class="row newsletter_container">
					<div class="col-lg-10 offset-lg-1">
						<div class="newsletter_form_container">
							<form action="#">
								<input type="email" class="newsletter_input" required="required" placeholder="E-mail here">
								<button type="submit" class="newsletter_button">subscribe</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="footer_logo"><a href="index.php">FishMart.com</a></div>
					<nav class="footer_nav">
						<ul>
							<li><a href="index.php">home</a></li>
							<li><a href="categories.php">shop</a></li>
							<li><a href="contact.php">contact</a></li>
							<?php
							if (!isset($_SESSION['pelanggan'])) {
								echo "<li><a href='login.php'>login</a></li>";
							} else {
								echo "<li><a href='logout.php'>logout</a></li>";
							}
							?>
						</ul>
					</nav>
					<div class="footer_social">
						<ul>
							<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-reddit-alien" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<div class="copyright"> Copyright &copy;<script>document.write(new Date().getFullYear());</script> This web created <i class="fa fa-heart-o" aria-hidden="true"></i> by <a>Irma Dwi Mulyanti</a></div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/cart_custom.js"></script>
<!-- JS untuk hitung Total -->
<script type="text/javascript">
	$("#total_harga").val($("#harga_prod").text());
	function hitung() {
		var harga = $("#harga_prod").text();
		var jumlah = $("#quantity_input").val();
		var total = harga * jumlah;
		$("#total_harga").val(total);

	}
</script>

<!-- JS Hitung Subtotal -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#h_subtotal").text("159500");
	})
</script>

<!-- JS Hitung Total Akhir -->
<script type="text/javascript">
	$(document).ready(function() {
		var subtt = $("#h_subtotal").text();
		var shipp = $("#h_shipping").text();
		var total_akhir = parseInt(subtt)+parseInt(shipp);
		$("#h_total").text(total_akhir);
	})
</script>
</body>
</html>