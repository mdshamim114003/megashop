<?php include "log_header.php"; ?>
<?php
    if (isset($_SESSION['user_type'])) {
        if ($_SESSION['user_type'] != "admin") {
            header("Location: ../index.php");
        }
    }else{
        header("Location: ../index.php");
    }
?>
<?php 
    $meal_add_success = "";
    if (isset($_POST['submit_btn'])) {
        $product_name = $_POST['product_name'];
        $product_name = trim(preg_replace('/\s*\([^)]*\)/', '', $product_name));
        $product_name = str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($product_name ) );
        $product_price = trim($_POST['product_price']);
        $product_description = $_POST['product_description'];
        $product_description = trim(preg_replace('/\s*\([^)]*\)/', '', $product_description));
        $product_description = str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($product_description ) );
        $product_category_id = $_POST['product_category_id'];
        
        $product_link = $_POST['product_link'];
        $product_destination = $_POST['product_destination'];
        $product_user_id = $_SESSION['user_id'];
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];

        if ($product_image && $product_image_tmp) {
            $product_image_location = "../assets/img/products/".$product_image;
            move_uploaded_file($product_image_tmp, $product_image_location);
            $product_image = "assets/img/products/".$product_image;
        }

        $insert_product_category = mysqli_query($conn, "INSERT INTO products VALUES('', '$product_name', '$product_image', '$product_price', '$product_category_id', '$product_user_id', '{$product_description}', '$product_link', '$product_destination', CURRENT_TIMESTAMP, 0)");
        if (!$insert_product_category) {
            die(mysqli_error($conn));
        }else{
            $meal_add_success = "Product Added Successfully..!";
        }

    }

?>

    <div class="login-page" style="width: 450px;">
        <div class="form">
            <h3>Add Product</h3>
            <h3 style="color: green;"><?php echo $meal_add_success; ?></h3>
          <form class="login-form" action="" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Product Name" name="product_name" required/>
            <input type="number" min="0" placeholder="Product Price" name="product_price" required/>
            <select name="product_category_id" required>
                <option value="">Product Category</option>
                <?php
                    $product_category_query = mysqli_query($conn, "SELECT * FROM product_category ORDER BY product_main_category");
                    while ($product_category_row = mysqli_fetch_assoc($product_category_query)) {
                 ?>
                <option value="<?php echo $product_category_row['product_category_id']; ?>"><?php echo $product_category_row['product_category_name']; ?></option>
            <?php } ?>
            </select>
            <textarea rows="10" cols="42" placeholder="Product Description" name="product_description" required></textarea>
            <input type="file" accept="image/*" name="product_image" required>
            <input type="text" name="product_link" placeholder="Product Link" required>
            <input type="text" name="product_destination" placeholder="Product Destination" required>
            <button type="submit" name="submit_btn">Submit</button>
            <a href="../index.php">Back to home</a>
          </form>
        </div>
    </div>
<?php include "log_footer.php"; ?>