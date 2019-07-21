<header class="site-navbar mt-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == 'admin'){
                echo '<div class="site-logo col-6"><a href="admin_home.php">Careers</a></div>';
            }else{
                echo '<div class="site-logo col-6"><a href="index.php">Careers</a></div>';
            }
            ?>

            <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                    <?php
                            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == 'user'){
                            echo '<li><a href="job-listings.php?page=1">Home</a></li>
                            <li><a href="about.php">About</a></li>';
                            echo $_SESSION["username"]; echo '</a></li>';
                            echo '<li><a href="logout.php">Logout</a></li>';
                            }else if((isset($_SESSION["loggedin"]) && ($_SESSION["loggedin"] == 'admin'))){
                            echo '<li><a href="admin_employer.php">Employer</a></li>';
                            echo '<li><a href="admin_home.php">User</a></li>';
                            echo '<li><a href="job-listings.php?page=1">Job Listings</a></li>';
                            echo $_SESSION["username"]; echo '</li>';
                            echo '<li><a href="logout.php">Logout</a></li>';
                            }else if((isset($_SESSION["loggedin"]) && ($_SESSION["loggedin"] == 'employer'))){
                            echo '<li><a href="job-listings.php?page=1">Home</a></li>
                            <li><a href="job_add.php?id='; echo $_SESSION["id"]; echo'">Add Job</a></li>
                            <li><a href="Added-Job.php?page=1">Posted Job</a></li>
                            <li><a href="job-applied.php">Job Applied</a></li>';
                            echo $_SESSION["username"]; echo '</a></li>';
                            echo '<li><a href="logout.php">Logout</a></li>';
                            }else{
                            echo '<li><a href="job-listings.php?page=1">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="login.php">Login</a></li>';
                            }
                            ?>
                </ul>
            </nav>



        </div>
    </div>
</header>
