<?php
// Include config file
require_once "config.php";
session_start();

// Define variables and initialize with empty values
$location = $jobname = $vacancy = $status = $experience = $salarystart = $salaryend = $gender = $description = $responsibilities1 = $responsibilities2 = $responsibilities3 = $responsibilities4 = $responsibilities5 = $education1 = $education2 = $education3 = $education4 = $education5 = $other1 = $other2 = $other3 = $other4 = $other5 = $deadline = $company = "";

$location_err = $jobname_err = $vacancy_err = $status_err = $experience_err = $salarystart_err = $salaryend_err = $description_err = $deadline_err = $upload_err = "";

$target_dir = "post/";

$today = strtotime(date('m-d-Y'));

$id = $_GET['id'];
$result = mysqli_query($link,"SELECT * FROM employeer WHERE id = $id");
while($row = mysqli_fetch_assoc($result)){
    $company = $row['company'];
}
//Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate JobName
    if(empty(trim($_POST["jobname"]))){
        $jobname_err = "Please enter a Job Name.";     
    }else{
        $jobname = trim($_POST["jobname"]);
    }
    // Validate Location
    if(empty(trim($_POST["location"]))){
        $location_err = "Please select a Location.";
    }else{
        $location = trim($_POST["location"]);
    }
    // Validate Vacancy
    if(empty(trim($_POST["vacancy"]))){
        $vacancy_err = "Please enter a Number.";
    }else{
        $vacancy = trim($_POST["vacancy"]);
    }
    // Validate Status
    if(empty(trim($_POST["status"]))){
        $status_err = "Please select a Employment Status.";
    }else{
        $status = trim($_POST["status"]);
    }
    // Validate Experience
    if(empty(trim($_POST["experience"]))){
        $experience_err = "Please enter a Number.";
    }else{
        $experience = trim($_POST["experience"]);
    }
    // Validate Salary Start
    if(empty(trim($_POST["salarystart"]))){
        $salarystart_err = "Please enter a Number.";
    }else{
        $salarystart = trim($_POST["salarystart"]);
    }
    // Validate Salary End
    if(empty(trim($_POST["salaryend"]))){
        $salaryend_err = "Please enter a Number.";
    }else if(trim($_POST["salaryend"]) < $salarystart){
        $salaryend_err = "Salary End sould more than Salary Start";
        $salaryend = trim($_POST["salaryend"]);
    }else{
        $salaryend = trim($_POST["salaryend"]);
    }
    // Validate Dead Line
    if(empty(trim($_POST["deadline"]))){
        $deadline_err = "Please enter a Dead Line.";
    }else if($today >= trim($_POST["deadline"])){
        $deadline_err = "Please enter a valid Dead Line.";
        $deadline = trim($_POST["deadline"]);
    }else{
        $deadline = trim($_POST["deadline"]);
    }
    // Validate Description
    if(empty(trim($_POST["description"]))){
        $description_err = "Please enter a Description.";
    }else{
        $description = trim($_POST["description"]);
    }
    
    if(!empty(trim($_POST["responsibilities1"]))){
        $responsibilities1 = trim($_POST["responsibilities1"]);
    }
    
    if(!empty(trim($_POST["responsibilities2"]))){
        $responsibilities2 = trim($_POST["responsibilities2"]);
    }
    
    if(!empty(trim($_POST["responsibilities3"]))){
        $responsibilities3 = trim($_POST["responsibilities3"]);
    }
    
    if(!empty(trim($_POST["responsibilities4"]))){
        $responsibilities4 = trim($_POST["responsibilities4"]);
    }
    
    if(!empty(trim($_POST["responsibilities5"]))){
        $responsibilities5 = trim($_POST["responsibilities5"]);
    }
    
    if(!empty(trim($_POST["education1"]))){
        $education1 = trim($_POST["education1"]);
    }
    
    if(!empty(trim($_POST["education2"]))){
        $education2 = trim($_POST["education2"]);
    }
    
    if(!empty(trim($_POST["education3"]))){
        $education3 = trim($_POST["education3"]);
    }
    
    if(!empty(trim($_POST["education4"]))){
        $education4 = trim($_POST["education4"]);
    }
    
    if(!empty(trim($_POST["education5"]))){
        $education5 = trim($_POST["education5"]);
    }
    
    if(!empty(trim($_POST["other1"]))){
        $other1 = trim($_POST["other1"]);
    }
    
    if(!empty(trim($_POST["other2"]))){
        $other2 = trim($_POST["other2"]);
    }
    
    if(!empty(trim($_POST["other3"]))){
        $other3 = trim($_POST["other3"]);
    }
    
    if(!empty(trim($_POST["other4"]))){
        $other4= trim($_POST["other4"]);
    }
    
    if(!empty(trim($_POST["other5"]))){
        $other5 = trim($_POST["other5"]);
    }
    
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //Validate Picture
    if (file_exists($target_file)) {
    $upload_err = "Sorry, file already exists.";
    }
    
    $gender = $_POST["gender"];
    
    
    
    if(empty($location_err) && empty($jobname_err) && empty($vacancy_err) && empty($experience_err) && empty($status_err) && empty($salarystart_err) && empty($salaryend_err) && empty($description_err) && empty($deadline_err) && empty($upload_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO joblisting (location, jobname, vacancy, status, experience, salarystart, salaryend, gender, deadline, description, responsibilities1, responsibilities2, responsibilities3, responsibilities4, responsibilities5, education1, education2, education3, education4, education5, other1, other2, other3, other4, other5, id, image, company) VALUES ('$location', '$jobname', $vacancy, '$status', '$experience', '$salarystart', '$salaryend', '$gender', '$deadline', '$description', '$responsibilities1', '$responsibilities2', '$responsibilities3', '$responsibilities4', '$responsibilities5', '$education1', '$education2', '$education3', '$education4', '$education5', '$other1', '$other2', '$other3', '$other4', '$other5', '$id', '$target_file', '$company')";
        
        
        if (mysqli_query($link, $sql) && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            header("location: job-listings.php?page=1");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }

        mysqli_close($link);
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
                            <h1 class="text-white font-weight-bold">Add Job</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="site-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center" data-aos="fade">
                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                            <h2 class="section-title mb-3">Job Details</h2>
                            Job Name
                            <div class="form-group <?php echo (!empty($jobname_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="jobname" class="form-control form-control-lg" placeholder="Job Name" value="<?php echo $jobname; ?>">
                                <span class="help-block">
                                    <font color="red"><?php echo $jobname_err; ?></font>
                                </span>
                            </div>
                            Job Location
                            <div class="form-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
                                <select name="location" class="form-control form-control-lg">
                                    <option value="" <?php echo (isset($_POST['location']) && $_POST['location'] == '') ? 'selected="selected"' : ''; ?>>Select</option>
                                    <option value="Penang" <?php echo (isset($_POST['location']) && $_POST['location'] == 'Penang') ? 'selected="selected"' : ''; ?>>Penang</option>
                                    <option value="Kedah" <?php echo (isset($_POST['location']) && $_POST['location'] == 'Kedah') ? 'selected="selected"' : ''; ?>>Kedah</option>
                                    <option value="Kelantan" <?php echo (isset($_POST['location']) && $_POST['location'] == 'Kelantan') ? 'selected="selected"' : ''; ?>>Kelantan</option>
                                    <option value="Malacca" <?php echo (isset($_POST['location']) && $_POST['location'] == 'Malacca') ? 'selected="selected"' : ''; ?>>Malacca</option>
                                    <option value="Negeri Sembilan" <?php echo (isset($_POST['location']) && $_POST['location'] == 'Negeri Sembilan') ? 'selected="selected"' : ''; ?>>Negeri Sembilan</option>
                                    <option value="Pahang" <?php echo (isset($_POST['location']) && $_POST['location'] == 'Pahang') ? 'selected="selected"' : ''; ?>>Pahang</option>
                                    <option value="Perak" <?php echo (isset($_POST['location']) && $_POST['location'] == 'Perak') ? 'selected="selected"' : ''; ?>>Perak</option>
                                    <option value="Perlis" <?php echo (isset($_POST['location']) && $_POST['location'] == 'Perlis') ? 'selected="selected"' : ''; ?>>Perlis</option>
                                    <option value="Sabah" <?php echo (isset($_POST['location']) && $_POST['location'] == 'Sabah') ? 'selected="selected"' : ''; ?>>Sabah</option>
                                    <option value="Sarawak" <?php echo (isset($_POST['location']) && $_POST['location'] == 'Sarawak') ? 'selected="selected"' : ''; ?>>Sarawak</option>
                                    <option value="Selangor" <?php echo (isset($_POST['location']) && $_POST['location'] == 'Selangor') ? 'selected="selected"' : ''; ?>>Selangor</option>
                                    <option value="Terengganu" <?php echo (isset($_POST['location']) && $_POST['location'] == 'Terengganu') ? 'selected="selected"' : ''; ?>>Terengganu</option>
                                    <option value="Johor" <?php echo (isset($_POST['location']) && $_POST['location'] == 'Johor') ? 'selected="selected"' : ''; ?>>Johor</option>
                                </select>
                                <span class="help-block">
                                    <font color="red"><?php echo $location_err; ?></font>
                                </span>
                            </div>
                            Vacancy
                            <div class="form-group <?php echo (!empty($vacancy_err)) ? 'has-error' : ''; ?>">
                                <input type="number" name="vacancy" class="form-control form-control-lg" min="1" placeholder="People" value="<?php echo $vacancy; ?>">
                                <span class="help-block">
                                    <font color="red"><?php echo $vacancy_err; ?></font>
                                </span>
                            </div>
                            Employment Status
                            <div class="form-group <?php echo (!empty($status_err)) ? 'has-error' : ''; ?>">
                                <select class="form-control form-control-lg" name="status">
                                    <option value="" <?php echo (isset($_POST['status']) && $_POST['status'] == '') ? 'selected="selected"' : ''; ?>>Select</option>
                                    <option value="Freelancer" <?php echo (isset($_POST['status']) && $_POST['status'] == 'Freelancer') ? 'selected="selected"' : ''; ?>>Freelancer</option>
                                    <option value="Part-Time" <?php echo (isset($_POST['status']) && $_POST['status'] == 'Part-Time') ? 'selected="selected"' : ''; ?>>Part-Time</option>
                                    <option value="Full-Time" <?php echo (isset($_POST['status']) && $_POST['status'] == 'Full-Time') ? 'selected="selected"' : ''; ?>>Full-Time</option>
                                </select>
                                <span class="help-block">
                                    <font color="red"><?php echo $status_err; ?></font>
                                </span>
                            </div>
                            Gender
                            <div class="form-group">
                                <input type="radio" name="gender" value="Any" checked>Any&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="gender" value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Male') ? 'checked="checked"' : ''; ?>>Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="gender" value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Female') ? 'checked="checked"' : ''; ?>>Female
                            </div>
                            Employment Experience
                            <div class="form-group <?php echo (!empty($experience_err)) ? 'has-error' : ''; ?>">
                                <input type="number" name="experience" class="form-control form-control-lg" min="0" placeholder="Year" value="<?php echo $experience; ?>">
                                <span class="help-block">
                                    <font color="red"><?php echo $experience_err; ?></font>
                                </span>
                            </div>
                            Salary Start
                            <div class="form-group <?php echo (!empty($salarystart_err)) ? 'has-error' : ''; ?>">
                                <input type="number" name="salarystart" class="form-control form-control-lg" min="1" placeholder="RM" value="<?php echo $salarystart; ?>">
                                <span class="help-block">
                                    <font color="red"><?php echo $salarystart_err; ?></font>
                                </span>
                            </div>
                            Salary End
                            <div class="form-group <?php echo (!empty($salaryend_err)) ? 'has-error' : ''; ?>">
                                <input type="number" name="salaryend" class="form-control form-control-lg" min="1" placeholder="RM" value="<?php echo $salaryend; ?>">
                                <span class="help-block">
                                    <font color="red"><?php echo $salaryend_err; ?></font>
                                </span>
                            </div>
                            Dead Line
                            <div class="form-group <?php echo (!empty($deadline_err)) ? 'has-error' : ''; ?>">
                                <input type="date" name="deadline" class="form-control form-control-lg" value="<?php echo $deadline; ?>">
                                <span class="help-block">
                                    <font color="red"><?php echo $deadline_err; ?></font>
                                </span>
                            </div>
                            Job Description
                            <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                                <textarea name="description" cols="50" rows="10" class="form-control form-control-lg"><?php echo $description; ?></textarea>
                                <span class="help-block">
                                    <font color="red"><?php echo $description_err; ?></font>
                                </span>
                            </div>
                            Responsibilities
                            <div class="form-group">
                                <input type="text" name="responsibilities1" class="form-control form-control-lg" placeholder="Responsibility(Optional)" value="<?php echo $responsibilities1 ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="responsibilities2" class="form-control form-control-lg" placeholder="Responsibility(Optional)" value="<?php echo $responsibilities2 ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="responsibilities3" class="form-control form-control-lg" placeholder="Responsibility(Optional)" value="<?php echo $responsibilities3 ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="responsibilities4" class="form-control form-control-lg" placeholder="Responsibility(Optional)" value="<?php echo $responsibilities4 ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="responsibilities5" class="form-control form-control-lg" placeholder="Responsibility(Optional)" value="<?php echo $responsibilities5 ?>">
                            </div>
                            Education + Experience
                            <div class="form-group">
                                <input type="text" name="education1" class="form-control form-control-lg" placeholder="Education + Experience(Optional)" value="<?php echo $education1 ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="education2" class="form-control form-control-lg" placeholder="Education + Experience(Optional)" value="<?php echo $education2 ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="education3" class="form-control form-control-lg" placeholder="Education + Experience(Optional)" value="<?php echo $education3 ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="education4" class="form-control form-control-lg" placeholder="Education + Experience(Optional)" value="<?php echo $education4 ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="education5" class="form-control form-control-lg" placeholder="Education + Experience(Optional)" value="<?php echo $education5 ?>">
                            </div>
                            Other Benifits
                            <div class="form-group">
                                <input type="text" name="other1" class="form-control form-control-lg" placeholder="Other Benifits(Optional)" value="<?php echo $other1 ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="other2" class="form-control form-control-lg" placeholder="Other Benifits(Optional)" value="<?php echo $other2 ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="other3" class="form-control form-control-lg" placeholder="Other Benifits(Optional)" value="<?php echo $other3 ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="other4" class="form-control form-control-lg" placeholder="Other Benifits(Optional)" value="<?php echo $other4 ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="other5" class="form-control form-control-lg" placeholder="Other Benifits(Optional)" value="<?php echo $other5 ?>">
                            </div>
                            Select image to upload
                            <div class="form-group">
                                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control form-control-lg">
                            </div>
                            <br>
                            <input type="submit" value="Post" class="btn btn-primary">
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
