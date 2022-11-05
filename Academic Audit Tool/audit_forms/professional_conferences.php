<?php include ''?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conferences Attended</title>
</head>
<body>
    <div class="container-fluid">
        <h3>Professional Conferences Attended in the Academic year 2021/2022</h3>

    <form class="publication_area" id="publication_form1" >
        <div id="">
            <table id="publication_table" class="table">
                <tr class="d-table-row">
                    <td class="d-table-cell">
                        Name/Time
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
                        <input type="text" id="conference_name"/>
                    </td>
                    <td class="d-table-cell">
                        <select id="conference_role">
                            <option disabled>--select--</option>
                            <option>Presenter</option>
                            <option>Organizer</option>
                            <option>Attendee</option>
                        </select>
                    </td>
                    <td class="d-table-cell">
                        <input type="text" id="conference_location"/>
                    </td>
                    <td class="d-table-cell">
                        <input type="url" id="conference_url"/>
                    </td>
                </tr>

                <tr class="d-table-row">
                    <td class="d-table-cell">
                        <input type="text" id="conference_name2"/>
                    </td>
                    <td class="d-table-cell">
                        <select id="conference_role2">
                            <option disabled>--select--</option>
                            <option>Presenter</option>
                            <option>Organizer</option>
                            <option>Attendee</option>
                        </select>
                    </td>
                    <td class="d-table-cell">
                        <input type="text" id="conference_location2"/>
                    </td>
                    <td class="d-table-cell">
                        <input type="url" id="conference_url2"/>
                    </td>
                </tr>

                <tr class="d-table-row">
                    <td class="d-table-cell">
                        <input type="text" id="conference_name3"/>
                    </td>
                    <td class="d-table-cell">
                        <select id="conference_role3">
                            <option disabled>--select--</option>
                            <option>Presenter</option>
                            <option>Organizer</option>
                            <option>Attendee</option>
                        </select>
                    </td>
                    <td class="d-table-cell">
                        <input type="text" id="conference_location3"/>
                    </td>
                    <td class="d-table-cell">
                        <input type="url" id="conference_url3"/>
                    </td>
                </tr>

                <tr class="d-table-row">
                    <td class="d-table-cell">
                        <input type="text" id="conference_name4"/>
                    </td>
                    <td class="d-table-cell">
                        <select id="conference_role4">
                            <option disabled>--select--</option>
                            <option>Presenter</option>
                            <option>Organizer</option>
                            <option>Attendee</option>
                        </select>
                    </td>
                    <td class="d-table-cell">
                        <input type="text" id="conference_location4"/>
                    </td>
                    <td class="d-table-cell">
                        <input type="url" id="conference_url4"/>
                    </td>
                </tr>

                <tr class="d-table-row">
                    <td class="d-table-cell">
                        <input type="text" id="conference_name5"/>
                    </td>
                    <td class="d-table-cell">
                        <select id="conference_role5">
                            <option disabled>--select--</option>
                            <option>Presenter</option>
                            <option>Organizer</option>
                            <option>Attendee</option>
                        </select>
                    </td>
                    <td class="d-table-cell">
                        <input type="text" id="conference_location5"/>
                    </td>
                    <td class="d-table-cell">
                        <input type="url" id="conference_url5"/>
                    </td>
                </tr>


            </table>
        </div>
        <button class="btn btn-success" type="submit" id="submit_publication">Submit</button>
    </form>
    </div>

</body>
</html>
