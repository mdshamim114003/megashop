<?php include "log_header.php"; ?>
    <div class="login-page">
        <div class="form">
          <form class="register-form">
            <input type="text" placeholder="name"/>
            <input type="password" placeholder="password"/>
            <input type="text" placeholder="email address"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
          </form>
          <form class="login-form">
            <input type="email" placeholder="Email"/>
            <button>Next</button>
            <p class="message">Not registered? <a href="registration.html">Create an account</a></p>
          </form>
        </div>
    </div>
<?php include "log_footer.php"; ?>