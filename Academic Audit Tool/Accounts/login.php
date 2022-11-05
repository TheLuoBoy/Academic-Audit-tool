<?php
    include('../utils/commons.php');
    $err1 = 'none';
    if (isset($_POST['submit'])){
        if ($_POST['login_user'] != null && chop($_POST['login_user']) != "" && $_POST['login_pass'] != null){
            $u = $_POST['login_user'];
            $ps = $_POST['login_pass'];
            $Connect = new dbconnect();
            $result = $Connect->getData("SELECT * FROM authentications WHERE username= '$u' AND password='$ps'");
            $Connect->CloseConnection();
            if ($result != false){
                $_SESSION['user'] = $result['staff_id'];
                header('location: ../user_dashboard/user_dashboard.php');
            }else{
//                echo '<script>document.getElementById("error1").style.display = "block";</script>';
                $err1 = 'true';
            }

        }else{
            echo 'Invalid input';
        }

    }


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
<body class="" style="background-color: #1d2124; background-repeat: no-repeat; background-size: 100%">
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
                <div class="card mycard" style="box-shadow: 3px 3px 3px #3a3333;  color: #ffffff;position: relative; margin: -3% 32%; border-radius: 15px; z-index: 1; background-color: #2e362e">
                    <div class="card-header card-title">
                        <h2>Sign In</h2>
                    </div>
                    <div class="card-body">
                        <div id="error1" class="card-text" style="display: none; color: orangered">
                            <?php if ($err1 == 'true') {echo '<i>Invalid username or password</i>';} ?>
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

    <script src="/Styles/bootstrap-4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
