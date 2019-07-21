<?php
// Include config file
require_once "config.php";
session_start();
 
// Define variables and initialize with empty values
$username = $email = $company = $status ="";
$username_err = $password_err = $email_err = $company_err = "";
$id = $_GET['id'];
$username_post = $_GET['username'];
$password = $_GET['password'];
$email_post = $_GET['email'];
$company_post = $_GET['company'];
$status_post = $_GET['status'];
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
        $username_post = "";
    }else if ($username_post == trim($_POST["username"])){
        $username = trim($_POST["username"]);
    }else{
        $username_post = trim($_POST["username"]);
        // Prepare a select statement
        $sql = "SELECT id FROM eployeer WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
        $email_post = "";
    }else if ($email_post == trim($_POST["email"])){
        $email = trim($_POST["email"]);
    }else{
        $email_post = trim($_POST["email"]);
        // Prepare a select statement
        $sql = "SELECT id FROM employeer WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    if(empty(trim($_POST["company"]))){
        $company_err = "Please enter a company.";
        $company_post = "";
    }else if ($company_post == trim($_POST["company"])){
        $company = trim($_POST["company"]);
    }else{
        $company_post = trim($_POST["company"]);
        // Prepare a select statement
        $sql = "SELECT id FROM employeer WHERE company = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_company);
            
            // Set parameters
            $param_company = trim($_POST["company"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $company_err = "This company is already taken.";
                } else{
                    $company = trim($_POST["company"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($company_err_err) && empty($email_err_err)){
        
        if ($_POST["valid"] == "Yes"){
            $status = true;
        }else{
            $status = false;
        }
        
        // Prepare an insert statement
        $sql = "UPDATE employeer SET username='$username', password='$password', company='$company', email='$email', status='$status' WHERE id='$id'";
         
        if(mysqli_query($link, $sql)){
            header("location: admin_employer.php");
        }else{
            echo "ERROR: Could not able to execute $sql.".mysqli_error($link);
        }
    }
    
    // Close connection
    mysqli_close($link);
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
                            <h1 class="text-white font-weight-bold">Employer Information</h1>
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
                            <h2 class="section-title mb-3">Employer Edit</h2>
                            UserName
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="username" class="form-control form-control-lg" placeholder="User ID" value="<?php echo $username_post ?>">
                                <span class="help-block">
                                    <?php echo $username_err; ?></span>
                            </div>
                            Password
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="password" class="form-control form-control-lg" placeholder="Password" value="<?php echo $password ?>">
                                <span class="help-block">
                                    <?php echo $password_err; ?></span>
                            </div>
                            Company
                            <div class="form-group <?php echo (!empty($company_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="company" class="form-control form-control-lg" placeholder="Company" value="<?php echo $company_post ?>">
                                <span class="help-block">
                                    <?php echo $company_err; ?></span>
                            </div>
                            Email
                            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="<?php echo $email_post ?>">
                                <span class="help-block">
                                    <?php echo $email_err; ?></span>
                            </div>
                            Validation
                            <?php
                            if ($status_post){
                                echo '<input type="checkbox" name="valid" class="form-control form-control-lg" value="Yes" checked>';
                            }else{
                                echo '<input type="checkbox" name="valid" class="form-control form-control-lg" value="Yes">';
                            }
                            ?>
                            <br>
                            <input type="submit" value="Update" class="btn btn-primary">
                        </form>
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
