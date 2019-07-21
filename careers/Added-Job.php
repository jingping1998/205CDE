<?php
session_start();
require_once "config.php";

$page = $_GET['page'];
$id = $_SESSION['id'];

if($page == ""){
    $page = "1";
}else{
    $page = $_GET['page'];
}
$sql = "SELECT id FROM joblisting WHERE id='$id'";

$query = mysqli_query($link ,$sql);

$num = mysqli_num_rows($query);

$per_page = "10";

$last_page = ceil($num/$per_page);

$first_page = "1";

$start = ($page-1)*$per_page;

$limit = "LIMIT $start, $per_page";

$sql = "SELECT * FROM joblisting WHERE id='$id' $limit";
$query = mysqli_query($link, $sql)
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
        ?>

        <!-- HOME -->
        <section class="home-section section-hero inner-page overlay bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="mb-5 text-center">
                            <h1 class="text-white font-weight-bold">Job Posted</h1>
                        </div>
                    </div>
                </div>
            </div>


        </section>



        <section class="site-section">
            <div class="container">

                <div class="row mb-5 justify-content-center">
                    <div class="col-md-7 text-center">
                        <h2 class="section-title mb-2"><?php echo $num; ?> Job Listed</h2>
                    </div>
                </div>

                <?php while($row = mysqli_fetch_array($query)){ ?>
                <div class="mb-5">
                    <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
                        <div class="col-md-4">
                            <span class="badge badge-primary px-2 py-1 mb-3"><?php echo $row['status'] ?></span>
                            <h2><a href="job-single.php?joblisting=<?php echo $row['joblisting'] ?>"><?php echo $row['jobname'] ?></a> </h2>
                        </div>
                        <div class="col-md-3 text-left">
                            <h3><?php echo $row['location'] ?></h3>
                            <span class="meta">Malaysia</span>
                        </div>
                        <div class="col-md-3 text-md-right">
                            <strong class="text-black">RM<?php echo $row['salarystart'] ?> &mdash; RM<?php echo $row['salaryend'] ?></strong>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="row pagination-wrap">

                    <div class="col-md-6 text-center text-md-left">
                        <div class="custom-pagination ml-auto">
                            <?php if($page == $first_page){?>
                            <a class="prev">Previous</a>
                            <?php }else{
                                if(!isset($page)){ ?>
                            echo '<a class="prev">Previous</a>'
                            <?php }else{ 
                            $previous = $page-1; ?>
                            <a href="job-listings.php?page=<?php echo $previous ?>" class="prev">Previous</a>
                            <?php }
                            } ?>
                            <div class="d-inline-block">
                                <a href="job-listings.php?page=<?php echo $first_page ?>">1</a>
                            </div>
                            <?php
                            if($page == $last_page){ ?>
                            <a class="next">Next</a>
                            <?php }else{
                                if(isset($page)){ 
                            $next = $first_page+1; ?>
                            <a href="job-listings.php?page=<?php echo $next ?>" class="next">Next</a>
                            <?php }else{ 
                            $next = $page+1; ?>
                            <a href="job-listings.php?page=<?php echo $next ?>" class="next">Next</a>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="site-section py-4 mb-5 border-top">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-12 text-center mt-4 mb-5">
                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                <h2 class="section-title mb-2">Our Candidates Work In Company</h2>
                                <p class="lead">Porro error reiciendis commodi beatae omnis similique voluptate rerum ipsam fugit
                                    mollitia ipsum facilis expedita tempora suscipit iste</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-6 col-lg-3 col-md-6 text-center">
                        <img src="images/logo_mailchimp.svg" alt="Image" class="img-fluid logo-1">
                    </div>
                    <div class="col-6 col-lg-3 col-md-6 text-center">
                        <img src="images/logo_paypal.svg" alt="Image" class="img-fluid logo-2">
                    </div>
                    <div class="col-6 col-lg-3 col-md-6 text-center">
                        <img src="images/logo_stripe.svg" alt="Image" class="img-fluid logo-3">
                    </div>
                    <div class="col-6 col-lg-3 col-md-6 text-center">
                        <img src="images/logo_visa.svg" alt="Image" class="img-fluid logo-4">
                    </div>
                </div>
            </div>
        </section>


        <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h2 class="text-white">Looking For A Job?</h2>
                        <p class="mb-0 text-white lead">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci
                            impedit.</p>
                    </div>
                    <div class="col-md-3 ml-auto">
                        <a href="#" class="btn btn-warning btn-block btn-lg">Sign Up</a>
                    </div>
                </div>
            </div>
        </section>

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

    <!-- <script src="js/bootstrap-select.min.js"></script> -->

    <script src="js/custom.js"></script>


</body>

</html>
