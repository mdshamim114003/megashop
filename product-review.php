<!--Header file Include-->
<?php include "inc/header.php"; ?>

<section class="pdt-70 pdb-100 solitude-bg">
<div class="container">
<div class="product-review-wrapper">
<div class="product-review-desc">
<h3 class="text-center">Do You Want Us To Review Your Product?</h3>
<p class="text-center">One of my favourite things I like to watch is the bloopers and outtakes that are shown of mistakes made during the making of a movie. Most DVD’s have a section of outtakes to be viewed, and often they will set me off laughing.</p>
</div>
<div class="product-review-form contact-form-wrapper">
<form class="contact-form" id="contactForm" name="contact-form" action="https://trendytheme.net/demo/gadget/sendemail.php" method="POST">
<div class="row">
<div class="col-md-4 mb-30">
<div class="input-field">
<label class="sr-only" for="name">Name</label>
<input type="text" name="name" class="form-control validate" id="name" placeholder="Your name">
</div>
</div>
<div class="col-md-4 mb-30">
<div class="input-field">
<label class="sr-only" for="email">Email</label>
<input type="email" name="email" class="form-control validate" id="email" placeholder="Your E-mail">
</div>
</div>
<div class="col-md-4 mb-30">
<div class="input-field">
<label class="sr-only" for="subject">Product url</label>
<input type="text" name="subject" class="form-control" id="subject" placeholder="Product url">
</div>
</div>
</div> 
<div class="input-field">
<label class="sr-only" for="message">Message</label>
<textarea name="message" id="message" class="form-control message" placeholder="Your Message"></textarea>
</div>
<button type="submit" name="submit" class="btn btn-primary icon-btn submit-btn mt-30"><span>Submit your Message</span></button>
</form>
</div> 
</div> 
</div>
</section>


<!--Footer file Include-->
<?php include "inc/footer.php"; ?>