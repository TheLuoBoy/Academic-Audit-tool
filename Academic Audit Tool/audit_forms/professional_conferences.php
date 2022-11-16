<?php
    include "../utils/View_logic.php";
    $prof_conf = new View_logic();
    $prof_conf->professional_conferences();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conferences Attended</title>
    <script type="text/javascript" src="/Styles/js/formJs.js"></script>
    <link rel="stylesheet" href="/Styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body style="color: white;">
    <div class="container-fluid">
        <h3>Professional Conferences Attended in the Academic year 2021/2022</h3>
        <button class="btn btn-danger" style="border: solid #af1fce 1px;" id="adding" onclick="addRow_prof_conferences('profc_table');">Add Conference</button>

        <form class="publication_area" id="profc_form1" method="post">
        <div id="">
            <table id="profc_table" class="table" style="color: white;">
                <tr class="d-table-row">
                    <td class="d-table-cell">

                    </td>
                    <td class="d-table-cell">
                        Name/Title
                    </td>
                    <td class="d-table-cell">
                        Role
                    </td>
                    <td class="d-table-cell">
                        Location
                    </td>
                    <td class="d-table-cell">
                        URL
                    </td>
                </tr>
                <tr class="d-table-row">
                    <td class="d-table-cell">

                    </td>
                    <td class="d-table-cell">
                        <input type="text" id="conference_name" name="title[]"/>
                    </td>
                    <td class="d-table-cell">
                        <select id="conference_role" name="role[]">
                            <option disabled>--select--</option>
                            <option>Presenter</option>
                            <option>Organizer</option>
                            <option>Attendee</option>
                        </select>
                    </td>
                    <td class="d-table-cell">
                        <input type="text" id="conference_location" name="location[]"/>
                    </td>
                    <td class="d-table-cell">
                        <input type="url" id="conference_url" name="url[]"/>
                    </td>
                </tr>



            </table>
        </div>
        <button class="btn btn-success" type="submit" name="submit" id="submit_publication">Submit</button>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
