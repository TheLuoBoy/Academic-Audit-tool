<?php
session_start();
include("../utils/View_logic.php");
$supervisions = new View_logic();
$supervisions->supervisions();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Styles/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Styles/style.css">
    <link rel="stylesheet" href="/Styles/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Supervision of Master & PhD students</title>
    <script >
        function removeRow(btnName,tablename) {
            try {
                var table = document.getElementById(tablename);
                var rowCount = table.rows.length;
                for (var i = 0; i < rowCount; i++) {
                    var row = table.rows[i];
                    var rowObj = row.cells[0].childNodes[0];
                    if (rowObj.name == btnName) {
                        table.deleteRow(i);
                        rowCount--;
                    }

                }
            } catch (e) {
                alert(e);
            }
        }

        function add_student(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);


            //Column 1
            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "button";
            var btnName = "button" + (rowCount + 1);
            element1.name = btnName;

            element1.setAttribute('value', 'x');
            element1.setAttribute("style","border-radius:50px; background-color: red; padding: 3px; border: 0px; color: green")


            element1.onclick = function() {
                removeRow(btnName, tableID);
            }

            cell1.appendChild(element1);

            /////////////////////////////////////
            var cell2 = row.insertCell(1);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "text";
            element2.name = 'be[]';
            cell2.appendChild(element2);
            /////////////////////////////////////
            var cell2 = row.insertCell(2);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "text";
            element2.name = 'c[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(3);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "text";
            element2.name = 'ee[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(4);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "date";
            element2.name = 'f[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(5);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "date";
            element2.name = 'g[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(6);
            var element2 = document.createElement("select");
            element2.setAttribute("class", "form-control form-control-lg");
            var opt = document.createElement('option');
            var opt1 = document.createElement('option');


            opt.text = 'Primary supervisor';
            opt1.text = 'CO-supervisor';

            element2.options.add(opt,0);
            element2.options.add(opt1,1);


            element2.type = "text";
            element2.name = 'd[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(7);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "text";
            element2.name = 'g[]';
            cell2.appendChild(element2);

        }


        function add_onstudent(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);


            //Column 1
            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "button";
            var btnName = "button" + (rowCount + 1);
            element1.name = btnName;

            element1.setAttribute('value', 'x');
            element1.setAttribute("style","border-radius:50px; background-color: red; padding: 3px; border: 0px; color: green")


            element1.onclick = function() {
                removeRow(btnName, tableID);
            }

            cell1.appendChild(element1);

            /////////////////////////////////////
            var cell2 = row.insertCell(1);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "text";
            element2.name = 'be[]';
            cell2.appendChild(element2);
            /////////////////////////////////////
            var cell2 = row.insertCell(2);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "text";
            element2.name = 'c[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(3);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "text";
            element2.name = 'ee[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(4);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "date";
            element2.name = 'f[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(5);
            var element2 = document.createElement("select");
            element2.setAttribute("class", "form-control form-control-lg");
            var opt = document.createElement('option');
            var opt1 = document.createElement('option');


            opt.text = 'Primary supervisor';
            opt1.text = 'CO-supervisor';

            element2.options.add(opt,0);
            element2.options.add(opt1,1);


            element2.type = "text";
            element2.name = 'd[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(6);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "text";
            element2.name = 'g[]';
            cell2.appendChild(element2);

        }
    </script>
</head>
<body class="body_top">
<div class="navbar bg-dark sticky-top">
    <div class="navbar-brand">
        <a href="#"><img src="/images/logo-audit.png" alt="logo" height="60" width="335"></a>
    </div>
    <ul class="nav">
        <table>
            <tr>
                <td style="padding-right: 20px; padding-left: 20px">
                    <li class="nav-item">
                        <a href="" class="nav-link fa fa-bell"></a>
                    </li>
                </td>
                <td>
                    <?php
                    echo '<strong style="color: white">' . $_SESSION["username"] . '</strong>';
                    ?>
                </td>
                <td style="padding-left: 20px">
                    <li class="nav-item">
                        <div class="dropleft">
                            <div data-toggle="dropdown">
                                <img src="/images/Asset%202.png" height="30" width="30" class=" user_image"/>
                                <div class="fa fa-caret-down"></div>
                            </div>

                            <ul class="dropdown-menu bg-dark" style="margin-top: 35px; margin-right: -50px">
                                <li class="dropdown-item"><a href="" class="nav-link fa fa-user-circle">Profile</a></li>
                                <li class="dropdown-item"><a href="" class="nav-link fa fa-car">Settings</a></li>
                                <li class="dropdown-item"><a href="destroy.php" class="nav-link fa fa-sign-out">Sign
                                        out</a></li>
                            </ul>
                        </div>
                        <!--                            <a href="" class="nav-link fa fa-dropbox" data-toggle="dropdown"></a>-->

                    </li>
                </td>
                <!--                    <td>-->
                <!--                        <div class="dropdown-toggle"></div>-->
                <!--                    </td>-->
            </tr>
        </table>
    </ul>
</div>
<div class="add-container container-fluid">
    <div class="card" style="margin-top: 3%; padding: 1%">
        <div class="" >
            <form enctype="multipart/form-data" name="newStaffForm" action="" method="POST">
                <h5>Have you supervised Masters and or PhD student(s) to completion?</h5>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="!txtComments" id="txtComments_no" checked=""
                               value="3" onclick="handleClick(this);">
                        <label class="form-check-label" for="formRadioChecked">NO</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="txtComments" id="txtComments_yes"
                               onclick="handleClick(this);" value="1">
                        <label class="form-check-label" for="formRadioDefault">YES</label>
                    </div>

                    <div id="txtComments" style="display: none;">
                        <div class="btn btn-dark" style="border: solid orangered 1px;" id="adding"
                             onclick="add_student('table1');">Add Student
                        </div>

                        <h5><span class="style3">Supervision of Masters or PhD students to Completion Details</span></h5>
                        <table id="table1">
                            <tr>
                                <td>

                                </td>

                                <td >

                                    <div class="">
                                        <label class="form-label" for="firstName">Student First Name</label>

                                    </div>

                                </td>
                                <td>

                                    <div class="">
                                        <label class="form-label" for="lastName">Student Last Name</label>

                                    </div>

                                </td>

                                <td>

                                    <div class=" datepicker w-100">
                                        <label for="birthdayDate" class="form-label">Research Title</label>

                                    </div>


                                </td>

                                <td>

                                    <div class="">
                                        <label class="form-label" for="number">Start Year</label>

                                    </div>

                                </td>
                                <td>

                                    <div class="">
                                        <label class="form-label" for="year">Completion Year</label>

                                    </div>

                                </td>

                                <td>


                                    <div class="">
                                        <label class="form-label select-label">Nature of Supervision</label>

                                    </div>

                                </td>
                                <td>

                                    <div class="">
                                        <label class="form-label" for="year">Awarding University</label>

                                    </div>

                                </td>
                            </tr>



                            <tr>
                                <td>

                                </td>
                                <td >

                                    <div class="">

                                        <input type="text" id="firstName" class="form-control form-control-lg"
                                               name="student_fname[]"/>
                                    </div>

                                </td>
                                <td>

                                    <div class="">

                                        <input type="text" id="lastName" class="form-control form-control-lg"
                                               name="student_lname[]"/>
                                    </div>

                                </td>

                                <td>

                                    <div class=" datepicker w-100">

                                        <input type="text" class="form-control form-control-lg"
                                               id="birthdayDate" name="research_title[]"/>
                                    </div>


                                </td>

                                <td>

                                    <div class="">

                                        <input type="date" id="year" class="form-control form-control-lg"
                                               name="start_year[]"/>
                                    </div>

                                </td>
                                <td>

                                    <div class="">

                                        <input type="date" id="date" class="form-control form-control-lg"
                                               name="completion_year[]"/>
                                    </div>

                                </td>

                                <td>


                                    <div class="">

                                        <select class="select form-control-lg" name="nature_supervision[]">
                                            <option value="Choose option" enabled>Choose option</option>
                                            <option value="Primary Supervisor">Primary Supervisor</option>
                                            <option value="Co-Supervisor">Co-Supervisor</option>
                                        </select>
                                    </div>

                                </td>
                                <td>

                                    <div class="">

                                        <input type="text" id="university" class="form-control form-control-lg"
                                               name="awarding_university[]"/>
                                    </div>

                                </td>


                            </tr>
                        </table>
                    </div>
                    <hr>

                    <h5>Do you have ongoing Masters or PhD student(s) you are supervising?</h5>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="!txt_Comment" id="txtComment_no"
                                   checked="" value="4" onclick="handleClick(this);">
                            <label class="form-check-label" for="formRadioChecked">NO</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="txt_Comment" id="txtComment_yes"
                                   value="2" onclick="handleClick(this);">
                            <label class="form-check-label" for="formRadioDefault">YES</label>
                        </div>
                    </div>

                    <div id="txt_Comment" style="display: none;">
                        <div class="btn btn-dark" style="border: solid orangered 1px;" id="adding"
                             onclick="add_onstudent('table2');">Add Student
                        </div>
                        <h5 class="style3">Supervision of Ongoing Masters or PhD student Details </h5>
                        <table id="table2">

                            <tr>
                                <td>

                                </td>
                                <td>
                                    <div class="">
                                        <label class="form-label" for="firstName">Student First Name</label>


                                    </div>
                                </td>
                                <td>
                                    <div class="">
                                        <label class="form-label" for="lastName">Student Last Name</label>
                                    </div>

                                </td>

                                <td>
                                    <div class=" datepicker w-100">
                                        <label for="birthdayDate" class="form-label">Research Title</label>

                                    </div>
                                </td>

                                <td>
                                    <div class="">
                                        <label class="form-label" for="number">Start Year</label>

                                    </div>

                                </td>

                                <td>

                                    <div class="">
                                        <label class="form-label select-label">Nature of Supervision</label>


                                    </div>
                                </td>

                                <td>
                                    <div class="">
                                        <label class="form-label" for="year">Awarding University</label>
                                    </div>
                                </td>
                            </tr>


                            <tr>
                                <td>

                                </td>
                                <td>
                                    <div class="">

                                        <input type="text" id="firstName" class="form-control form-control-lg"
                                               name="studentfname[]"/>

                                    </div>
                                </td>
                                <td>
                                    <div class="">

                                        <input type="text" id="lastName" class="form-control form-control-lg"
                                               name="studentlname[]"/>
                                    </div>

                                </td>

                                <td>
                                    <div class=" datepicker w-100">

                                        <input type="text" class="form-control form-control-lg"
                                               id="birthdayDate" name="researchtitle[]"/>
                                    </div>
                                </td>

                                <td>
                                    <div class="">

                                        <input type="date" id="year" class="form-control"
                                               name="startyear[]"/>

                                    </div>

                                </td>

                                <td>

                                    <div class="">

                                        <select class="select form-control-lg" name="naturesupervision[]">
                                            <option value="1" enabled>Choose option</option>
                                            <option value="Primary Supervisor">Primary Supervisor</option>
                                            <option value="Co-Supervisor">Co-Supervisor</option>

                                        </select>
                                    </div>
                                </td>

                                <td>
                                    <div class="">

                                        <input type="text" id="university" class="form-control form-control-lg"
                                               name="university_name[]"/>

                                    </div>
                                </td>

                            </tr>
                        </table>
                    </div>
                </div>
                <div class="">
                    <fieldset class="">
                        <legend>Challenges & solutions</legend>
                        <label>Challenges faced during Supervision of Masters' or PhD students: </label><br>
                        <textarea class="input-group" rows="10" id="problem_rank"></textarea><br>
                        <label>Potential solutions identified: </label><br>
                        <textarea class="input-group" rows="10" id="solution_rank"></textarea><br>

                    </fieldset>
                </div>
                <div class="mt-2">
                    <input class="btn btn-primary btn-lg float-end col-4" type="submit"
                           name="btn_submit"/>
                </div>
            </form>
        </div>
    </div>
    <hr>
</div>

<br>
<br>
<footer class="" style="float: bottom; margin-bottom: -100%;">
    <div>
        <hr>
        Must copyright &copy <?php echo date('Y'); ?>
    </div>

</footer>
<script type="text/javascript">
    function handleClick(myRadio) {
        var selectedValue = myRadio.value;
        if (selectedValue == "1") {
            document.getElementById("txtComments").style.display = "";
            const noBtn = document.getElementById('txtComments_no');
            noBtn.checked = false;
            //Show textbox
        } else if (selectedValue == "2") {
            document.getElementById("txt_Comment").style.display = "";
            const noBtn = document.getElementById('txtComment_no');
            noBtn.checked = false;
        } else if (selectedValue == "3") {
            document.getElementById("txtComments").style.display = "none";
            const yesBtn = document.getElementById('txtComments_yes');
            yesBtn.checked = false;
        } else if (selectedValue == "4") {
            document.getElementById("txt_Comment").style.display = "none";
            const yesBtn = document.getElementById('txtComment_yes');
            yesBtn.checked = false;
        }
    }
</script>
<script src="/Styles/jquery-3.2.1.slim.min.js"></script>
<script src="/Styles/bootstrap-4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="/Styles/bootstrap-4.4.1/js/bootstrap.min.js"></script>
</body>
</html>