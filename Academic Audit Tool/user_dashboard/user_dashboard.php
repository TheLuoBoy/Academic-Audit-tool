<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/Styles/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Styles/style.css">
    <link rel="stylesheet" href="/Styles/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="/Styles/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="/Styles/bootstrap-4.4.1/js/bootstrap.bundle.min.js"></script>

</head>
<body class="body_top">
<div class="navbar bg-dark sticky-top">
    <div class="navbar-brand">
        <a href="#"><img src="/images/logo-audit.png" alt="logo" height="60" width="335"></a>
    </div>
    <ul class="nav justify-content-end">
        <table>
            <tr>
                <td>
                    <li class="nav-item">
                        <a href="" class="nav-link">

                            <img src="/images/Asset%203.png" height="30" width="30" class="user_image"/>
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
    <div class="row">
        <div class="col-4 col-sm-4">
            <div class="card complete_card">
                <div class="card-header">
                    <div class="card-title">
                        <strong>Completed Analysis</strong>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item bg-dark">
                            Week 2 Semester 1 year 2020/2021 <i class="badge badge-light">Finished</i><br>
                            <hr>
                            <?php echo 'On '.date('D-M-Y')." ".date('H:i');?>
                        </li>
                        <br>
                        <li class="list-group-item bg-dark">
                            Week 3 Semester 11 year 2020/2021 <i class="badge badge-light">Finished</i><br>
                            <hr>
                            <?php echo 'On '.date('D-M-Y')." ".date('H:i');?>
                        </li>
                        <br>
                        <li class="list-group-item bg-dark">
                            Week 5 Semester 1 year 2020/2021 <i class="badge badge-light">Finished</i><br>
                            <hr>
                            <?php echo 'On '.date('D-M-Y')." ".date('H:i');?>
                        </li>


                    </ul>
                </div>
            </div>
        </div>

        <div class="col col-sm">
            <div class="row ">
                <div class="col-12 ">
                    <div class="card complete_card1">
                        <div class="card-header">
                            <div class="card-title">
                                <strong>Upcoming Analysis</strong>
                            </div>
                        </div>
                        <div class="card-body justify-content-center">
                            <h2>Week 8 of Semester II academic year 2021/2022</h2>
                            <p><i>It's about time you filled this week's activity analysis</i></p>
                            <br>
                            <button class="btn btn-primary" >Fill out</button>
                        </div>
                    </div>

                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="card  complete_card2">
                        <div class="card-header">
                            <div class="card-title">
                                <strong>Uncompleted/pending Submissions</strong>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item bg-success">
                                    Week 1 Semester 1 year 2020/2021:  <i class="badge badge-danger">Pending!</i> <button style="float: right;" class="btn btn-primary">Complete</button>
                                </li>
                                <br>
                                <li class="list-group-item bg-success">
                                    Week 3 Semester 1 year 2020/2021:  <i class="badge badge-danger">Pending!</i> <button style="float: right;" class="btn btn-primary">Complete</button>
                                </li>
                                <br>
                                <li class="list-group-item bg-success">
                                    Week 2 Semester 1 year 2020/2021:  <i class="badge badge-danger">Pending!</i> <button style="float: right;" class="btn btn-primary">Complete</button>
                                </li>
                                <br>
                                <li class="list-group-item bg-success">
                                    Week 2 Semester 1 year 2020/2021:  <i class="badge badge-danger">Pending!</i> <button style="float: right;" class="btn btn-primary">Complete</button>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<br><br>
<footer class="container-fluid">
    <div>
        <hr>
        Must copyright &copy <?php echo date('Y');?>
    </div>

</footer>

</body>
</html>