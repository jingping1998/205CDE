<?php
session_start();
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
        <section class="home-section section-hero overlay bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="mb-5 text-center">
                        </div>
                        <form method="post" class="search-jobs-form">
                            <div class="row mb-5">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                    <input type="text" class="form-control form-control-lg" placeholder="Job title, keywords...">
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                    <select class="form-control">
                                        <option>Anywhere</option>
                                        <option>San Francisco</option>
                                        <option>Palo Alto</option>
                                        <option>New York</option>
                                        <option>Manhattan</option>
                                        <option>Ontario</option>
                                        <option>Toronto</option>
                                        <option>Kansas</option>
                                        <option>Mountain View</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                    <select class="form-control">
                                        <option>Part Time</option>
                                        <option>Full Time</option>
                                        <option>Freelancer</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </section>

        <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="col-md-7 text-center">
                        <h2 class="section-title mb-2 text-white">Careers Statistics</h2>
                        <p class="lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita unde officiis recusandae sequi excepturi corrupti.</p>
                    </div>
                </div>
                <div class="row pb-0 block__19738 section-counter">

                    <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <strong class="number" data-number="1930">0</strong>
                        </div>
                        <span class="caption">Candidates</span>
                    </div>

                    <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <strong class="number" data-number="54">0</strong>
                        </div>
                        <span class="caption">Jobs Posted</span>
                    </div>

                    <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <strong class="number" data-number="120">0</strong>
                        </div>
                        <span class="caption">Jobs Filled</span>
                    </div>

                    <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <strong class="number" data-number="550">0</strong>
                        </div>
                        <span class="caption">Companies</span>
                    </div>


                </div>
            </div>
        </section>



        <section class="site-section">
            <div class="container">

                <div class="row mb-5 justify-content-center">
                    <div class="col-md-7 text-center">
                        <h2 class="section-title mb-2">109,234 Job Listed</h2>
                    </div>
                </div>


                <div class="mb-5">
                    <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
                        <div class="col-md-2">
                            <a href="job-single.html"><img src="images/featured-listing-1.jpg" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-md-4">
                            <span class="badge badge-primary px-2 py-1 mb-3">Freelancer</span>
                            <h2><a href="job-single.html">Dropbox Product Designer</a> </h2>
                            <p class="meta">Publisher: <strong>John Stewart</strong> In: <strong>Design</strong></p>
                        </div>
                        <div class="col-md-3 text-left">
                            <h3>Melbourn</h3>
                            <span class="meta">Australia</span>
                        </div>
                        <div class="col-md-3 text-md-right">
                            <strong class="text-black">$60k &mdash; $100k</strong>
                        </div>
                    </div>

                    <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
                        <div class="col-md-2">
                            <a href="job-single.html"><img src="images/featured-listing-2.jpg" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-md-4">
                            <span class="badge badge-warning px-2 py-1 mb-3">Full-time</span>
                            <h2><a href="job-single.html">Creative Director in Intercom</a> </h2>
                            <p class="meta">Publisher: <strong>John Stewart</strong> In: <strong>Design</strong></p>
                        </div>
                        <div class="col-md-3 text-left">
                            <h3>London</h3>
                            <span class="meta">United Kingdom</span>
                        </div>
                        <div class="col-md-3 text-md-right">
                            <strong class="text-black">$60k &mdash; $100k</strong>
                        </div>
                    </div>

                    <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
                        <div class="col-md-2">
                            <a href="job-single.html"><img src="images/featured-listing-3.jpg" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-md-4">
                            <span class="badge badge-success px-2 py-1 mb-3">Part-time</span>
                            <h2><a href="job-single.html">FullStack Developer in Shopify</a> </h2>
                            <p class="meta">Publisher: <strong>John Stewart</strong> In: <strong>Design</strong></p>
                        </div>
                        <div class="col-md-3 text-left">
                            <h3>London</h3>
                            <span class="meta">United Kingdom</span>
                        </div>
                        <div class="col-md-3 text-md-right">
                            <strong class="text-black">$60k &mdash; $100k</strong>
                        </div>
                    </div>
                    <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
                        <div class="col-md-2">
                            <a href="job-single.html"><img src="images/featured-listing-4.jpg" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-md-4">
                            <span class="badge badge-primary px-2 py-1 mb-3">Freelancer</span>
                            <h2><a href="job-single.html">Dropbox Product Designer</a> </h2>
                            <p class="meta">Publisher: <strong>John Stewart</strong> In: <strong>Design</strong></p>
                        </div>
                        <div class="col-md-3 text-left">
                            <h3>Melbourn</h3>
                            <span class="meta">Australia</span>
                        </div>
                        <div class="col-md-3 text-md-right">
                            <strong class="text-black">$60k &mdash; $100k</strong>
                        </div>
                    </div>

                    <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
                        <div class="col-md-2">
                            <a href="job-single.html"><img src="images/featured-listing-5.jpg" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-md-4">
                            <span class="badge badge-warning px-2 py-1 mb-3">Full-time</span>
                            <h2><a href="job-single.html">Creative Director in Intercom</a> </h2>
                            <p class="meta">Publisher: <strong>John Stewart</strong> In: <strong>Design</strong></p>
                        </div>
                        <div class="col-md-3 text-left">
                            <h3>London</h3>
                            <span class="meta">United Kingdom</span>
                        </div>
                        <div class="col-md-3 text-md-right">
                            <strong class="text-black">$60k &mdash; $100k</strong>
                        </div>
                    </div>

                    <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
                        <div class="col-md-2">
                            <a href="job-single.html"><img src="images/featured-listing-4.jpg" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-md-4">
                            <span class="badge badge-success px-2 py-1 mb-3">Part-time</span>
                            <h2><a href="job-single.html">FullStack Developer in Shopify</a> </h2>
                            <p class="meta">Publisher: <strong>John Stewart</strong> In: <strong>Design</strong></p>
                        </div>
                        <div class="col-md-3 text-left">
                            <h3>London</h3>
                            <span class="meta">United Kingdom</span>
                        </div>
                        <div class="col-md-3 text-md-right">
                            <strong class="text-black">$60k &mdash; $100k</strong>
                        </div>
                    </div>

                    <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
                        <div class="col-md-2">
                            <a href="job-single.html"><img src="images/featured-listing-3.jpg" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-md-4">
                            <span class="badge badge-success px-2 py-1 mb-3">Part-time</span>
                            <h2><a href="job-single.html">FullStack Developer in Shopify</a> </h2>
                            <p class="meta">Publisher: <strong>John Stewart</strong> In: <strong>Design</strong></p>
                        </div>
                        <div class="col-md-3 text-left">
                            <h3>London</h3>
                            <span class="meta">United Kingdom</span>
                        </div>
                        <div class="col-md-3 text-md-right">
                            <strong class="text-black">$60k &mdash; $100k</strong>
                        </div>
                    </div>

                </div>

                <div class="row pagination-wrap">

                    <div class="col-md-6 text-center text-md-left">
                        <div class="custom-pagination ml-auto">
                            <a href="#" class="prev">Previous</a>
                            <div class="d-inline-block">
                                <a href="#" class="active">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                            </div>
                            <a href="#" class="next">Next</a>
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
                                <p class="lead">Porro error reiciendis commodi beatae omnis similique voluptate rerum ipsam fugit mollitia ipsum facilis expedita tempora suscipit iste</p>
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


        <section class="bg-light pt-5 testimony-full">

            <div class="owl-carousel single-carousel">


                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <img class="img-fluid mx-auto" src="images/person_1.jpg" alt="Image">
                            <blockquote>
                                <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                                <p><cite> &mdash; Richard Anderson</cite></p>
                            </blockquote>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <img class="img-fluid mx-auto" src="images/person_2.jpg" alt="Image">
                            <blockquote>
                                <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                                <p><cite> &mdash; Chris Peters</cite></p>
                            </blockquote>
                        </div>
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
                        <a href="sign-up.php" class="btn btn-warning btn-block btn-lg">Sign Up</a>
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

                            </script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
