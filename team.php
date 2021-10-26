<!--Header file Include-->
<?php $page_name = "team"; ?>
<?php include "inc/header.php"; ?>

<section class="pdt-70 pdb-100 solitude-bg">
    <div class="container">
        <div class="team-membersection">

            <div class="page-title text-center mb-40">
                <h2 class="section-title">Our Team</h2>
                <p>One of my favourite things I like to watch is the bloopers and outtakes that are shown of mistakes
                    made during the making of a movie. Most DVD’s have a section of outtakes to be viewed, and often
                    they will set me off laughing.</p>
            </div>
            <div class="row">
                <?php
                    $team_member_query = mysqli_query($conn, "SELECT * FROM `team_member`");
                    while($team_member_row = mysqli_fetch_assoc($team_member_query)){
                ?>
                <div class="col-lg-3 col-sm-6 mb-40">
                    <div class="team-member-wrapper text-center">
                        <div class="team-member-thumb">
                            <img src="<?php echo $team_member_row['team_member_image']; ?>" alt="">
                        </div>
                        <div class="team-member-header">
                            <h3><a href="#."><?php echo $team_member_row['team_member_name']; ?></a></h3>
                            <span><?php echo $team_member_row['team_member_position']; ?></span>
                        </div>
                        <div class="team-member-social-link">
                            <ul class="list-inline">
                                <li><a class="facebook" target="_blank" href="https://www.facebook.com/<?php echo $team_member_row['team_member_facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter" target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="dribbble" target="_blank" href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a class="behance" target="_blank" href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="team-gallery-section">
            <div class="row">
                <div class="col-md-12">
                    <div id="project-slider" class="carousel slide gallery-thumb" data-ride="carousel">

                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="assets/img/gallery-img/gallery-img-3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/img/gallery-img/gallery-img-1.jpg" alt="">
                            </div>
                        </div>

                        <a class="left carousel-control" href="#project-slider" role="button" data-slide="prev">
                            <span class="fa fa-arrow-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#project-slider" role="button" data-slide="next">
                            <span class="fa fa-arrow-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="join-intro text-center">
            <h3>Want To Join With Us?</h3>
            <p>One of my favourite things I like to watch is the bloopers and outtakes that are shown of mistakes made
                during the making of a movie. Most DVD’s have a section of outtakes to be viewed, and often they will
                set me off laughing, especially when you know what was supposed to happen. In one sense it seems
                strange to laugh at other people’s mistakes, and yet we all do it, and our enjoyment is not usually of
                malicious intent. </p>
            <div class="join-button">
                <a href="inc/registration.php" class="btn btn-primary bgMid join-btn">join Us</a>
                <a href="about.php" class="btn btn-primary bgMid about-btn">About Us</a>
            </div>
        </div>
    </div>
</section>

<!--Footer file Include-->
<?php include "inc/footer.php"; ?>