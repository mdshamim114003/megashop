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
    if (isset($_POST['submit_btn'])) {
        $product_category_name = trim($_POST['product_category_name']);
        $product_main_category = $_POST['product_main_category'];

        $insert_product_category = mysqli_query($conn, "INSERT INTO product_category VALUES('', '$product_category_name', '$product_main_category')");

    }

?>

    <div class="login-page">
        <div class="form">
            <h3>Add Product Category</h3>
          <form class="login-form" action="" method="post">
            <input type="text" placeholder="Product Category Name" name="product_category_name" required/>
            <select name="product_main_category" required>
                <option>Product Main Category</option>
                <?php
                    $product_main_category_query = mysqli_query($conn, "SELECT product_main_category_name FROM product_main_category");
                    while ($product_main_category_row = mysqli_fetch_assoc($product_main_category_query)) {
                 ?>
                <option value="<?php echo $product_main_category_row['product_main_category_name']; ?>"><?php echo $product_main_category_row['product_main_category_name']; ?></option>
            <?php } ?>
            </select>
            <button type="submit" name="submit_btn">Submit</button>
            <a href="../index.php">Back to home</a>
          </form>
        </div>
    </div>
<?php include "log_footer.php"; ?>