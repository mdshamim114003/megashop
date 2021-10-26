<?php include "log_header.php"; ?>
<?php
    if (isset($_SESSION['user_type'])) {
        if ($_SESSION['user_type'] != "admin") {
            header("Location: ../index.php");
        }
    }else{
        header("Location: ../index.php");
    }

    if(isset($_GET['product_id'])){
        $product_details_id = $_GET['product_id'];
        $product_details_query = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id=$product_details_id");
        $product_details_row = mysqli_fetch_assoc($product_details_query);

        $product_name = $product_details_row['product_name'];
        $product_description = $product_details_row['product_description'];
        $product_image = $product_details_row['product_image'];
        $product_link = $product_details_row['product_link'];
        $product_destination = $product_details_row['product_destination'];
        $product_price = $product_details_row['product_price'];

        $product_category_id = $product_details_row['product_category_id'];
        $product_category_name_query = mysqli_query($conn, "SELECT product_category_name FROM `product_category` WHERE product_category_id=$product_category_id");
        $product_category_name_row = mysqli_fetch_assoc($product_category_name_query);
    }
?>
<?php 
    if (isset($_POST['submit_btn'])) {
        $product_name = trim($_POST['product_name']);
        $product_price = trim($_POST['product_price']);
        $product_description = trim($_POST['product_description']);
        $product_category_id = $_POST['product_category_id'];
        $product_link = $_POST['product_link'];
        $product_destination = $_POST['product_destination'];
        $product_image_name = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];

        if ($product_image_name && $product_image_tmp) {
            $product_image_location = "../assets/img/products/".$product_image_name;
            move_uploaded_file($product_image_tmp, $product_image_location);
            $product_image = "assets/img/products/".$product_image_name;
        }else{
        	$product_image = $product_image;
        }

        $insert_product_category = mysqli_query($conn, "UPDATE products SET product_name = '$product_name', product_image = '$product_image', product_price = '$product_price', product_category_id = '$product_category_id', product_description = '$product_description', product_link = '$product_link', product_destination = '$product_destination' WHERE product_id = $product_details_id");
        if (!$insert_product_category) {
            die(mysqli_error($conn));
        }else{
        	header("Location: ../product-details.php?product_id=$product_details_id");
        }

    }

?>

    <div class="login-page" style="width: 450px;">
        <div class="form">
            <h3>Edit Product</h3>
          <form class="login-form" action="" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Product Name" name="product_name" value="<?php echo $product_name; ?>" required/>
            <input type="number" min="0" placeholder="Product Price" name="product_price" value="<?php echo $product_price; ?>" required/>
            <select name="product_category_id" required>
                <option value="">Product Category</option>
                <?php
                    $product_category_query = mysqli_query($conn, "SELECT * FROM product_category ORDER BY product_main_category");
                    while ($product_category_row = mysqli_fetch_assoc($product_category_query)) {
                    	if ($product_category_row['product_category_id'] == $product_category_id) {
                    		$selected = "selected";
                    	}else{
                    		$selected = "";
                    	}
                 ?>
                <option value="<?php echo $product_category_row['product_category_id']; ?>" <?php echo  $selected; ?>><?php echo $product_category_row['product_category_name']; ?></option>
            <?php } ?>
            </select>
            <textarea rows="10" cols="42" placeholder="Product Description" name="product_description" required><?php echo  $product_description; ?></textarea>
            <img style="width: 100%;" src="../<?php echo $product_image; ?>" alt="No Image Available">
            <input type="file" accept="image/*" name="product_image">
            <input type="text" name="product_link" placeholder="Product Link" value="<?php echo $product_link; ?>" required>
            <input type="text" name="product_destination" placeholder="Product Destination" value="<?php echo $product_destination; ?>" required>
            <button type="submit" name="submit_btn">Submit</button>
            <a href="../index.php">Back to home</a>
          </form>
        </div>
    </div>
<?php include "log_footer.php"; ?>