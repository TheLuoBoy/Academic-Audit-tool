<?php require 'config.php'  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>MUST ACADEMIC AUDIT-POSITION</title>
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
    <h4 class="card-title">POSITION</h4>
    <form method="POST" action="">
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">CURRENT POSITION</label>
        <div class="col-sm-10">
          <select class="form-control" name="position">
            <option value="TEACHING ASSISTANT">TEACHING ASSISTANT</option>
            <option value="JUNIOR LECTURER">JUNIOR LECTURER</option>
            <option value="LECTURER">LECTURER</option>
            <option value="SENIOR LECTURER">SENIOR LECTURER</option>
            <option value="ASSOC.PROFESSOR">ASSOC.PROFESSOR</option>
            <option value="PROFESSOR">PROFESSOR</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">FACULTY/ INTSITUTE</label>
        <div class="col-sm-10">
          <select class="form-control" name="faculty">
            <option value="FCI">FCI</option>
            <option value="FOM">FOM</option>
            <option value="FAST">FAST</option>
            <option value="FOBS">FOBS</option>
            <option value="FOS">FOS</option>
            <option value="FIS">FIS</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">DEPARTMENT</label>
        <div class="col-sm-10">
          <select class="form-control" name="department">
            <option value="COMPUTER SCIENCE">COMPUTER SCIENCE</option>
            <option value="SOFTWARE ENGINEERING">SOFTWARE ENGINEERING</option>
            <option value="INFORMATION TECHNOLOGY">INFORMATION TECHNOLOGY</option>
            <option value="COMPUTER ENGINEERING">COMPUTER ENGINEERING</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">DATE OF FIRST APPOINTMENT</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" name="dofa" required>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">YEARS SPENT ON CURRENT POSITION</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" name="years" placeholder="Eg 13" required>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">DATE OF LAST PROMOTION</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" name="dolp">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">ACADEMIC YEAR LAST APPRAISED</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="ayla" placeholder="E.g 2008/2009">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">RECOMMENDATION OF RECENT APPRAISAL</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" name="rora">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">COMMENT ON YOUR POSITION</label>
        <div class="col-sm-10">
          <input type="" class="form-control" name="comment" placeholder="Comment on your current position" required>
        </div>
      </div>

      <div class="buttons">
        <button type="reset" class="btn btn-danger">CLEAR FORM</button>
        <button type="submit" class="btn btn-success" name="btn_next">NEXT</button>
      </div>
    </form>
    <?php
      if (isset($_POST["btn_next"])) {
        $psn = $_POST['position'];
        $fac = $_POST['faculty'];
        $dept = $_POST['department'];
        $dofa = $_POST['dofa'];
        $years = $_POST['years'];
        $dolp = $_POST['dolp'];
        $ayla = $_POST['ayla'];
        $rora = $_POST['rora'];
        $comment = $_POST['comment'];
        $save = $conn->prepare("INSERT into staff_position(position,faculty,department,date_of_first,years_spent,date_of_promotion,academic_year,recommendation,comment) VALUES(?,?,?,?,?,?,?,?,?)");
        $save->bind_param("sssssssss",$psn,$fac,$dept,$dofa,$years,$dolp,$ayla,$rora,$comment);
        if ($save->execute()) {
          echo("Please proceed to the next step");
          // code...
        }
        else{
          echo("An error occured: ".@$save->error);
        }
      }

    ?>
    
  </div>
</div>
</div>

<style>
        .mb-3{
            position: relative;
            left: 5%;
            width: 100%;
        }
        .buttons{
          padding-left: 40%;
        }
        .carddown{
          padding-top: 5%;
        }
        .card-title{
            position: relative;
            left: 35%;
        }
        .card{
          background-color: lightgrey;
          border-color: darkgreen;
          width: 80%;
          /*position: relative;*/
          left: 10%;
          
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
