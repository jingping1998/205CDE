<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(($username == 'admin' && $password == 'admin')){
        session_start();
                            
        // Store data in session variables
        $_SESSION["loggedin"] = 'admin';
        $_SESSION["username"] = $username;                            
                            
        // Redirect user to welcome page
        header("location: admin_home.php");
    }
    // Validate credentials
    if (isset($_POST['user'])){
        if(empty($username_err) && empty($password_err)){
            $query = "SELECT * FROM users WHERE username = '$username' AND password= '$password' LIMIT 1";
            $id = "SELECT id FROM users WHERE username = '$username'";
            $results = mysqli_query($link, $query);
        
            if (mysqli_num_rows($results) == 1){
                $_SESSION["loggedin"] = 'user';
                $_SESSION["username"] = $username;
                $_SESSION["id"] = $id;
                header('location: job-listings.php?page=1');
            }
        }
    }elseif (isset($_POST['employer'])){
        if(empty($username_err) && empty($password_err)){
            $query = "SELECT * FROM employeer WHERE username = '$username' AND password= '$password' LIMIT 1";
            $results = mysqli_query($link, $query);
        
            if (mysqli_num_rows($results) == 1){
                while ($row = mysqli_fetch_assoc($results)){
                    if ($row['status']){
                        $_SESSION["loggedin"] = 'employer';
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $row['id'];
                        header('location: job-listings.php?page=1');
                    }
                    $password_err = "Please wait for verification!";
                }
            }
        }
    }
}
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
                            <h1 class="text-white font-weight-bold">Join Us</h1>
                            <p>Find your dream jobs in our powerful career website!.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="site-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center" data-aos="fade">
                        <form action="" method="post" autocomplete="off">
                            <h2 class="section-title mb-3">Login</h2>
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="username" class="form-control form-control-lg" placeholder="User ID">
                                <span class="help-block">
                                    <?php echo $username_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                                <span class="help-block">
                                    <?php echo $password_err; ?></span>
                            </div>
                            <br>
                            <input type="submit" name="user" value="Login" class="btn btn-primary">⠀<input type="submit" name="employer" value="Login as Employer" class="btn btn-primary">
                        </form>
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
