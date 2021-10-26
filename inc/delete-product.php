<?php
	include('dbconnect.php');
	if (isset($_SESSION['user_type'])) {
		if ($_SESSION['user_type'] == 'admin') {
			if (isset($_GET['product_id'])) {
				$product_id = $_GET['product_id'];
				$query = mysqli_query($conn, "DELETE FROM products WHERE product_id = $product_id");
				if ($query) {
					echo "Product Deleted Successfully... Redirecting to homepage in 3seconds";
					echo "<meta http-equiv='refresh' content='3;url=../index.php' />";
				}
			}
		}else{
			header("Location: ../index.php");
		}
	}else{
		header("Location: ../index.php");
	}
?>