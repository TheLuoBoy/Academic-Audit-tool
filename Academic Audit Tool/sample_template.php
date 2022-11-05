<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="Styles/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="stylesheet" href="Styles/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="Styles/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="Styles/bootstrap-4.4.1/js/bootstrap.bundle.min.js"></script>

</head>
<body class="body_top">
    <div class="navbar bg-dark sticky-top">
        <div class="navbar-brand">
            <a href="#"><img src="images/logo-audit.png" alt="logo" height="60" width="335"></a>
        </div>
        <ul class="nav justify-content-end">
            <table>
                <tr>
                    <td>
                        <li class="nav-item">
                            <a href="" class="nav-link">

                                <img src="" height="30" width="30" class="user_image"/>
                                <?php
                                //                            echo $_SESSION['username']
                                echo 'Martin';
                                ?>

                            </a>
                        </li>
                    </td>
                    <td>
                        <li class="nav-item">
                            <a href="" class="nav-link fa fa-bell"></a>
                        </li>
                    </td>
                    <td>
                        <li class="nav-item">
                            <a href="" class="nav-link fa fa-bars"></a>
                        </li>
                    </td>
                </tr>
            </table>
        </ul>
    </div>
    <br>
    <div class="container-fluid">
    <!--     Insert form to fill of a particualr activity   -->
    </div>
    <br>
    <br>
    <footer class="container-fluid" style="float: bottom; margin-bottom: -100%;">
        <div>
            <hr>
            Must copyright &copy <?php echo date('Y');?>
        </div>

    </footer>

</body>
</html>