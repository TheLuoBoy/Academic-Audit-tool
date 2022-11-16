<?php
    include '../utils/View_logic.php';
    $scient = new View_logic();
    $scient->Scientific_comm();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scientific Comm...</title>
    <link rel="stylesheet" href="/Styles/formStyle.css">
    <style>
        td{
            padding: 10px;
        }
        input{
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <h2>Scientific Communication</h2>
        <form action="" method="post">
            <table class="">
                <tr class="" >
                    <td class="" style="text-align: right"><label>Platform used: </label></td>
                    <td><input type="text" id="platform" name="platform" class="form-control" required/><br></td>
                </tr>
                <tr class="">
                    <td style="text-align: right"><label>Communication date:</label></td>
                    <td><input type="date" id="comm_date" name="comm_date" class="form-control" required><br></td>
                </tr class="d-table-row">
                <tr>
                    <td style="text-align: right"><label>Topic:</label></td>
                    <td><input type="text" id="topic" class="form-control" name="topic" required><br></td>
                </tr>

            </table>
            <div class="">
                <label for="problem_com">Challenges faced when publishing and disseminating research results: </label><br>
                <textarea class="form-control" rows="10" name="problems" id="problem_com"></textarea><br>
                <label for="solution_com">Solutions identified: </label><br>
                <textarea class="form-control" rows="10" name="solutions" id="solution_com"></textarea><br>

            </div>
            <button class="btn btn-success" type="submit" name="submit" id="submit_scientific">Submit</button>

        </form>


    </div>

</body>
</html>
