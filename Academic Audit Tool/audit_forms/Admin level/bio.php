<?php require 'config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ACADEMIC AUDIT-STAFF BIO-DATA</title>
</head>
<body>

<nav class="navbar fixed-top navbar-expand-xl navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MUST ACADEMIC AUDIT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse show" id="navbarDark">
      <ul class="navbar-nav me-auto mb-2 mb-xl-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="carddown">
<div class="card border-primary text-primary">
  <div class="card-body">
    <h5 class="card-title">STAFF BIO-DATA</h5>
    <form method="POST" action="">
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">FIRST NAME</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" name="fname" required>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">LAST NAME</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" name="lname" required>
        </div>
      </div>
      <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">GENDER</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="MALE" checked="">
            <label class="form-check-label" for="gridRadios1">
              MALE
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="FEMALE">
            <label class="form-check-label" for="gridRadios2">
              FEMALE
            </label>
          </div>
        </div>
      </fieldset>
      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">DATE OF BIRTH</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="inputPassword3" name="dob" required>
        </div>
      </div>
       <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">EMAIL ADDRESS</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="inputPassword3" name="email" required>
        </div>
      </div>
       <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">TELEPHONE</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputPassword3" name="tel" required>
        </div>
      </div>
      <div class="buttons">
        <button type="reset" class="btn btn-danger">CLEAR FORM</button>
        <button type="submit" class="btn btn-success" name="btn_next">NEXT</button>
      </div>
    </form>
    <?php
      if (isset($_POST["btn_next"])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];

        $save = $conn->prepare("INSERT into staff_info(fname,lname,gender,date_birth,email,tel) VALUES(?,?,?,?,?,?)");
        $save->bind_param("ssssss",$fname,$lname,$gender,$dob,$email,$tel);
        if ($save->execute()) {
          echo("Please proceed to the next step");
          // code...
        }
        else{
          echo("An error occured, Reload the page ".@$save->error);
        }
       } 
    ?>
    
  </div>
</div>
</div>

<style>

        .mb-3{
            position: relative;
            left: 35%;
        }
        .buttons{
          padding-left: 60%;
        }
        .card-title{
            position: relative;
            left: 45%;
        }
        .form-floating{
         width: 80%;
         position: relative;
         left: 35%;
  
        }
  
        .card{
          background-color: lightgreen;
          border-color: darkgreen;
          width: 60%;
          position: relative;
          left: 20%;
          
        }
        .carddown{
          padding-top: 5%;
        }
        .form-control{ 
          width: 50%;
          position: relative; 
        }
  
        .btn-outline-success{
          color: beige;
        }
  
        .button:hover{
          background-color: green;
        }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
</body>
</html>
