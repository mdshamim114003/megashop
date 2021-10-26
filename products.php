<!--Header file Include-->
<?php $page_name = "shop"; ?>
<?php include "inc/header.php"; ?>

<section class="pdt-100 pdb-70 solitude-bg">
    <div class="container">

        <div class="page-title text-center mb-40">
			<?php
				if(isset($_GET['category'])){
					$product_category_id = $_GET['category'];
					$product_category_name_query = mysqli_query($conn, "SELECT product_category_name FROM `product_category` WHERE product_category_id=$product_category_id");
					$product_category_name_row = mysqli_fetch_assoc($product_category_name_query);
					echo "<h2>".$product_category_name_row['product_category_name']."</h2>";
				}else{
					echo "<h2>ALL Products</h2>";
				}
			?>
        </div>
        <div class="row">
            <?php

				// Product Category Data from Database
					if(isset($_GET['category'])){
						$product_category_id = $_GET['category'];
						$products_query = mysqli_query($conn, "SELECT * FROM `products` WHERE product_category_id=$product_category_id");
					}elseif(isset($_GET['search_button'])){
						$search_text = $_GET['search_text'];
						$products_query = mysqli_query($conn, "SELECT * FROM `products` WHERE product_name LIKE '%$search_text%'");
					}elseif(isset($_GET['user_id'])){
						$user_id = $_GET['user_id'];
						$products_query = mysqli_query($conn, "SELECT * FROM `products` WHERE product_user_id = $user_id");
					}
					else{
						$products_query = mysqli_query($conn, "SELECT * FROM `products`");
					}

					if(mysqli_num_rows($products_query) == 0){
						echo "<h2 class='text-danger'>Sorry! No Products Found.</h2>";
					}else{
						while($products_row = mysqli_fetch_assoc($products_query)){
				?>
				<div class="col-md-3 col-sm-6 mb-30">
					<div class="product-wrapper text-center" itemscope itemtype="http://schema.org/Product">
						<div class="product-image">
							<a href="product-details.php?product_id=<?php echo $products_row['product_id']; ?>">
								<img itemprop="image" src="<?php echo $products_row['product_image']; ?>" class="img-responsive" alt="">
							</a>
						</div>
						<div class="product-entry">
							<div class="product-title" itemprop="name">
								<h5><a href="product-details.php?product_id=<?php echo $products_row['product_id']; ?>"><?php echo $products_row['product_name']; ?></a></h5>
							</div>
							<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
								<span itemprop="priceCurrency" content="USD">৳ </span><span itemprop="price" content="1000.00"><?php echo $products_row['product_price'] ?></span>
							</div>
							<?php
								if (isset($_SESSION['user_type'])) {
									if ($_SESSION['user_type'] == 'admin') {
							?>
							<div class="category-top">
								<a href="inc/edit-product.php?product_id=<?php echo $products_row['product_id']; ?>" class="btn btn-primary pull-left">Edit</a>
								<a href="inc/delete-product.php?product_id=<?php echo $products_row['product_id']; ?>" class="btn btn-primary pull-right">Delete</a>
							</div>
							<?php } } ?>
							<div style="clear: both;"></div>
							<div class="product-view-btn">
								<a href="product-details.php?product_id=<?php echo $products_row['product_id']; ?>">view details</a>
							</div>
						</div>
					</div>
				</div>
				<?php } } ?>
        </div>
    </div>
</section>


<!--Footer file Include-->
<?php include "inc/footer.php"; ?>