<?php
session_start();
include 'koneksi.php';
if (isset($_SESSION['pelanggan'])) {
	$pelanggan = $_SESSION['pelanggan'];
	$cari = $CON->query("SELECT * FROM cart WHERE id_pelanggan = '$pelanggan'");
	$hasil = mysqli_fetch_array($cari);
	$jumlah = mysqli_num_rows($cari);
} else {
	$jumlah=0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Seafood</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="plugins/malihu-custom-scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/categories.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
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
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/header6.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_container">
						<div class="home_content">
							<div class="home_title">Seafood</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><a href="seafood.php">Seafood</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col-12">
					
					<!-- Sidebar Left -->

					<div class="sidebar_left clearfix">

						<!-- Categories -->
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<div class="sidebar_section_content">
								<ul>
									<li><a href="airlaut.php">Ikan Laut (3)</a></li>
									<li><a href="aiirtawar.php">Ikan Air Tawar (5)</a></li>
									<li><a href="seafood.php">Seafood (4)</a></li>
								</ul>
							</div>
						</div>
						<!-- Best Sellers -->

						<div class="sidebar_section">
							<div class="sidebar_title">Best Sellers</div>
							<div class="sidebar_section_content bestsellers_content">
								<ul>
									<!-- Best Seller Item -->
									<?php $ambil=$CON->query("SELECT * FROM product  LIMIT 0,2"); ?>
									<?php while ($pecah=$ambil->fetch_assoc()){ ?>
									<li class="clearfix">

										<div class="best_image"><img src="images/<?php echo $pecah['gambar']?>" width="300px" class="img-thumbnail"></div>
										<div class="best_content">
											<div class="product_name"><a href="product.php?id_product=<?php echo $pecah['id_product'];?>"><?php echo $pecah['nama'] ?></a></div>
											<div class="best_price"><?php echo $pecah['harga'];?></div>
										</div>
										<div class="best_buy">+</div>
									</li>
									<?php } ?>
									
								</ul>
							</div>
						</div>
					</div>
					<div class="current_page">Seafood</div>
				</div>
				<div class="col-12">
					<div class="product_sorting clearfix">
						<div class="view">
							<div class="view_box box_view"><i class="fa fa-th-large" aria-hidden="true"></i></div>
							<div class="view_box detail_view"><i class="fa fa-bars" aria-hidden="true"></i></div>
						</div>
						<div class="sorting">
							<ul class="item_sorting">
								<li>
									<span class="sorting_text">Show all</span>
									<i class="fa fa-caret-down" aria-hidden="true"></i>
									<ul>
										<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Show All</span></li>
										<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
										<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'><span>Stars</span></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="row products_container">
				
				<div class="col">
					
					<!-- Products -->

					<div class="product_grid">

						<!-- Product -->
						<?php
							$query=mysqli_query($CON,"SELECT * FROM product WHERE jenis_product='ikanairtawar'");
							while($data = mysqli_fetch_array($query)){
						?>
						<div class="product">
							<div class="product_image"><img src="images/<?php echo $data['gambar'] ?>" alt=""></div>
							<div class="rating rating_<?php echo $data['rating'] ?>" data-rating="4">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
							<div class="product_content clearfix">
								<div class="product_info">
									<div class="product_name"><a href="product.php?id_product=<?php echo $data['id_product'];?>"><?php echo $data['nama'] ?></a></div>
									<div class="product_price">Rp<?php echo $data ['harga'] ?></div>
								</div>
								<div class="product_options">
									<div class="product_buy product_option"><img src="images/shopping-bag-white.svg" alt=""></div>
									<div class="product_fav product_option">+</div>
								</div>
							</div>
						</div>
						<?php
							}
						?>
					</div>
				</div>
					
			</div>

			<div class="row page_num_container">
				<div class="col text-right">
					<ul class="page_nums">
						<li><a href="#">01</a></li>
						<li class="active"><a href="#">02</a></li>
						<li><a href="#">03</a></li>
						<li><a href="#">04</a></li>
						<li><a href="#">05</a></li>
					</ul>
				</div>
			</div>

		</div>
		
		
	<!-- Newsletter -->

	<div class="newsletter">
		<div class="newsletter_content">
			<div class="newsletter_image" style="background-image:url(images/header5.jpg)"></div>
			<div class="container">
				<div class="row">
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
					<div class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> This web created <i class="fa fa-heart-o" aria-hidden="true"></i> by Irma Dwi Mulyanti</a></div>
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
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/malihu-custom-scrollbar/jquery.mCustomScrollbar.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/categories_custom.js"></script>
</body>
</html>