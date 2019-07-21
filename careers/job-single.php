<?php
// Initialize the session
session_start();
require_once "config.php";
$joblisting = $_GET["joblisting"];
?>

<!doctype html>
<html lang="en">

<head>
    <title>Careers &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="top">


    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu -->


        <!-- NAVBAR -->
        <?php
        include("nav.php");
        $result = mysqli_query($link, "SELECT * FROM joblisting WHERE joblisting = '$joblisting'");
        while($row = mysqli_fetch_assoc($result)){
        ?>

        <!-- HOME -->

        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold"><?php echo $row['jobname'] ?></h1>
                    </div>
                </div>
            </div>
        </section>


        <section class="site-section">
            <div class="container">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2><?php echo $row['jobname'] ?></h2>
                                <div>
                                    <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span><?php echo $row['company'] ?></span>
                                    <span class="m-2"><span class="icon-room mr-2"></span><?php echo $row['location'] ?></span>
                                    <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary"><?php echo $row['status'] ?></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-6">
                                <?php
                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == 'user'){ ?>
                                <a href="apply_job.php?joblisting=<?php echo $joblisting ?>&post=<?php echo $row['jobname'] ?>" class="btn btn-block btn-primary btn-md">Apply Now</a>
                                <?php } ?>
                                <?php
                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == 'admin'){ ?>
                                <a href="delete_joblisting.php?joblisting=<?php echo $joblisting ?>" class="btn btn-block btn-primary btn-md">Delete</a>
                                <?php } ?>
                                <?php
                                if((isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == 'employer') && (isset($_SESSION["id"]) && $_SESSION["id"] == $row['id'])){ ?>
                                <a href="delete_joblisting.php?joblisting=<?php echo $joblisting ?>" class="btn btn-block btn-primary btn-md">Delete</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-5">
                            <figure class="mb-5"><img src="<?php echo $row['image'] ?>" alt="Free Website Template by Free-Template.co" class="img-fluid rounded"></figure>
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Job
                                Description</h3>
                            <?php echo $row['description'] ?>
                        </div>
                        <?php 
                        if ((!empty($row['responsibilities1'])) || (!empty($row['responsibilities2'])) || (!empty($row['responsibilities3'])) || (!empty($row['responsibilities4'])) || (!empty($row['responsibilities5'])))
                        {?>
                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Responsibilities</h3>
                            <ul class="list-unstyled m-0 p-0">
                                <?php 
                                if (!empty($row['responsibilities1']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['responsibilities1'] ?></span></li>
                                <?php } ?>
                                <?php 
                                if (!empty($row['responsibilities2']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['responsibilities2'] ?></span></li>
                                <?php } ?>
                                <?php 
                                if (!empty($row['responsibilities3']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['responsibilities3'] ?></span></li>
                                <?php } ?>
                                <?php
                                if (!empty($row['responsibilities4']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['responsibilities4'] ?></span></li>
                                <?php } ?>
                                <?php 
                                if (!empty($row['responsibilities5']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['responsibilities5'] ?></span></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>

                        <?php 
                        if ((!empty($row['education1'])) || (!empty($row['education2'])) || (!empty($row['education3'])) || (!empty($row['education4'])) || (!empty($row['education5'])))
                        {?>
                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Education + Experience</h3>
                            <ul class="list-unstyled m-0 p-0">
                                <?php 
                                if (!empty($row['education1']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['education1'] ?></span></li>
                                <?php } ?>
                                <?php 
                                if (!empty($row['education2']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['education2'] ?></span></li>
                                <?php } ?>
                                <?php 
                                if (!empty($row['education3']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['education3'] ?></span></li>
                                <?php } ?>
                                <?php 
                                if (!empty($row['education4']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['education4'] ?></span></li>
                                <?php } ?>
                                <?php 
                                if (!empty($row['education5']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['education5'] ?></span></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>

                        <?php 
                        if ((!empty($row['other1'])) || (!empty($row['other2'])) || (!empty($row['other3'])) || (!empty($row['other4'])) || (!empty($row['other5'])))
                        {?>
                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Other
                                Benifits</h3>
                            <ul class="list-unstyled m-0 p-0">
                                <?php 
                                if (!empty($row['other1']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['other1'] ?></span></li>
                                <?php } ?>
                                <?php 
                                if (!empty($row['other2']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['other2'] ?></span></li>
                                <?php } ?>
                                <?php 
                                if (!empty($row['other3']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['other3'] ?></span></li>
                                <?php } ?>
                                <?php 
                                if (!empty($row['other4']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['other4'] ?></span></li>
                                <?php } ?>
                                <?php 
                                if (!empty($row['other5']))
                                {?>
                                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span><?php echo $row['other5'] ?></span></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="col-lg-4">
                        <div class="bg-light p-3 border rounded mb-4">
                            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                            <ul class="list-unstyled pl-3 mb-0">
                                <li class="mb-2"><strong class="text-black">Published on:</strong> <?php echo $row['published'] ?></li>
                                <li class="mb-2"><strong class="text-black">Vacancy:</strong> <?php echo $row['vacancy'] ?></li>
                                <li class="mb-2"><strong class="text-black">Employment Status:</strong> <?php echo $row['status'] ?></li>
                                <li class="mb-2"><strong class="text-black">Experience:</strong> <?php echo $row['experience'] ?> year(s)</li>
                                <li class="mb-2"><strong class="text-black">Job Location:</strong> <?php echo $row['location'] ?></li>
                                <li class="mb-2"><strong class="text-black">Salary:</strong> RM<?php echo $row['salarystart'] ?> - RM<?php echo $row['salaryend'] ?></li>
                                <li class="mb-2"><strong class="text-black">Gender:</strong> <?php echo $row['gender'] ?></li>
                                <li class="mb-2"><strong class="text-black">Application Deadline:</strong> <?php echo $row['deadline'] ?></li>
                            </ul>
                        </div>

                        <div class="bg-light p-3 border rounded">
                            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
                            <div class="px-3">
                                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                                <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <?php } ?>

        <footer class="site-footer">


            <div class="container">
                <div class="row mb-5">
                    <div class="col-6 col-md-3 mb-4 mb-md-0">
                        <h3>Search Trending</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">Graphic Design</a></li>
                            <li><a href="#">Web Developers</a></li>
                            <li><a href="#">Python</a></li>
                            <li><a href="#">HTML5</a></li>
                            <li><a href="#">CSS3</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3 mb-4 mb-md-0">
                        <h3>Company</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Career</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Resources</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3 mb-4 mb-md-0">
                        <h3>Support</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Terms of Service</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3 mb-4 mb-md-0">
                        <h3>Contact Us</h3>
                        <div class="footer-social">
                            <a href="#"><span class="icon-facebook"></span></a>
                            <a href="#"><span class="icon-twitter"></span></a>
                            <a href="#"><span class="icon-instagram"></span></a>
                            <a href="#"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-12">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());

                            </script> All rights reserved | This template is made
                            with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/stickyfill.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>

    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>


    <script src="js/custom.js"></script>


</body>

</html>
