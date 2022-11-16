<?php

include '../utils/commons.php';
$mysqli_conn = new dbconnect_Msqli();
$pdo_conn = new dbconnect();

$sem1 = $mysqli_conn->conn->query("SELECT name,course_activity_id FROM courses_activity ORDER BY name");
$sem2 = $mysqli_conn->conn->query("SELECT name,course_activity_id FROM courses_activity ORDER BY name");


$id = $_SESSION['user'];

if (isset($_POST["submit"])){
    for ($a = 0; $a < count($_POST["lectures"]); $a++){
        $sql = "INSERT INTO weekly_workload_analysis(staff_id,lecture_hours, practical_hours,tutorials_seminars,preparations,marking,`others`)
         VALUES ($id,'" . $_POST["lectures"][$a] . "', '" . $_POST["prsc"][$a] . "','" . $_POST["tut"][$a] . "',
         '" . $_POST["prep"][$a] . "','" . $_POST["mark"][$a] . "','" . $_POST["others"][$a] . "')";

        mysqli_query($mysqli_conn->conn, $sql);

        $staff = $mysqli_conn->conn->query("SELECT workload_id from weekly_workload_analysis where staff_id=$id  order by workload_id desc limit 1;");

        while($row = mysqli_fetch_array($staff)) {
            $z = $row['workload_id'];
            try {
                $pdo_conn->conn->exec("INSERT INTO courses_activity_sem1_has_weekly_workload_analysis VALUES('$z','".$_POST["corsacty"][$a]."')");
            }catch (PDOException $e){
                echo $e->getMessage();

            }

        }
    }

    for ($a = 0; $a < count($_POST["lectures2"]); $a++){
        $sql2 = "INSERT INTO weekly_workload_analysis(staff_id,lecture_hours, practical_hours,tutorials_seminars,preparations,marking,others)
         VALUES ($id,'" . $_POST["lectures2"][$a] . "', '" . $_POST["prsc2"][$a] . "','" . $_POST["tut2"][$a] . "',
         '" . $_POST["prep2"][$a] . "','" . $_POST["mark2"][$a] . "','" . $_POST["others2"][$a] . "')";

        mysqli_query($mysqli_conn->conn, $sql2);

        $staff2 = $mysqli_conn->conn->query("SELECT workload_id from weekly_workload_analysis where staff_id=$id  order by workload_id desc limit 1;");

        while($row = mysqli_fetch_array($staff2)) {
            $z = $row['workload_id'];
            $pdo_conn->conn->exec("INSERT INTO courses_activity_sem2_has_weekly_workload_analysis VALUES('$z','".$_POST["corsacty2"][$a]."')");
        }
    }

    $chal = $_POST['challenge'];
    $soln = $_POST['solution'];
    $pdo_conn->conn->exec("INSERT INTO chal_sol(staff_id,challenge, solution,source) VALUES ('$id','$chal','$soln','Workload')");

    $_SESSION['research'] = 1;
    header("Location: resrch.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Work Load Analysis</title>

    <script language="javascript">
        function addRow(tableID) {

            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var colCount = table.rows[0].cells.length;

            for(var i=0; i<colCount; i++) {

                var newcell = row.insertCell(i);

                newcell.innerHTML = table.rows[2].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                        newcell.childNodes[0].value = "";
                        break;
                    case "checkbox":
                        newcell.childNodes[0].checked = false;
                        break;
                    case "select-one":
                        newcell.childNodes[0].selectedIndex = 0;
                        break;
                }
            }
        }

        function deleteRow(tableID) {
            try {
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;

                for(var i=0; i<rowCount; i++) {
                    var row = table.rows[i];
                    var chkbox = row.cells[0].childNodes[0];
                    if(null != chkbox && true == chkbox.checked) {
                        if(rowCount <= 3) {
                            alert("Cannot delete all the rows.");
                            break;
                        }
                        table.deleteRow(i);
                        rowCount--;
                        i--;
                    }
                }
            }catch(e) {
                alert(e);
            }
        }
    </script>
</head>

<body>


<div class="container-fluid">
    <h2>Work Load Analysis</h2>

    <form method="post">
        <table id="sem1" class="table">
            <thead class="bg-info">
            <td><strong>SEM 1</strong></td>
            <td>Courses and Activities</td>
            <td>Lectures</td>
            <td>Practical/Clinical practice</td>
            <td>Tutorials/Seminars</td>
            <td>Preparation</td>
            <td>Marking</td>
            <td>Others</td>
            </thead>
            <tbody>
            <tr>
                <td>
                    <INPUT class="button"type="button" value="Add Row" onclick="addRow('sem1')" />
                    <INPUT class="button" type="button" value="Delete Row" onclick="deleteRow('sem1')" />
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="chk"/></td>
                <td><select name="corsacty[]" id=""><?php
                        while($rows = $sem1->fetch_assoc()){
                            $dropdown = $rows['name'];
                            echo "<option value=".$rows['course_activity_id'].">$dropdown</option>";
                        }
                        ?></select>
                </td>
                <td><input type="number" style="width: 5em" name="lectures[]"></td>
                <td><input type="number" style="width: 5em" name="prsc[]"></td>
                <td><input type="number" style="width: 5em" name="tut[]"></td>
                <td><input type="number" style="width: 5em" name="prep[]"></td>
                <td><input type="number" style="width: 5em" name="mark[]"></td>
                <td><input type="number" style="width: 5em" name="others[]"></td>
            </tr>

            </tbody>
        </table>





        <table id="sem2" class="table">
            <thead class="bg-info">
            <td><strong>SEM 2</strong></td>
            <td>Courses and Activities</td>
            <td>Lectures</td>
            <td>Practical/Clinical practice</td>
            <td>Tutorials/Seminars</td>
            <td>Preparation</td>
            <td>Marking</td>
            <td>Others</td>
            </thead>
            <tbody>
            <tr>
                <td>
                    <INPUT class="button"type="button" value="Add Row" onclick="addRow('sem2')" />
                    <INPUT class="button" type="button" value="Delete Row" onclick="deleteRow('sem2')" />
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="chk"/></td>
                <td><select name="corsacty2[]" id=""><?php
                        while($rows = $sem2->fetch_assoc()){
                            $dropdown = $rows['name'];
                            echo "<option value=".$rows['course_activity_id'].">$dropdown</option>";
                        }
                        ?></select>
                </td>
                <td><input type="number" style="width: 5em" name="lectures2[]"></td>
                <td><input type="number" style="width: 5em" name="prsc2[]"></td>
                <td><input type="number" style="width: 5em" name="tut2[]"></td>
                <td><input type="number" style="width: 5em" name="prep2[]"></td>
                <td><input type="number" style="width: 5em" name="mark2[]"></td>
                <td><input type="number" style="width: 5em" name="others2[]"></td>
            </tr>
            </tbody>
        </table>
        <div class="">
            <fieldset class="">
                <legend>Challanges & solutions</legend>
                <label>Challenges experienced in carrying out your workload:</label><br>
                <textarea class="input-group" rows="5" name="challenge"></textarea><br>
                <label>Potential solutions identified: </label><br>
                <textarea class="input-group" rows="5" name="solution"></textarea><br>

            </fieldset>
        </div>
        <br>
        <button class="btn btn-success" type="submit" name="submit">Next</button>
    </form>
</div>


</body>
</html>