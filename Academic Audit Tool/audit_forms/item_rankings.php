<?php
    include "../utils/View_logic.php";
    $rank = new View_logic();
    $rank->environment_ranking();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ranking of items</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <h2>Ranking(Score each item from 1 to 5, where 5 is the highest)</h2>
    <form METHOD="get">
        <table class="table">
            <thead class="bg-info">
            <tr>
                <td>Category</td>
                <td>Items</td>
                <td>Quantity Score</td>
                <td>Quality Score</td>
                <td>Comments</td>

            </tr>

            </thead>
            <tbody>
            <!--                Quality and quanity of teaching facilities-->
            <tr>
                <td rowspan="10"><input type="text" value="Teaching Facilities" name="cat1" readonly hidden/>Teaching Facilities</td>
            </tr>
            <tr>
                <td><input type="text" name ='cat1item1' value="Classrooms" readonly hidden>Classrooms</td>
                <td><input type="number" name="cat1item1Q"/></td>
                <td><input type="number" name="cat1item1QL"/></td>
                <td><input type="text" name="cat1item1RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat1item2' value="Laboratories" readonly hidden>Laboratories</td>
                <td><input type="number" name="cat1item2Q"/></td>
                <td><input type="number" name="cat1item2QL"/></td>
                <td><input type="text" name="cat1item2RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat1item3' value="Clinical wards" readonly hidden>Clinical wards</td>
                <td><input type="number" name="cat1item3Q"/></td>
                <td><input type="number" name="cat1item3QL"/></td>
                <td><input type="text" name="cat1item3RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat1item4' value="Libraries" readonly hidden>Libraries</td>
                <td><input type="number" name="cat1itemQ"/></td>
                <td><input type="number" name="cat1item4QL"/></td>
                <td><input type="text" name="cat1item4RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat1item5' value="Tutorial Rooms" readonly hidden>Tutorial Rooms</td>
                <td><input type="number" name="cat1item5Q"/></td>
                <td><input type="number" name="cat1item5QL"/></td>
                <td><input type="text" name="cat1item5RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat1item6' value="Computer Labs" readonly hidden>Computer Labs</td>
                <td><input type="number" name="cat1item6Q"/></td>
                <td><input type="number" name="cat1item6QL"/></td>
                <td><input type="text" name="cat1item6RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat1item7' value="Auditoriums" readonly hidden>Auditoriums</td>
                <td><input type="number" name="cat1item7Q"/></td>
                <td><input type="number" name="cat1item7QL"/></td>
                <td><input type="text" name="cat1item7RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat1item8' value="Offices" readonly hidden>Offices</td>
                <td><input type="number" name="cat1item8Q"/></td>
                <td><input type="number" name="cat1item8QL"/></td>
                <td><input type="text" name="cat1item8RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat1item9' value="Others" >*Specify</td>
                <td><input type="number" name="cat1item9Q"/></td>
                <td><input type="number" name="cat1item9QL"/></td>
                <td><input type="text" name="cat1item9RM"/></td>
            </tr>

            <!--hr-->
            <tr>
                <td rowspan="7"><input name="cat2" value="Number of Qualified Human Resource" readonly hidden/>Number of Qualified Human Resource</td>
            </tr>
            <tr>
                <td><input type="text" name ='cat2item1' value="Academic staff" readonly  hidden/>Academic staff</td>
                <td><input type="number" name="cat2item1Q"/></td>
                <td><input type="number" name="cat2item1QL"/></td>
                <td><input type="text" name="cat2item1RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat2item2' value="Administrative staff" readonly  hidden/>Administrative staff</td>
                <td><input type="number" name="cat2item2Q"/></td>
                <td><input type="number" name="cat2item2QL"/></td>
                <td><input type="text" name="cat2item2RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat2item3' value="Research staff" readonly hidden/>Research staff</td>
                <td><input type="number" name="cat2item3Q"/></td>
                <td><input type="number" name="cat2item3QL"/></td>
                <td><input type="text" name="cat2item3RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat2item4' value="Technicians" readonly hidden/>Technicians</td>
                <td><input type="number" name="cat2item4Q"/></td>
                <td><input type="number" name="cat2item4QL"/></td>
                <td><input type="text" name="cat2item4RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat2item5' value="Support staff" readonly  hidden/>Support staff</td>
                <td><input type="number" name="cat2item5Q"/></td>
                <td><input type="number" name="cat2item5QL"/></td>
                <td><input type="text" name="cat2item5RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat2item6' value="Others" >* Specify</td>
                <td><input type="number" name="cat2item6Q"/></td>
                <td><input type="number" name="cat2item6QL"/></td>
                <td><input type="text" name="cat2item6RM"/></td>
            </tr>
            <!--    Resources   -->
            <tr>
                <td rowspan="12"><input name="cat3" value="Resources Required" readonly hidden/>Resources Required</td>
            </tr>
            <tr>
                <td><input type="text" name ='cat3item1' value="Projectors" readonly hidden />Projectors</td>
                <td><input type="number" name="cat3item1Q"/></td>
                <td><input type="number" name="cat3item1QL"/></td>
                <td><input type="text" name="cat3item1RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat3item2' value="Computers" readonly hidden />Computers</td>
                <td><input type="number" name="cat3item2Q"/></td>
                <td><input type="number" name="cat3item2QL"/></td>
                <td><input type="text" name="cat3item2RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat3item3' value="Internet" readonly hidden />Internet</td>
                <td><input type="number" name="cat3item3Q"/></td>
                <td><input type="number" name="cat3item3QL"/></td>
                <td><input type="text" name="cat3item3RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat3item4' value="Textbooks" readonly hidden />Textbooks</td>
                <td><input type="number" name="cat3item4Q"/></td>
                <td><input type="number" name="cat3item4QL"/></td>
                <td><input type="text" name="cat3item4RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat3item5' value="Lab reagents/chemical" readonly hidden />Lab reagents/Chemicals</td>
                <td><input type="number" name="cat3item5Q"/></td>
                <td><input type="number" name="cat3item5QL"/></td>
                <td><input type="text" name="cat3item5RM"/></td>
            </tr>

            <tr>
                <td><input type="text" name ='cat3item6' value="Lab Equipment" readonly hidden />Lab Equipment</td>
                <td><input type="number" name="cat3item6Q"/></td>
                <td><input type="number" name="cat3item6QL"/></td>
                <td><input type="text" name="cat3item6RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat3item7' value="Whiteboards" readonly hidden />Whiteboards</td>
                <td><input type="number" name="cat3item7Q"/></td>
                <td><input type="number" name="cat3item7QL"/></td>
                <td><input type="text" name="cat3item7RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat3item8' value="Marker pens" readonly hidden />Marker pens</td>
                <td><input type="number" name="cat3item8Q"/></td>
                <td><input type="number" name="cat3item8QL"/></td>
                <td><input type="text" name="cat3item8RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat3item9' value="Power cables" readonly hidden />Power cables</td>
                <td><input type="number" name="cat3item9Q"/></td>
                <td><input type="number" name="cat3item9QL"/></td>
                <td><input type="text" name="cat3item9RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat3item10' value="Others" >* Specify</td>
                <td><input type="number" name="cat3item10Q"/></td>
                <td><input type="number" name="cat3item10QL"/></td>
                <td><input type="text" name="cat3item10RM"/></td>
            </tr>


            <!-- Research Funds-->

            <tr>
                <td rowspan="6"><input name="cat4" value="Research funds to Support Scholarly work" readonly hidden/>Research funds to Support Scholarly work</td>
            </tr>
            <tr>
                <td><input type="text" name ='cat4item1' value="University grants" readonly hidden />University grants</td>
                <td><input type="number" name="cat4item1Q"/></td>
                <td><input type="number" name="cat4item1QL"/></td>
                <td><input type="text" name="cat4item1RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat4item2' value="Government grants" readonly hidden />Government grants</td>
                <td><input type="number" name="cat4item2Q"/></td>
                <td><input type="number" name="cat4item2QL"/></td>
                <td><input type="text" name="cat4item2RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat4item3' value="International grant" readonly hidden />International grant</td>
                <td><input type="number" name="cat4item3Q"/></td>
                <td><input type="number" name="cat4item3QL"/></td>
                <td><input type="text" name="cat4item3RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat4item4' value="Others" >* Specify</td>
                <td><input type="number" name="cat4item4Q"/></td>
                <td><input type="number" name="cat4item4QL"/></td>
                <td><input type="text" name="cat4item4RM"/></td>
            </tr>

            <!--                Reliability of Utilities-->
            <tr>
                <td rowspan="6"><input name="cat5" value="Reliability of Utilities to support teaching and learning" readonly hidden/>Reliability of Utilities to support teaching and learning</td>
            </tr>

            <tr>
                <td><input type="text" name ='cat5item1' value="Electricity" readonly hidden />Electricity</td>
                <td><input type="number" name="cat5item1Q"/></td>
                <td><input type="number" name="cat5item1QL"/></td>
                <td><input type="text" name="cat5item1RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat5item2' value="Standby generator" readonly hidden />Standby generator</td>
                <td><input type="number" name="cat5item2Q"/></td>
                <td><input type="number" name="cat5item2QL"/></td>
                <td><input type="text" name="cat5item2RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat5item3' value="Internet data" readonly hidden />Internet data</td>
                <td><input type="number" name="cat5item3Q"/></td>
                <td><input type="number" name="cat5item3QL"/></td>
                <td><input type="text" name="cat5item3RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat5item4' value="Water" readonly hidden />Water</td>
                <td><input type="number" name="cat5item4Q"/></td>
                <td><input type="number" name="cat5item4QL"/></td>
                <td><input type="text" name="cat5item4RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat5item5' value="Others" >* Specify</td>
                <td><input type="number" name="cat5item5Q"/></td>
                <td><input type="number" name="cat5item5QL"/></td>
                <td><input type="text" name="cat5item5RM"/></td>
            </tr>
            <!--                a supportive work env't-->
            <tr>
                <td rowspan="8"><input name="cat6" value="A Supportive work environment" readonly hidden/>A Supportive work environment</td>
            </tr>
            <tr>
                <td><input type="text" name ='cat6item1' value="Mentorship from Senior(s)" readonly hidden/>Mentorship from Senior(s)</td>
                <td><input type="number" name="cat6item1Q"/></td>
                <td><input type="number" name="cat6item1QL"/></td>
                <td><input type="text" name="cat6item1RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat6item2' value="Positive criticism" readonly hidden/>Positive criticism</td>
                <td><input type="number" name="cat6item2Q"/></td>
                <td><input type="number" name="cat6item2QL"/></td>
                <td><input type="text" name="cat6item2RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat6item3' value="Timely feedback from supervisors" readonly hidden/>Timely feedback from supervisors</td>
                <td><input type="number" name="cat6item3Q"/></td>
                <td><input type="number" name="cat6item3QL"/></td>
                <td><input type="text" name="cat6item3RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat6item4' value="Regular appraisal of Staff" readonly hidden/>Regular appraisal of Staff</td>
                <td><input type="number" name="cat6item4Q"/></td>
                <td><input type="number" name="cat6item4QL"/></td>
                <td><input type="text" name="cat6item4RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat6item5' value="Support for career progression" readonly hidden/>Support for career progression</td>
                <td><input type="number" name="cat6item5Q"/></td>
                <td><input type="number" name="cat6item5QL"/></td>
                <td><input type="text" name="cat6item5RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat6item6' value="Scholarships" readonly hidden/>Scholarships</td>
                <td><input type="number" name="cat6item6Q"/></td>
                <td><input type="number" name="cat6item6QL"/></td>
                <td><input type="text" name="cat6item6RM"/></td>
            </tr>
            <tr>
                <td><input type="text" name ='cat6item7' value="Others" >* Specify</td>
                <td><input type="number" name="cat6item7Q"/></td>
                <td><input type="number" name="cat6item7QL"/></td>
                <td><input type="text" name="cat6item7RM"/></td>
            </tr>
            </tbody>
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
        <button class="btn btn-success" type="submit" id="submit_ranking" name="submit">Submit</button>
    </form>
    <br>
    <br>

</div>


</body>
</html>
