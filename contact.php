<!--Header file Include-->
<?php $page_name = "contact"; ?>
<?php include "inc/header.php"; ?>
<?php
	if(isset($_POST['submit_btn'])){
		$contact_name = $_POST['contact_name'];
		$contact_email = $_POST['contact_email'];
		$contact_subject = $_POST['contact_subject'];
		$contact_message = $_POST['contact_message'];

		$query = mysqli_query($conn, "INSERT INTO contacts VALUES('', '$contact_name', '$contact_subject', '$contact_email', '$contact_message')");
		if($query){
			echo "<script>alert('Your message was sent successfully.');</script>";
		}
	}
?>

<section class="pd-100 solitude-bg">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-8">
                <div class=" contact-form-wrapper">
                    <form class="contact-form" action="" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-30">
                                <div class="input-field">
                                    <label class="sr-only" for="name">Name</label>
                                    <input type="text" class="form-control validate" id="name" placeholder="Your name" name="contact_name">
                                </div>
                            </div>
                            <div class="col-md-6 mb-30">
                                <div class="input-field">
                                    <label class="sr-only" for="subject">Subject</label>
                                    <input type="text" class="form-control" id="subject" placeholder="Enter your Subject" name="contact_subject">
                                </div>
                            </div>
                        </div>
                        <div class="input-field mb-30">
                            <label class="sr-only" for="email">Email</label>
                            <input type="email" class="form-control validate" id="email" placeholder="Your E-mail" name="contact_email">
                        </div>
                        <div class="input-field">
                            <label class="sr-only" for="message">Message</label>
                            <textarea id="message" class="form-control message" placeholder="Your Message" name="contact_message"></textarea>
                        </div>
                        <button type="submit" name="submit_btn" class="btn btn-primary icon-btn submit-btn mt-30"><span>Submit your Message</span></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="contact-social-link">
                    <h4 class="mb-30">Let's get connected</h4>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="bgMid facebook">
                                <i class="fa fa-facebook"></i>
                                Follow us in facebook</a>
                        </li>
                        <li>
                            <a href="#" class="bgMid twitter">
                                <i class="fa fa-twitter"></i>
                                Follow us in twitter</a>
                        </li>
                        <li>
                            <a href="#" class="bgMid google-plus">
                                <i class="fa fa-google-plus"></i>
                                Follow us in Google+</a>
                        </li>
                        <li>
                            <a href="#" class="bgMid linkedin">
                                <i class="fa fa-linkedin"></i>
                                Follow us in Linkedin</a>
                        </li>
                        <li>
                            <a href="#" class="bgMid youtube">
                                <i class="fa fa-youtube"></i>
                                Follow us in Youtube</a>
                        </li>
                        <li>
                            <a href="#" class="bgMid vimeo">
                                <i class="fa fa-vimeo"></i>
                                Follow us in Vimeo</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Footer file Include-->
<?php include "inc/footer.php"; ?>