<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header('location: /');
        exit();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Supervision of Master & PhD students</title>
    <link rel="stylesheet" href="/Styles/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Styles/style.css">
    <link rel="stylesheet" href="/Styles/font-awesome-4.7.0/css/font-awesome.min.css">


</head>
<body class="body_top">
    <div class="navbar bg-dark sticky-top">
        <div class="navbar-brand">
            <a href="#"><img src="/images/logo-audit.png" alt="logo" height="60" width="335"></a>
        </div>
        <ul class="nav">
            <table>
                <tr>
                    <td style="padding-right: 20px; padding-left: 20px">
                        <li class="nav-item">
                            <a href="" class="nav-link fa fa-bell"></a>
                        </li>
                    </td>
                    <td>
                        <?php
                        echo '<strong style="color: white">'.$_SESSION["username"].'</strong>';
                        ?>
                    </td>
                    <td style="padding-left: 20px">
                        <li class="nav-item">
                            <div class="dropleft">
                                <div data-toggle="dropdown">
                                    <img src="/images/Asset%202.png" height="30" width="30" class=" user_image"/>
                                    <div class="fa fa-caret-down"></div>
                                </div>

                                <ul class="dropdown-menu bg-dark" style="margin-top: 35px; margin-right: -50px">
                                    <li class="dropdown-item"><a href="" class="nav-link fa fa-user-circle">Profile</a></li>
                                    <li class="dropdown-item"><a href="" class="nav-link fa fa-car">Settings</a></li>
                                    <li class="dropdown-item"><a href="destroy.php" class="nav-link fa fa-sign-out">Sign out</a></li>

                                </ul>

                            </div>
                            <!--                            <a href="" class="nav-link fa fa-dropbox" data-toggle="dropdown"></a>-->

                        </li>
                    </td>
<!--                    <td>-->
<!--                        <div class="dropdown-toggle"></div>-->
<!--                    </td>-->
                </tr>
            </table>
        </ul>
    </div>
    <br>
    <div class="container-fluid">
    <!--     Insert form to fill of a particualr activity   -->


        <div class="card bg-dark" style="color: white;">
            <div class="card-body">

                <?php include '../audit_forms/Supervisions1.0.php'?>


            </div>

        </div>


    </div>
    <br>
    <br>
    <footer class="container-fluid" style="float: bottom; margin-bottom: -100%;">
        <div>
            <hr>
            Must copyright &copy <?php echo date('Y');?>
        </div>

    </footer>

    <script src="/Styles/jquery-3.2.1.slim.min.js"></script>
    <script src="/Styles/bootstrap-4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/Styles/bootstrap-4.4.1/js/bootstrap.min.js"></script>




</body>
</html>