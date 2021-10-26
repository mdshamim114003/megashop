<!--Header file Include-->
<?php $page_name = "shop"; ?>
<?php include "inc/header.php"; ?>
<?php

    if(isset($_GET['product_id'])){
        $product_details_id = $_GET['product_id'];
        $product_details_query = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id=$product_details_id");
        $product_details_row = mysqli_fetch_assoc($product_details_query);

        $product_image = $product_details_row['product_image'];
        $product_link = $product_details_row['product_link'];

        $product_date = strtotime($product_details_row['product_date']);
        $product_modified_date = date("d-M-Y", $product_date);

        $product_category_id = $product_details_row['product_category_id'];
        $product_category_name_query = mysqli_query($conn, "SELECT product_category_name FROM `product_category` WHERE product_category_id=$product_category_id");
        $product_category_name_row = mysqli_fetch_assoc($product_category_name_query);

        $product_user_id = $product_details_row['product_user_id'];
        $product_user_name_query = mysqli_query($conn, "SELECT user_name FROM user WHERE user_id=$product_user_id");
        $product_user_name_row = mysqli_fetch_assoc($product_user_name_query);

        $product_view_previous = $product_details_row['product_view'];
        $product_view_now = $product_view_previous + 1;
        $product_view_insert = mysqli_query($conn, "UPDATE `products` SET `product_view` = '$product_view_now' WHERE `products`.`product_id` = $product_details_id");
    }
?>
<section class="pdb-100 pdt-70 solitude-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="single-product-wrapper">
                    <div class="single-product-gallery">
                        <div id="project-slider" class="carousel slide gallery-thumb" data-ride="carousel">

                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="<?php echo $product_image; ?>" alt="">
                                </div>
                            </div>

                            
                        </div>
                    </div>
                    <div class="single-product-content">
                        <div class="header-entry">
                            <ul class="list-inline">
                                <li class="author-name">
                                    <span>Added By</span><a href="#"><?php echo $product_user_name_row['user_name']; ?></a>
                                </li>
                            </ul>
                            <div class="product-title" itemprop="name">
                                <h3><?php echo $product_details_row['product_name']; ?></h3>
                            </div>
                        </div>
                        <div class="single-product-desc">
                            <p><?php echo $product_details_row['product_description']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="comment-wrapper mt-30">
                    <ul class="comment-list list-unstyled">
                        <?php
                            $product_comment_query = mysqli_query($conn, "SELECT * FROM `comments` WHERE comment_product_id=$product_details_id");
                            $product_total_comment = mysqli_num_rows($product_comment_query);
                        ?>
                        <h4 class="comment-title"><?php echo $product_total_comment; ?> Comments</h4>
                        <?php
                            if ($product_total_comment == 0) {
                                echo "<h2 class='text-danger'>Sorry! No Comments Found.</h2>";
                            }else{
                            while ($product_comment_row = mysqli_fetch_assoc($product_comment_query)) {
                                $product_comment_user_id = $product_comment_row['comment_user_id'];
                                $product_comment_date = strtotime($product_comment_row['comment_date']);
                                $product_comment_modified_date = date("d M Y", $product_comment_date);

                                $user_name_query = mysqli_query($conn, "SELECT user_name FROM user WHERE user_id=$product_comment_user_id");
                                $user_name_row = mysqli_fetch_assoc($user_name_query);
                        ?>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img src="assets/img/comment-img/comment-author-img-3.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="comment-info">
                                    <div class="comment-author">
                                        <h5><?php echo $user_name_row['user_name']; ?></h5>
                                    </div>
                                    <div class="comment-reply-btn">
                                        <span><?php echo $product_comment_modified_date; ?></span>
                                    </div>
                                </div>
                                <p><?php echo $product_comment_row['comment_text']; ?></p>
                            </div>
                        </li>
                        <?php } } ?>
                    </ul>
                    <div class="comment-respond mt-30">
                    </div>
                    <h4 class="comment-title comment-respond-title">Leave A Comment</h4>
                    <?php 
                        if (isset($_SESSION['user_id'])) {
                            if (isset($_POST['comment_insert'])) {
                                $comment_user_id = $_SESSION['user_id'];
                                $comment_text = $_POST['comment_text'];
                                $comment_product_id = $product_details_id;

                                $comment_insert_query = mysqli_query($conn, "INSERT INTO `comments` (`comment_id`, `comment_user_id`, `comment_date`, `comment_text`, `comment_product_id`) VALUES (NULL, '$comment_user_id', CURRENT_TIMESTAMP, '$comment_text', '$comment_product_id')");
                                header("Location: product-details.php?product_id=$product_details_id");
                            }
                    ?>
                        <form action="" class="comment-form" method="post">
                            <div class="input-field">
                                <textarea name="comment_text" id="message" class="form-control comment" aria-required="true"
                                    rows="8" placeholder="Write your comment"></textarea>
                            </div>
                            <button type="submit" name="comment_insert" class="btn btn-primary comment-submit-btn mt-30">Submit</button>
                        </form>
                    <?php
                        }else{
                            echo "Please <a href='inc/login.php?product_id=$product_details_id'>Login</a> / <a href='inc/registration.php?product_id=$product_details_id'>Register</a> to comment";
                        }
                    ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="tt-sidebar">
                    <div class="widget item-price-widget text-center">
                        <div class="price-ammount" itemprop="offers" itemtype="http://schema.org/Offer">
                            <h3>৳ <?php echo $product_details_row['product_price']; ?> TK</h3>
                        </div>
                        <div class="item-from-buy">
                            <a href="<?php echo $product_link; ?>" class="btn btn-primary btn-lg buy-from-amazon"><i class="fa fa-amazon"></i>Buy
                                via <?php echo $product_details_row['product_destination']; ?></a>
                        </div>
                    </div>
                    <div class="widget product-overview mt-30">
                        <h5>Overview & Specs</h5>
                        <div class="product-over-view-details">
                            <p><span>Sold By</span><?php echo $product_details_row['product_destination']; ?></p>
                            <p><span>Categories</span><?php echo $product_category_name_row['product_category_name']; ?></p>
                            <p><span>Discoverd on</span><?php echo $product_modified_date; ?></p>
                        </div>
                    </div>
                    <div class="widget populer-product-widget mt-30">
                        <h5>Populer Gadgets</h5>
                        <?php
                            $populer_product_query = mysqli_query($conn, "SELECT * FROM `products` ORDER BY product_view DESC LIMIT 3");
                            while($populer_product_row = mysqli_fetch_assoc($populer_product_query)){
                            
                        ?>
                        <div class="populer-product-details" itemscope itemtype="http://schema.org/Product">
                            <div class="product-image">
                                <a href="product-details.php?product_id=<?php echo $products_row['product_id']; ?>">
                                    <img itemprop="image" src="assets/img/populer-product-img/populer-product-img-1.jpg"
                                        class="img-responsive" alt="">
                                </a>
                                <div class="populer-product-entry">
                                    <div class="product-title" itemprop="name">
                                        <h4><a href="product-details.php?product_id=<?php echo $populer_product_row['product_id']; ?>"><?php echo $populer_product_row['product_name']; ?></a></h4>
                                    </div>
                                    <div class="populer-product-btn">
                                        <a href="product-details.php?product_id=<?php echo $populer_product_row['product_id']; ?>" class="btn text-uppercase">view details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--Footer file Include-->
<?php include "inc/footer.php"; ?>