<?php include "log_header.php"; ?>
<?php 
    if (isset($_POST['registration_btn'])) {
        $user_name = trim($_POST['user_name']);
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_password_confirmation = $_POST['user_password_confirmation'];

        if ($user_password == $user_password_confirmation) {
            $user_email_exist_query = mysqli_query($conn, "SELECT user_email FROM user WHERE user_email='$user_email'");
            $user_email_exist_num = mysqli_num_rows($user_email_exist_query);
            if ($user_email_exist_num > 0) {
                echo "User already exist. Try another email address";
            }else{
                $user_insert_query = mysqli_query($conn, "INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_type`) VALUES (NULL, '$user_name', '$user_email', '$user_password', DEFAULT)");
                $user_id = mysqli_insert_id($conn);
                $user_id_query = mysqli_query($conn, "SELECT user_id, user_name, user_type FROM user WHERE user_id = $user_id");
                $user_id_row = mysqli_fetch_assoc($user_id_query);
                if (isset($_GET['product_id'])) {
                    $product_id = $_GET['product_id'];
                    header("Location: ../product-details.php?product_id=$product_id");
                }else{
                    header("Location: ../index.php");
                }

                $_SESSION['user_id'] = $user_id_row['user_id'];
                $_SESSION['user_name'] = $user_id_row['user_name'];
                $_SESSION['user_type'] = $user_id_row['user_type'];
                if ($user_insert_query) {
                    echo "User Registered";
                }else{
                    echo "Registration not Successful";
                }
            }
        }else{
            echo "Password not Matched!";
        }
    }

?>

    <div class="login-page">
        <div class="form">
          <form class="login-form" action="" method="post">
            <input type="text" placeholder="Name" name="user_name" required/>
            <input type="email" placeholder="Email" name="user_email" required/>
            <input type="password" placeholder="password" name="user_password" required/>
            <input type="password" placeholder="Password confirmation" name="user_password_confirmation" required/>
            <div class="wthree-text">
                <label class="anim">
                    <input type="checkbox" class="checkbox" required>
                    <span>I Agree To The Terms & Conditions</span>
                </label>
                <div class="clear"> </div>
            </div>
            <button type="submit" name="registration_btn">Register</button>
            <p class="message">Not registered? <a href="login.php">Login</a></p>
            <a href="../index.php">Back to home</a>
          </form>
        </div>
    </div>
<?php include "log_footer.php"; ?>