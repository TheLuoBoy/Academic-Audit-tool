<!--

/////////////////////////////////////////
// IGNORE THIS, IT'S FOR EXPERIMENTALS //
////////////////////////////////////////


-->






<!--<form method="post" enctype="multipart/form-data">-->
<!--    <label for="myfile">Upload:</label>-->
<!--    <input type="file" id="myfile" name="myfile">-->
<!--    <button class="btn btn-primary" name="ftpt" type="submit" id="submit_publication" style="margin-left: 45%; margin-top: 20px">Submit</button>-->
<!---->
<!--</form>-->
<!---->
<!---->
<?php
//    function getData(){
//        $host = "localhost";
//        $user ="root";
//        $password = '';
//        $port = 3306;
//        $db = "academic_audit_db";
//
//
//        try{
//            $conn = new PDO("mysql:host=$host;port=$port;dbname=$db",$user,$password);
//            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//            echo 'connected succesfully';
//
//            $statement = $conn->prepare("SELECT * FROM staff_info");
//            $statement->execute();
//
//            $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
//            foreach($statement->fetchAll() as $item){
//                echo "Got: ".$item['staff_id']." ".$item['fname'].' '.$item['lname'];
//            }
//
//
//
//        }catch (PDOException $e){
//            echo "connection failed\n".$e->getMessage();
//        }
//        $conn = null;
//
//    }
//
//    if (isset($_POST['ftpt'])){
//        $target_dir = "uploads/";
//        $target_file = $target_dir . basename($_FILES["myfile"]["name"]);
//        $uploadOk = 1;
//        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//        if ($imageFileType == "csv" || $imageFileType == "xls" || $imageFileType == "xlsx" || $imageFileType == "numbers"){
//            echo 'file is ok';
//        }else{
//            echo 'extension: '.$imageFileType;
//        }
//
//        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
//            echo "<br><br>The file ". htmlspecialchars( basename( $_FILES["myfile"]["name"])). " has been uploaded.";
//        } else {
//            echo "Failed to upload";
//        }
//
//    }
//
//
//
//    ?>
