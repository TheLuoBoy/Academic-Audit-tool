<?php require 'config.php'; 

//session_start();
//$_SESSION['userid'] = $row['staff_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>


    
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-xl navbar-light bg-light">
        <div class="container-fluid">
          <img src="logo.jpeg" height="120px" width="120px">
          <a class="navbar-brand" href="#"><h3>MUST ACADEMIC AUDIT</h3></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo2" aria-controls="navbarTogglerDemo2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse show" id="navbarTogglerDemo2">
            <ul class="navbar-nav me-auto mb-2 mb-xl-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
  </nav><br>

  











  



  <form method="POST" id="add_form">
  <div class="col">
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">ACADEMIC QUALIFICATIONS</h5><br>

        <form method="POST" action="">
    
 
    <table>
        <tr>
            <th>#</th>
            <th>INSTITUTION</th>
            <th>LOCATION</th>
            <th>QUALIFICATION</th>
            <th>COMPLETION DATE</th>
            <th>STUDY FIELD</th>
        </tr>
        <tbody id="tbody"></tbody>
    </table>
 
    <button type="button" class="add_row"onclick="addItem();">Add Row</button><br><br>
    
    


          <br><br>
    </div>
    
  </div>

  <script>
    var items = 0;
    function addItem() {
        items++;
 
        var html = "<tr>";
            html += "<td>" + items + "</td>";
            html += "<td><input type='text' name='institution[]'></td>";
            html += "<td><input type='text' name='locationss[]'></td>";
            html += "<td><input type='text' name='qualification[]'></td>";
            html += "<td><input type='date' name='year_completion[]'></td>";
            html += "<td><input type='text' name='study_field[]'></td>";
            html += "<td><button type='button' class='delete' onclick='deleteRow(this);'>Delete</button></td>"
        html += "</tr>";
 
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
    }
 
function deleteRow(button) {
    items--
    button.parentElement.parentElement.remove();
    // first parentElement will be td and second will be tr.
}
</script>

<?php
 
    if (isset($_POST["add_record"]))
    {
       
        for ($a = 0; $a < count($_POST["institution"]); $a++)
        {
            $sql = "INSERT INTO obtained_degree(institution, locationss,qualifications,year_completion,study_field) VALUES ('" . $_POST["institution"][$a] . "', '" . $_POST["locationss"][$a] . "','" . $_POST["qualification"][$a] . "','" . $_POST["year_completion"][$a] . "','" . $_POST["study_field"][$a] . "')";
            //mysqli_query($conn, $sql);
            $query= mysqli_query($conn, $sql);

            
        }
        if($query){

          for ($a = 0; $a < count($_POST["institutions"]); $a++)
        {
          $sqls = "INSERT INTO professional_trainings(institution, locations,qualification,year_completion,study_field) VALUES ('" . $_POST["institutions"][$a] . "', '" . $_POST["locationsss"][$a] . "','" . $_POST["qualifications"][$a] . "','" . $_POST["year_completions"][$a] . "','" . $_POST["study_fields"][$a] . "')";
      
          $query2= mysqli_query($conn, $sqls);
          
        
        }

      }
        if($query2){
          $levels = $_POST['levels'];
          $year = $_POST['year'];
          $sponsor = $_POST['sponsor'];
          $comment = $_POST['comment'];
          

          $saves = $conn->prepare("INSERT into academic_degree(levels,years,sponsor,comment) VALUES(?,?,?,?)");
          $saves->bind_param("ssss",$levels,$year,$sponsor,$comment);

          if ($saves->execute()) {
            //echo("Please proceed to the next step");
            // code...
          }
        
          else{
            echo("An error occured, Reload the page ".@$save->error);
          }
      }
      
 
        
    }
 
?>

  <div class="col">
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">PROFESSIONAL TRAINING</h5><br>
    <table>
        <tr>
            <th>#</th>
            <th>INSTITUTION</th>
            <th>LOCATION</th>
            <th>QUALIFICATION</th>
            <th>COMPLETION DATE</th>
            <th>STUDY FIELD</th>
        </tr>
        <tbody id="tbodys"></tbody>
    </table>
 
    <button type="button" class="add_row"onclick="addItems();">Add Row</button><br><br>
    
    

<script>
    var item = 0;
    function addItems() {
        item++;
 
        var htmls = "<tr>";
            htmls += "<td>" + item + "</td>";
            htmls += "<td><input type='text' name='institutions[]'></td>";
            htmls += "<td><input type='text' name='locationsss[]'></td>";
            htmls += "<td><input type='text' name='qualifications[]'></td>";
            htmls += "<td><input type='date' name='year_completions[]'></td>";
            htmls += "<td><input type='text' name='study_fields[]'></td>";
            htmls+= "<td><button type='button' class='delete' onclick='deleteRow(this);'>Delete</button></td>"
        htmls += "</tr>";
 
        var rows = document.getElementById("tbodys").insertRow();
        rows.innerHTML = htmls;
    }
 
function deleteRow(button) {
    item--
    button.parentElement.parentElement.remove();
    // first parentElement will be td and second will be tr.
}

</script>






        </div>        

        </div>
        
        
        <div class="card">
        <h5>Are you currently pursuing any academic degree?</h5>
            <div class="card-body">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioDefault" id="formRadioChecked" checked="" value="">
                    <label class="form-check-label" for="formRadioChecked">NO</label>
                  </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioDefault" id="formRadioDefault" onclick="handleClick(this);"value="3">
                    <label class="form-check-label" for="formRadioDefault">YES</label>
                  </div>


                  
                  <div  type="text" name="text" id="txtComments" style="display: none;">
                    
                    <select class="select" name="levels">
                        <option value="PHD">PHD</option>
                        <option value="MASTERS">MASTERS</option>
                        <option value="BACHELORS">BACHELORS</option>
                        
                      </select><br><br>
                      <div class="form-floatin">
                        <label for="floatingPassword">Year</label>
                        <input type="date" class="form-control" id="floatingPassword" placeholder="" name="year">
                        
                      </div><br>

                      <div class="form-floatin">
                        <label for="floatingPassword">Name of Sponsor</label>
                        <input type="text" class="form-control" id="floatingPassword" placeholder="" name="sponsor">
                        
                      </div><br>

                      <div class="form-floatin">
                        <label for="floatingPassword">Comment</label>
                      </div>

                      <textarea id="w3review" name="comment" rows="4" cols="50">
                      </textarea>

                      

                        
                  </div>
                  

                  

                  

                <script type="text/javascript">
                    function handleClick(myRadio) {
                    var selectedValue = myRadio.value;
                    if(selectedValue=="3")
                    {
                    document.getElementById("txtComments").style.display = "";
                    //Show textbox
                    }
                    else
                    {
                    document.getElementById("txtComments").style.display = 'none';
                    //Hide textbox.
                    }
                    }
                    
                      
                  </script>       
            </div><br>
            <div class="buttons">
        <button type="reset" class="btn btn-danger">CLEAR FORM</button>
        <button type="submit" class="btn btn-success" name="add_record">SUBMIT</button>
      </div><br>
            
          </div><br><br>
          
    </div>

    
  </div>
</form>
<?php
      
       


      if(isset($_POST["nextbtn"])){
          
        


        


      }
      
      

    ?>


  <style>
    .add_row:hover{
      background-color:green;
    }
    .delete:hover{
      background-color:red;
    }
    .select{
        width: 50%;
    }
    .tt{
        width: 100%;
    }
    .table-bordered{
        width: 100%;
    }
    .btn-secondary{
        position: relative;
        left: 68.5%;
    }
    .mb-3{
        position: relative;
        left: 35%;
    }
    .card-title{
        position: relative;
        left: 40%;
    }
  
    .container-fluid{

      background-color: green;

    }

    .form-floating{
     width: 80%;
     position: relative;
     left: 35%;

    }

    .card{
      background-color: lightgrey;
      border-color: darkgreen;
      width: 80%;
      position: relative;
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



</body>
</html>