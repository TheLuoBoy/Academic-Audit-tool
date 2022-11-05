<?php
    include "";
    //include "commons.php";
    $host = "localhost";
    $user = "root";
    $password = '';
    $port = 3306;
    $db = "academic_audit_db";

    if(isset($_POST['submit_upload'])){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["myfile"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if ($imageFileType == "csv" || $imageFileType == "xls" || $imageFileType == "xlsx" || $imageFileType == "numbers"){
            if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
                echo "<br><br>The file ". htmlspecialchars( basename( $_FILES["myfile"]["name"])). " has been uploaded.";
            } else {
                echo "Failed to upload";
            }
        }else{
            echo 'extension: Invalid file';
        }




    }else if(isset($_POST['submit_form'])){
        $f1 = $_POST['authorSelect1'];
        $f2 = $_POST['publish_title1'];
        $f3 = $_POST['publication_year1'];
        $f4 = $_POST['type_select1'];
        $f5 = $_POST['publisher1'];
        $f6 = $_POST['publish_volume1'];
        $f7 = $_POST['isbn1'];

        try {
            $conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'connected succesfully';
            $statement = $conn->prepare("INSERT INTO peer_reviewed_publications VALUES (1,:authorSelect1,
                                           :publish_title1,:publication_year1,:type_select1,:publisher1,
                                           :publish_volume1,:isbn1)");

            $statement->bindParam(':authorSelect1',$f1);
            $statement->bindParam(':publish_title1',$f2);
            $statement->bindParam(':publication_year1',$f3);
            $statement->bindParam(':type_select1',$f4);
            $statement->bindParam(':publisher1',$f5);
            $statement->bindParam(':publish_volume1',$f6);
            $statement->bindParam(':isbn1',$f7);
            if ($statement->execute()){
                echo "saved";

            }else{
                echo "failed..";
            }
            $conn->exec("INSERT INTO peer_reviewed_publications_has_staff_info VALUES(1,202210001)");
            echo '<script>alert("submissions make")</script>';
//            header("location:scientific_commun.php");
//            exit();

        } catch (PDOException $e) {
            echo "Something went wrong \n" . $e->getMessage();
            echo '<script>alert("an error occurred")</script>';

//            header("location:/");
        }
        $conn = null;


    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Publications</title>
    <link rel="stylesheet" href="/Styles/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Styles/formStyle.css">
    <script>
        function anim(){
            if (app_others.checked){
                if (document.getElementById("othersect").style.display ==="none"){
                    document.getElementById("othersect").style.display = "block";
                }
            }else{
                document.getElementById("othersect").style.display = "none";
            }
        }

        function anim1(){
            if (upload_radio.checked){
                if (document.getElementById("upld").style.display ==="none"){
                    document.getElementById("upld").style.display = "block";
                    document.getElementById("publication_form").style.display = "none";
                    fill_form.checked = false;
                }
            }
        }
        function anim2(){
            if (fill_form.checked){
                if (document.getElementById("publication_form").style.display ==="none"){
                    document.getElementById("publication_form").style.display = "block";
                    document.getElementById("upld").style.display = "none";
                    upload_radio.checked = false;

                }
            }
        }

    </script>


</head>
<body>
<div class="container-fluid">
    <div class="">

    </div>
    <h5>Fill in for the Publications made or participated in before and after joining Must</h5>

    <div class="col">
        <label for="pub_total">How many your peer reviewed publications are already uploaded on the MUST repository (ir.must.ac.ug)</label>
        <br><input type="number" id="pub_total" class=""/>
    </div><br><br>

    <div class="col">
        <label>Which of the following Applications displaying publications are you currently subscribed to:</label>
        <br>
        <input id="app_google" type="checkbox" />
        <label for="app_google">Google</label><br>
        <input id="app_researchgate" type="checkbox" />
        <label for="app_researchgate">ResearchGate</label><br>
        <input id="app_academia" type="checkbox" />
        <label for="app_academia">Academia</label><br>
        <input onclick="anim()" id="app_others" type="checkbox" />
        <label for="app_google">Others</label><br>

        <div id="othersect" style="display: none;">
            <p>specify: <input type="text" id="otherspecifyfield"/></p>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h4>Details of your Peer-reviewed Publications</h4>

        <input type="radio" id="upload_radio" name="upload" onclick="anim1();">
        <label for="upload_radio">Upload File</label><br>
        <div id="upld" style="display: none;">
            <fieldset style="padding: 20px; border: solid green 2px; border-radius: 5px">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        Upload a spreadsheet file with all the above details(.xml, .txt, .csv)<br>
                        <label for="myfile">Upload:</label>
                        <input type="file" id="myfile" name="myfile">
                        <button class="btn btn-primary" name="submit_upload" type="submit" id="submit_publication" style="margin-left: 45%; margin-top: 20px">Submit</button>
                </form>

            </fieldset>

        </div>
        <input type="radio" id="fill_form" name="fill_form" onclick="anim2()">

            <label for="fill_form">Fill in a specific number of Publications</label><br>
            <div id="publication_form" style="display: none;">
                <form name="publication_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table id="publication_table" class="" style="padding: 20px">
                        <tr class="d-table-row">
                            <td class="d-table-cell">
                                Author
                            </td>
                            <td class="d-table-cell">
                                Title
                            </td>
                            <td class="d-table-cell">
                                Year of Publication
                            </td>
                            <td class="d-table-cell">
                                Type
                            </td>
                            <td class="d-table-cell">
                                Publisher
                            </td>
                            <td class="d-table-cell">
                                Volume Number
                            </td>
                            <td class="d-table-cell">
                                ISBN:
                            </td>

                        </tr>
                        <tr class="d-table-row">
                            <td class="d-table-cell">
                                <select id="authorSelect1" name="authorSelect1" required>
                                    <option disabled>--select--</option>
                                    <option>First-Author</option>
                                    <option>Co-Author</option>
                                </select>
                            </td>
                            <td class="d-table-cell">
                                <input type="text" id="publish_title1" name="publish_title1" required/>
                            </td>
                            <td class="d-table-cell">
                                <input type="date" id="publication_year1" name="publication_year1" required/>
                            </td>
                            <td class="d-table-cell">
                                <select id="type_select1" name="type_select1" required>
                                    <option disabled>--select--</option>
                                    <option>JOURNAL</option>
                                    <option>book</option>
                                    <option>book chapter</option>
                                    <option>conference proceedings</option>
                                </select>
                            </td>
                            <td class="d-table-cell">
                                <input type="text" id="publisher1" name="publisher1" required/>
                            </td>
                            <td class="d-table-cell">
                                <input type="number" id="publish_volume1" name="publish_volume1" required/>
                            </td>
                            <td class="d-table-cell">
                                <input type="text" id="isbn1" name="isbn1" required/>
                            </td>
                        </tr>
                    </table>
                    <button class="btn btn-success" name="submit_form" type="submit" id="submit_publication" style="margin-left: 95%; margin-top: 20px">Submit</button>
            </div>
            </form>

</div>

<script src="Styles/bootstrap-4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
