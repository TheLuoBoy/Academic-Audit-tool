<?php
    session_start();
    include "../utils/View_logic.php";

    if (isset($_SESSION['username'])){
        header("location: ../dash1.0/dashboard.php");
    }
    $login = new View_logic();

    $login->login();


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Login | Must Academic Audit Tool</title>
    <link rel="stylesheet" href="/Styles/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Styles/formStyle.css">
</head>
<body class="" style="background-color: #4d4a4a; background-repeat: no-repeat; background-size: 100%">
    <div class="container-fluid" >
        <div class="row" style="padding: 5%;">
            <div class="col-4">
            </div>
            <div class="col-4">
                <img src="/images/logo-audit.png" alt="logo" height="90" width="560">

            </div>
            <div class="col-4">
            </div>
        </div>
        <div class="row align-content-center">
            <div class="col">
                <div class="card mycard" style="box-shadow: 3px 3px 3px #3a3333;  color: #ffffff;position: relative; margin: -3% 32%; border-radius: 15px; z-index: 1; background-color: #623636">
                    <div class="card-header card-title">
                        <h2>Sign In</h2>
                    </div>
                    <div class="card-body">
                        <div id="error1" class="card-text" style="display: none; color: orangered">
                            <?php echo '<i>Invalid username or password</i>'; ?>
                        </div>
                        <form action="" method="post" class="form-group">
                            <label>Username: </label>
                            <input type="text" name="login_user" class="form-control" required/>
                            <br>
                            <label>Password: </label>
                            <input type="password" name="login_pass" class="form-control" required/>

                            <p><a href="#" class="btn-link">Forgot password ?</a></p>

                            <button type="submit" name="submit" class="form-control btn btn-primary" >Sign in</button>
                        </form>
                    </div>
                    <div class="card-footer" style="text-align: right">
                        <em >MUST copyright &copy <?php echo date('Y')?></em>
                    </div>

                </div>

            </div>

        </div>

        
    </div>
    <script src="/Styles/jquery-3.2.1.slim.min.js"></script>
    <script src="/Styles/bootstrap-4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/Styles/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="/Styles/bootstrap-4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
