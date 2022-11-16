<?php

include '../utils/commons.php';
$mysqli_conn = new dbconnect_Msqli();
$pdo_conn = new dbconnect();

$id = $_SESSION['user'];

if (isset($_POST["submit"])) {


    if (isset($_POST["onResearch"])) {
        for ($a = 0; $a < count($_POST["grant"]); $a++) {
            $on_going = "INSERT INTO on_going_research(grant_number,funder, amount,start_date,end_date,`role`,title)
         VALUES ('" . $_POST["grant"][$a] . "','" . $_POST["funder"][$a] . "', '" . $_POST["amount"][$a] . "','" . $_POST["start_date"][$a] . "',
         '" . $_POST["end_date"][$a] . "','" . $_POST["role"][$a] . "','" . $_POST["title"][$a] . "')";

            mysqli_query($mysqli_conn->conn, $on_going);

            $research_id = $mysqli_conn->conn->query("SELECT research_id from on_going_research order by research_id desc limit 1;");
            $z = mysqli_fetch_array($research_id);
            $r_id = $z['research_id'];
            $pdo_conn->conn->exec("INSERT INTO on_going_research_has_staff_info VALUES($r_id,$id)");


            $colabs = "INSERT INTO research_collaborators(colab_name) VALUES('" . $_POST["collaborators"][$a] . "')";
            mysqli_query($mysqli_conn->conn, $colabs);

            $colab_id = $mysqli_conn->conn->query("SELECT collab_id from research_collaborators order by collab_id desc limit 1;");
            $y = mysqli_fetch_array($colab_id);
            $c_id = $y['collab_id'];
            $pdo_conn->conn->exec("INSERT INTO research_collaborators_has_on_going_research VALUES($c_id,$r_id)");


        }
    }

    if (isset($_POST["compResearch"])) {
        for ($a = 0; $a < count($_POST["cGrant"]); $a++) {
            $on_going = "INSERT INTO completed_research(grant_number,funder, amount,start_date,end_date,role,title,number_male_beneficiaries,number_female_beneficiaries)
         VALUES ('" . $_POST["cGrant"][$a] . "','" . $_POST["cFunder"][$a] . "', '" . $_POST["cAmount"][$a] . "','" . $_POST["cStart"][$a] . "',
         '" . $_POST["cEnd"][$a] . "','" . $_POST["cRole"][$a] . "','" . $_POST["cTitle"][$a] . "','" . $_POST["cMale"][$a] . "','" . $_POST["cFmale"][$a] . "')";

            mysqli_query($mysqli_conn->conn, $on_going);

            $cResearch_id = $mysqli_conn->conn->query("SELECT research_id from completed_research order by research_id desc limit 1;");
            $cZ = mysqli_fetch_array($cResearch_id);
            $cr_id = $cZ['research_id'];
            $pdo_conn->conn->exec("INSERT INTO completed_research_has_staff_info VALUES($cr_id, $id)");

        }
    }

    if (isset($_POST["compResearch"]) || isset($_POST["onResearch"])) {
        $chal = $_POST['challenge'];
        $soln = $_POST['solution'];
        $pdo_conn->conn->exec("INSERT INTO chal_sol(staff_id,challenge, solution,source) VALUES ('$id','$chal','$soln','Research')");
    }

    if (isset($_POST["invent"])) {
        for ($a = 0; $a < count($_POST["innov"]); $a++) {
            $invents = "INSERT INTO inventions_made(invention_name,invention_year, patent_company,role,income_generated)
         VALUES ('" . $_POST["innov"][$a] . "','" . $_POST["year"][$a] . "', '" . $_POST["company"][$a] . "',
         '" . $_POST["pRole"][$a] . "','" . $_POST["income"][$a] . "')";

            mysqli_query($mysqli_conn->conn, $invents);

            $invention_id = $mysqli_conn->conn->query("SELECT invention_id from inventions_made order by invention_id desc limit 1;");
            $iZ = mysqli_fetch_array($invention_id);
            $i_id = $iZ['invention_id'];
            $pdo_conn->conn->exec("INSERT INTO inventions_made_has_staff_info VALUES($i_id,$id)");


            $i_colabs = "INSERT INTO invention_collaborators(colab_name) VALUES('" . $_POST["inv_collab"][$a] . "')";
            mysqli_query($mysqli_conn->conn, $i_colabs);

            $icolab_id = $mysqli_conn->conn->query("SELECT colab_id from invention_collaborators order by colab_id desc limit 1;");
            $id_collab = mysqli_fetch_array($icolab_id);
            $ic_id = $id_collab['colab_id'];
            $pdo_conn->conn->exec("INSERT INTO invention_collaborators_has_inventions_made VALUES($ic_id,$i_id)");


        }
    }
    header('location: ../audit_forms/supervisions.php');

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <SCRIPT language="javascript">
        function addRow(tableID) {

            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var colCount = table.rows[0].cells.length;

            for (var i = 0; i < colCount; i++) {

                var newcell = row.insertCell(i);

                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch (newcell.childNodes[0].type) {
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

                for (var i = 0; i < rowCount; i++) {
                    var row = table.rows[i];
                    var chkbox = row.cells[0].childNodes[0];
                    if (null != chkbox && true == chkbox.checked) {
                        if (rowCount <= 2) {
                            alert("Cannot delete all the rows.");
                            break;
                        }
                        table.deleteRow(i);
                        rowCount--;
                        i--;
                    }
                }
            } catch (e) {
                alert(e);
            }
        }

    </SCRIPT>
    <script type="text/javascript">
        function handleClick(myRadio) {
            var selectedValue = myRadio.value;
            if (selectedValue == "1") {
                document.getElementById("research").style.display = "";
                document.getElementById("cha_soln").style.display = "";
                const noBtn = document.getElementById('onResearch_no');
                noBtn.checked = false;
                //Show textbox
            } else if (selectedValue == "2") {
                document.getElementById("cresearch").style.display = "";
                document.getElementById("cha_soln").style.display = "";
                const noBtn = document.getElementById('compResearch_no');
                noBtn.checked = false;
            } else if (selectedValue == "3") {
                document.getElementById("invention").style.display = "";
                const noBtn = document.getElementById('invent_no');
                noBtn.checked = false;
            } else if (selectedValue == "4") {
                document.getElementById("research").style.display = "none";
                document.getElementById("cha_soln").style.display = "none";
                const yesBtn = document.getElementById('onResearch_yes');
                yesBtn.checked = false;
                //Hide textbox.
            } else if (selectedValue == "5") {
                document.getElementById("cresearch").style.display = "none";
                document.getElementById("cha_soln").style.display = "none";
                const yesBtn = document.getElementById('compResearch_yes');
                yesBtn.checked = false;
                //Hide textbox.
            } else if (selectedValue == "6") {
                document.getElementById("invention").style.display = "none";
                const yesBtn = document.getElementById('invent_yes');
                yesBtn.checked = false;
                //Hide textbox.
            }
        }
    </script>

</head>
<body>
<form method="post">
    <div class="container-fluid">
        <h2>On going Reasearch</h2>
        <h6>Do you have ongoing research and innovation grants?</h6>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="!onResearch" id="onResearch_no" checked="checked"
                   value="4" onclick="handleClick(this);">
            <label class="form-check-label" for="formRadioChecked">NO</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="onResearch" id="onResearch_yes" value="1"
                   onclick="handleClick(this);">
            <label class="form-check-label" for="formRadioDefault">YES</label>
        </div>

        <div id="research" style="display: none;">


            <table id="research1" class="table">
                <thead class="bg-info">
                <td></td>
                <td>Grant Number</td>
                <td>Funder</td>
                <td>Amount</td>
                <td>Start date</td>
                <td>End date</td>
                <td>Role</td>
                <td>Title of the project</td>
                <td>Collaborator</td>
                </thead>

                <tbody>
                <INPUT class="button" type="button" value="Add Row" onclick="addRow('research1')"/>
                <INPUT class="button" type="button" value="Delete Row" onclick="deleteRow('research1')"/>

                <tr>
                    <td><input type="checkbox" name="chk"/></td>
                    <td><input type="text" style="width: 10em" name="grant[]"></td>
                    <td><input type="text" style="width: 10em" name="funder[]"></td>
                    <td><input type="number" style="width: 10em" name="amount[]"></td>
                    <td><input type="date" style="width: 8em" name="start_date[]"></td>
                    <td><input type="date" style="width: 8em" name="end_date[]"></td>
                    <td>
                        <select name="role[]" id="">
                            <option value=""></option>
                            <option value="PI">PI</option>
                            <option value="Co-I">Co-I</option>
                        </select>
                    </td>
                    <td><input type="text" style="width: 10em" name="title[]"></td>
                    <td><input type="text" style="width: 12em" name="collaborators[]" placeholder="Use ',' to separate">
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container-fluid">
        <h2>Completed Reasearch</h2>
        <h6>Are there research and innovation grants you have completed since you joined MUST?</h6>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="!compResearch" id="compResearch_no" checked="checked"
                   value="5" onclick="handleClick(this);">
            <label class="form-check-label" for="formRadioChecked">NO</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="compResearch" id="compResearch_yes" value="2"
                   onclick="handleClick(this);">
            <label class="form-check-label" for="formRadioDefault">YES</label>
        </div>

        <div id="cresearch" style="display: none;">


            <table id="research2" class="table">
                <thead class="bg-info">
                <td></td>
                <td>Grant Number</td>
                <td>Funder</td>
                <td>Amount</td>
                <td>Start date</td>
                <td>End date</td>
                <td>Role</td>
                <td>Title of the project</td>
                <td>No. Male beneficiaries</td>
                <td>No. Female beneficiaries</td>
                </thead>

                <tbody>
                <INPUT class="button" type="button" value="Add Row" onclick="addRow('research2')"/>
                <INPUT class="button" type="button" value="Delete Row" onclick="deleteRow('research2')"/>

                <tr>
                    <td><input type="checkbox" name="chk"/></td>
                    <td><input type="text" style="width: 10em" name="cGrant[]"></td>
                    <td><input type="text" style="width: 10em" name="cFunder[]"></td>
                    <td><input type="number" style="width: 10em" name="cAmount[]"></td>
                    <td><input type="date" style="width: 8em" name="cStart[]"></td>
                    <td><input type="date" style="width: 8em" name="cEnd[]"></td>
                    <td>
                        <select name="cRole[]" id="">
                            <option value=""></option>
                            <option value="PI">PI</option>
                            <option value="Co-I">Co-I</option>
                        </select>
                    </td>
                    <td><input type="text" style="width: 10em" name="cTitle[]"></td>
                    <td><input type="number" style="width: 5em" name="cMale[]"></td>
                    <td><input type="number" style="width: 5em" name="cFmale[]"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="cha_soln" style="display: none;">
        <fieldset class="">
            <legend>Challanges & solutions</legend>
            <label>Challenges experienced in carrying out your workload:</label><br>
            <textarea class="input-group" style="width: 600px; height: 80px;" name="challenge"></textarea><br>
            <label>Potential solutions identified: </label><br>
            <textarea class="input-group" style="width: 600px; height: 80px;" name="solution"></textarea><br>
        </fieldset>
    </div>
    <br>

    <div class="container-fluid">
        <h2>Discoveries/Inventions</h2>
        <h6>Do you have any patenying Discoveries/Inventions made?</h6>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="!invent" id="invent_no" checked="checked" value="6"
                   onclick="handleClick(this);">
            <label class="form-check-label" for="formRadioChecked">NO</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="invent" id="invent_yes" value="3"
                   onclick="handleClick(this);">
            <label class="form-check-label" for="formRadioDefault">YES</label>
        </div>

        <div id="invention" style="display: none;">


            <table id="invent" class="table">
                <thead class="bg-info">
                <td></td>
                <td>Name of innovation patented/discovered</td>
                <td>Year Patented/Discovered</td>
                <td>Patenting Company</td>
                <td>Role</td>
                <td>Collaborators</td>
                <td>Income generated</td>
                </thead>

                <tbody>
                <INPUT class="button" type="button" value="Add Row" onclick="addRow('invent')"/>
                <INPUT class="button" type="button" value="Delete Row" onclick="deleteRow('invent')"/>

                <tr>
                    <td><input type="checkbox" name="chk"/></td>
                    <td><input type="text" style="width: 15em" name="innov[]"></td>
                    <td><select class="form-control" name="year[]">
                            <?php
                            for ($year = (int)date('Y'); 1900 <= $year; $year--): ?>
                                <option value="<?= $year; ?>"><?= $year; ?></option>
                            <?php endfor; ?>
                        </select>
                    </td>
                    <td><input type="text" style="width: 10em" name="company[]"></td>
                    <td><input type="text" style="width: 8em" name="pRole[]"></td>
                    <td><input type="text" style="width: 8em" name="inv_collab[]"></td>
                    <td><input type="number" style="width: 8em" name="income[]"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <button class="btn btn-success" type="submit" name="submit">Submit</button>
</form>


</body>