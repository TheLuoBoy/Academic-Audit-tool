<?php
include '../utils/View_logic.php';
$publications = new View_logic();
$publications->publications();
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
    <script type="text/javascript" src="/Styles/js/formJs.js"></script>
    <script>
        function anim() {
            if (app_others.checked) {
                if (document.getElementById("othersect").style.display === "none") {
                    document.getElementById("othersect").style.display = "block";
                }
            } else {
                document.getElementById("othersect").style.display = "none";
            }
        }

        function anim1() {
            if (upload_radio.checked) {
                if (document.getElementById("upld").style.display === "none") {
                    document.getElementById("upld").style.display = "block";
                    document.getElementById("publication_form").style.display = "none";
                    fill_form.checked = false;
                }
            }
        }

        function anim2() {
            if (fill_form.checked) {
                if (document.getElementById("publication_form").style.display === "none") {
                    document.getElementById("publication_form").style.display = "block";
                    document.getElementById("upld").style.display = "none";
                    upload_radio.checked = false;

                }
            }
        }

    </script>


</head>
<body class="body_top">
<div class="container-fluid ">
    <div class="">

    </div>
    <h5>Fill in for the Publications made or participated in before and after joining Must</h5>

    <div class="col">
        <label for="pub_total">How many your peer reviewed publications are already uploaded on the MUST repository
            (ir.must.ac.ug)</label>
        <br><input type="number" id="pub_total" class=""/>
    </div>
    <br><br>

    <div class="col">
        <label>Which of the following Applications displaying publications are you currently subscribed to:</label>
        <br>
        <input id="app_google" type="checkbox"/>
        <label for="app_google">Google</label><br>
        <input id="app_researchgate" type="checkbox"/>
        <label for="app_researchgate">ResearchGate</label><br>
        <input id="app_academia" type="checkbox"/>
        <label for="app_academia">Academia</label><br>
        <input onclick="anim()" id="app_others" type="checkbox"/>
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
                Upload a spreadsheet file with columns:<br> <em style="color: orangered">Author(first Author or Co-author),Title,Publication Year,Type of publication(book,book chapter,journal or conference proceeding),Publisher,Volume number, ISBN</em><br> *Should have a file extension of(.xml, .txt or .csv)<br>
                <label for="myfile">Upload:</label>
                <input type="file" id="myfile" name="myfile">
                <button class="btn btn-primary" name="submit_upload" type="submit" id="submit_publication"
                        style="margin-left: 45%; margin-top: 20px">Submit
                </button>
            </form>

        </fieldset>

    </div>
    <input type="radio" id="fill_form" name="fill_form" onclick="anim2()">

    <label for="fill_form">Fill in a specific number of Publications</label><br>
    <div id="publication_form" style="display: none;">
        <button class="btn btn-dark" style="border: solid orangered 1px;" id="adding"
                onclick="addRow('publication_table');">Add publication
        </button>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table id="publication_table" class="" style="padding: 20px">
                <tr class="d-table-row">
                    <td>

                    </td>
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
                    <td>

                    </td>
                    <td class="d-table-cell">
                        <select id="authorSelect1" name="a[]" required>
                            <option disabled>--select--</option>
                            <option>FIRST AUTHOR</option>
                            <option>Co-AUTHOR</option>
                        </select>
                    </td>
                    <td class="d-table-cell">
                        <input type="text" id="publish_title1" name="b[]" required/>
                    </td>
                    <td class="d-table-cell">
                        <input type="date" id="publication_year1" name="c[]" required/>
                    </td>
                    <td class="d-table-cell">
                        <select id="type_select1" name="d[]" required>
                            <option disabled>--select--</option>
                            <option>JOURNAL</option>
                            <option>BOOK</option>
                            <option>BOOK CHAPTER</option>
                            <option>CONFERENCE PROCEEDING</option>
                        </select>
                    </td>
                    <td class="d-table-cell">
                        <input type="text" id="publisher1" name="e[]" required/>
                    </td>
                    <td class="d-table-cell">
                        <input type="number" id="publish_volume1" name="f[]" required/>
                    </td>
                    <td class="d-table-cell">
                        <input type="text" id="isbn1" name="g[]" required/>
                    </td>
                </tr>

            </table>

            <button class="btn btn-success" name="submit_form" type="submit" id="submit_publication"
                    style="margin-left: 95%; margin-top: 20px">Submit
            </button>
    </div>
    </form>


</div>

<script src="/Styles/bootstrap-4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
