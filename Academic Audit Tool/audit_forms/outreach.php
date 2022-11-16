<?php
include("../utils/View_logic.php");
$outreach = new View_logic();
$outreach->outreach();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Academic Auditing Tool</title>

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
            element2.name = 'student_fname[]';
            cell2.appendChild(element2);
            /////////////////////////////////////
            var cell2 = row.insertCell(2);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "text";
            element2.name = 'student_lname[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(3);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "text";
            element2.name = 'regNo[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(4);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "text";
            element2.name = 'course_pursued[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(5);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "text";
            element2.name = 'company_name[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(6);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "text";
            element2.name = 'location[]';
            cell2.appendChild(element2);

        }


        function add_program(tableID) {
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
            element2.name = 'program[]';
            cell2.appendChild(element2);
            /////////////////////////////////////
            var cell2 = row.insertCell(2);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "date";
            element2.name = 'outreach_date[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(3);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "text";
            element2.name = 'program_location[]';
            cell2.appendChild(element2);

            /////////////////////////////////////
            var cell2 = row.insertCell(4);
            var element2 = document.createElement("input");
            element2.setAttribute("class", "form-control form-control-lg");
            element2.type = "number";
            element2.name = 'beneficiary[]';
            cell2.appendChild(element2);

        }
    </script>

</head>
<body style="color: white;">
<div class="add-container">

        <form enctype="multipart/form-data" name="newStaffForm" action="" method="POST">
            <h5><span class="style3">Community placements or internships and services carried out in 2021/2022 academic year </span></h5>
            <div class="btn btn-dark" style="border: solid orangered 1px;" id="adding"
                    onclick="add_student('internship_table');">Add Student
            </div>
            <table id="internship_table">
                <tr>
                    <td>

                    </td>
                    <td>
                        <div class="form-outline">
                            <label class="form-label" for="firstName"> Student First Name</label>


                        </div>
                    </td>
                    <td>
                        <div class="form-outline">
                            <label class="form-label" for="lastName">Student Last Name</label>

                        </div>

                    </td>
                    <td>
                        <div class="form-outline">
                            <label class="form-label" for="">Student Reg. No</label>

                        </div>

                    </td>


                    <td>
                        <div class="form-outline">
                            <label class="form-label" for="number">Course</label>

                    </td>
                    <td>
                        <div class="form-outline">
                            <label class="form-label" for="year">Company Name</label>

                        </div>

                    </td>

                    <td>
                        <div class="form-outline datepicker w-100">
                            <label for="challenge" class="form-label">Location</label>

                        </div>

                    </td>
                </tr>


                <tr>
                    <td>

                    </td>
                    <td>
                        <div class="form-outline">
                            <input type="text" id="firstName" class="form-control form-control-lg" name="student_fname[]"/>

                        </div>
                    </td>
                    <td>
                        <div class="form-outline">
                            <input type="text" id="lastName" class="form-control form-control-lg" name="student_lname[]"/>

                        </div>

                    </td>
                    <td>
                        <div class="form-outline">
                            <input type="text" id="regNo" class="form-control form-control-lg" name="regNo[]"/>

                        </div>

                    </td>


                    <td>
                        <div class="form-outline">
                            <input type="text" id="location" class="form-control form-control-lg" name="course_pursued[]"/>
                    </td>
                    <td>
                        <div class="form-outline">
                            <input type="text" id="beneficiary" class="form-control form-control-lg" name="company_name[]"/>
                        </div>

                    </td>

                    <td>
                        <div class="form-outline datepicker w-100">
                            <input type="text" id="location" class="form-control form-control-lg" name="location[]"/>
                        </div>

                    </td>
                </tr>


            </table>

            <hr/>
            <h5><span class="style3">Other community outreach programs carried out in the 2021/2022 academic year </span></h5>
            <div class="btn btn-dark" style="border: solid orangered 1px;" id="adding"
                    onclick="add_program('outreach_table');">Add Program
            </div>
            <table id="outreach_table">
                <tr>
                    <td>

                    </td>
                    <td>
                        <div class="form-outline">
                            <label class="form-label" for="firstName">Program Title</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-outline">
                            <label class="form-label" for="lastName">Date of Outreach Program</label>

                        </div>

                    </td>


                    <td>

                        <div class="form-outline">
                            <label class="form-label" for="number">Location of Program</label>


                        </div>
                    </td>
                    <td>
                        <div class="form-outline">
                            <label class="form-label" for="year">Total Beneficiaries</label>

                        </div>
                    </td>

                </tr>


                <tr>
                    <td>

                    </td>
                    <td>
                        <div class="form-outline">
                            <input type="text" id="firstName" class="form-control form-control-lg"
                                   name="program[]"/>

                        </div>
                    </td>
                    <td>
                        <div class="form-outline">
                            <input type="date" id="lastName" class="form-control form-control-lg"
                                   name="outreach_date[]"/>

                        </div>

                    </td>


                    <td>

                        <div class="form-outline">
                            <input type="text" id="location" class="form-control form-control-lg"
                                   name="program_location[]"/>

                        </div>
                    </td>
                    <td>
                        <div class="form-outline">
                            <input type="number" id="beneficiary" class="form-control form-control-lg"
                                   name="beneficiary[]"/>
                        </div>
                    </td>
                </tr>

            </table>
            <div class="">
                <fieldset class="">
                    <legend>Challenges & solutions</legend>
                    <label>Challenges experienced in using MUST research and teaching environment: </label><br>
                    <textarea class="input-group" rows="10" id="problem_rank"></textarea><br>
                    <label>Potential solutions identified: </label><br>
                    <textarea class="input-group" rows="10" id="solution_rank"></textarea><br>

                </fieldset>
            </div>
            <div class="" >
                <input class="btn btn-primary btn-lg float-end col-4" style="margin-left: 80%; width: 20%" type="submit" value="Submit"
                       name="btn_submit"/>
            </div>
        </form>


</div>

</body>
</html>

