<?php include "log_header.php"; ?>
<?php 
    if (isset($_POST['login_btn'])) {
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $user_email_exist_query = mysqli_query($conn, "SELECT user_email FROM user WHERE user_email='$user_email'");
        $user_email_exist_num = mysqli_num_rows($user_email_exist_query);
        if ($user_email_exist_num == 0) {
            echo "Sorry no users found";
        }else{
            $user_password_query = mysqli_query($conn, "SELECT user_password FROM user WHERE user_email='$user_email'");
            $user_password_row = mysqli_fetch_assoc($user_password_query);

            $user_password_db = $user_password_row['user_password'];

            if ($user_password == $user_password_db) {
                if (isset($_GET['product_id'])) {
                    $product_id = $_GET['product_id'];
                    header("Location: ../product-details.php?product_id=$product_id");
                }else{
                    header("Location: ../index.php");
                }
                $user_id_query = mysqli_query($conn, "SELECT user_id, user_name, user_type FROM user WHERE user_email='$user_email' AND user_password = '$user_password'");
                $user_id_row = mysqli_fetch_assoc($user_id_query);

                $_SESSION['user_id'] = $user_id_row['user_id'];
                $_SESSION['user_name'] = $user_id_row['user_name'];
                $_SESSION['user_type'] = $user_id_row['user_type'];
            }else{
                echo "Wrong Password";
            }
        }
    }
?>
    <div class="login-page">
        <div class="form">
          <form class="login-form" action="" method="post">
            <input type="email" placeholder="Email Address" name="user_email" required/>
            <input type="password" placeholder="password" name="user_password" required/>
            <button type="submit" name="login_btn">login</button>
            <p class="message">Not registered? <a href="registration.php">Create an account</a></p>
            <a href="../index.php">Back to home</a>
          </form>
        </div>
    </div>
<?php include "log_footer.php"; ?>