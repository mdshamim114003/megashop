<?php include "inc/dbconnect.php"; ?>
<?php
	switch ($page_name) {
		case 'home':
			$home = "active";
			break;

		case 'shop':
			$shop = "active";
			break;

		case 'team':
			$team = "active";
			break;

		case 'about':
			$about = "active";
			break;

		case 'contact':
			$contact = "active";
			break;
	}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from trendytheme.net/demo/gadget/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 May 2019 14:19:44 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="gadgetfloor affilate marketing template">
	<meta name="keywords" content="corporate, affilate marketing, products, business, creative, agency">
	<meta name="author" content="trendytheme.net">
	<title>MegaShop | Affiliate Marketing Website</title>

	<link rel="shortcut icon" href="assets/img/ico/favicon.png">

	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/img/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/img/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/img/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="assets/img/ico/apple-touch-icon-57-precomposed.png">
	<link href="https://fonts.googleapis.com/css?family=Vidaloka" rel="stylesheet">
	<link rel="stylesheet" href="assets/fonts/aileron/stylesheet.css">

	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

	<link rel="stylesheet" href="assets/menuzord/css/menuzord.css">
	<link rel="stylesheet" href="assets/menuzord/css/skins/menuzord-strip.css">

	<link rel="stylesheet" type="text/css" href="assets/revolution/css/settings.css">

	<link rel="stylesheet" type="text/css" href="assets/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="assets/revolution/css/navigation.css">

	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" href="assets/css/colors/color1.css">









	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body id="top">


	<section class="header-top-bar hidden-xs">
		<div class="container">
			<div class="logo">
				<a href="index.php"><img src="assets/img/logo.png" alt=""></a>
			</div>
		</div>
	</section>

	<header class="main-navigation">
		<div class="container">
			<div class="menuzord">
				<a href="index.php" class="menuzord-brand visible-xs"><img src="assets/img/logo-top.png" alt=""></a>
				<ul class="menuzord-menu">
					<li class="<?php echo $home; ?>"><a href="index.php">Home</a></li>
					<li class="<?php echo $shop; ?>"><a href="products.php">Shop</a></li>
					<li><a href="javascript:void(0)">Collections</a>
						<div class="megamenu">
							<div class="megamenu-row">
								<div class="col3">
									<ul class="list-unstyled">
										<li>
											<h2>Mobile</h2>
										</li>
										<?php

										// Product Category Data from Database
											$product_category_query = mysqli_query($conn, "SELECT * FROM product_category WHERE product_main_category='mobile'");

											while($product_category_row = mysqli_fetch_assoc($product_category_query)){

										?>
										<li><a href="products.php?category=<?php echo $product_category_row['product_category_id'] ?>"><?php echo $product_category_row['product_category_name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col3">
									<ul class="list-unstyled">
										<li>
											<h2>Electronics</h2>
										</li>
										<?php

										// Product Category Data from Database
											$product_category_query = mysqli_query($conn, "SELECT * FROM product_category WHERE product_main_category='electronics'");

											while($product_category_row = mysqli_fetch_assoc($product_category_query)){

										?>
										<li><a href="products.php?category=<?php echo $product_category_row['product_category_id'] ?>"><?php echo $product_category_row['product_category_name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col3">
									<ul class="list-unstyled">
										<li>
											<h2>Vehicles</h2>
										</li>
										<?php

										// Product Category Data from Database
											$product_category_query = mysqli_query($conn, "SELECT * FROM product_category WHERE product_main_category='vehicles'");

											while($product_category_row = mysqli_fetch_assoc($product_category_query)){

										?>
										<li><a href="products.php?category=<?php echo $product_category_row['product_category_id'] ?>"><?php echo $product_category_row['product_category_name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
								<div class="col3">
									<ul class="list-unstyled">
										<li>
											<h2>Home & Living</h2>
										</li>
										<?php

										// Product Category Data from Database
											$product_category_query = mysqli_query($conn, "SELECT * FROM product_category WHERE product_main_category='living'");

											while($product_category_row = mysqli_fetch_assoc($product_category_query)){

										?>
										<li><a href="products.php?category=<?php echo $product_category_row['product_category_id'] ?>"><?php echo $product_category_row['product_category_name'] ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="megamenu-row">
								<div class="col6">
									<a href="#"><img src="assets/img/megameun-item-1.jpg" alt="" class="img-responsive"></a>
								</div>
								<div class="col6">
									<a href="#"><img src="assets/img/megameun-item-2.jpg" alt="" class="img-responsive"></a>
								</div>
							</div>
						</div>
					</li>
					<li class="<?php echo $team; ?>"><a href="team.php">Team</a></li>
					<li class="<?php echo $about; ?>"><a href="about.php">About</a></li>
					<li class="<?php echo $contact; ?>"><a href="contact.php">Contact</a></li>
					<li id="search_form">
						<form action="products.php" method="get">
							<div class="input-group">
								<input type="text" class="form-control" name="search_text">
								<span class="input-group-addon"><input type="submit" name="search_button" value="Search"></span>
							</div>
						</form>
					</li>
				</ul>
				<ul class="menuzord-menu right-menu menu-right">
					<li><a href="javascript:void(0)">
						<?php
							if (isset($_SESSION['user_name'])) {
								echo $_SESSION['user_name'];
							}else{
								echo "Join US";
							}
						?>
					</a>
						<div class="megamenu login">
							<div class="megamenu-row">
								<div class="col12">
									<ul class="list-unstyled">
										<?php
											if (isset($_SESSION['user_name'])) {
												if ($_SESSION['user_type'] == 'admin') {
													$user_id = $_SESSION['user_id'];
													echo "<li><a href='products.php?user_id=$user_id'>My Products</a></li>";
													echo "<li><a href='inc/add-product.php'>Add a Product</a></li>";
													echo "<li><a href='inc/add-product-category.php'>Add a Product Category</a></li>";
													echo "<hr>";
												}
												echo "<li><a href='inc/logout.php'>Log Out</a></li>";
											}else{
												echo "<li><a href='inc/login.php'>Login</a></li>";
												echo "<li><a href='inc/registration.php'>Registration</a></li>";
											}
										?>
									</ul>
								</div>
							</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</header>

