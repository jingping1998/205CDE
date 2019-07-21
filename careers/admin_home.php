<?php
session_start();
require_once "config.php";
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
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
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

        <!--Middle Part-->
        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                                <div class="mb-5 text-center">
                                    <h1 class="text-white font-weight-bold">Member List</h1>
                                </div>
                                <tr class="table100-head">
                                    <th class="column1">UserName</th>
                                    <th class="column2">Password</th>
                                    <th class="column3">Created Date</th>
                                    <th class="column4">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $result = mysqli_query($link,"SELECT * FROM users");
                                    while($row = mysqli_fetch_assoc($result)){?>
                                <tr>
                                    <td class="column1">
                                        <?php echo $row['username']; ?>
                                    </td>
                                    <td class="column2">
                                        <?php echo $row['password']; ?>
                                    </td>
                                    <td class="column3">
                                        <?php echo $row['created_at']; ?>
                                    </td>
                                    <td class="column4">
                                        <a href="edit_user.php?id=<?php echo $row['id'];?>&username=<?php echo $row['username'];?>&password=<?php echo $row['password'];?>"><button type="button" class="btn btn-primary">Edit</button></a>
                                        <a onClick="return confirm('Are you sure you want to delete?')" href="delete_user.php?id=<?php echo $row['id'];?>;?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
