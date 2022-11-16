function representYes(idname){
    if (document.getElementById(idname).checked){
        if (idname === "app_others"){

        }

    }
}

function addRow(tableID) {
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
    var element2 = document.createElement("select");
    var opt = document.createElement('option');
    var opt1 = document.createElement('option');

    opt.text = 'FIRST AUTHOR';
    opt1.text = 'co-AUTHOR';
    element2.options.add(opt,0);
    element2.options.add(opt1,1);

    element2.type = "text";
    element2.name = 'a[]';
    element2.options.add(opt,0);
    element2.options.add(opt1,1);


    cell2.appendChild(element2);
    /////////////////////////////////////
    var cell2 = row.insertCell(2);
    var element2 = document.createElement("input");
    element2.type = "text";
    element2.name = 'b[]';
    cell2.appendChild(element2);
    /////////////////////////////////////
    var cell2 = row.insertCell(3);
    var element2 = document.createElement("input");
    element2.type = "date";
    element2.name = 'c[]';
    cell2.appendChild(element2);
    /////////////////////////////////////
    var cell2 = row.insertCell(4);
    var element2 = document.createElement("select");
    var opt = document.createElement('option');
    var opt1 = document.createElement('option');
    var opt2 = document.createElement('option');
    var opt3 = document.createElement('option');

    opt.text = 'JOURNAL';
    opt1.text = 'BOOK';
    opt2.text = 'BOOK CHAPTER';
    opt3.text = 'CONFERENCE PROCEEDING';

    element2.options.add(opt,0);
    element2.options.add(opt1,1);
    element2.options.add(opt2,2);
    element2.options.add(opt3,3);

    element2.type = "text";
    element2.name = 'd[]';
    cell2.appendChild(element2);
    /////////////////////////////////////
    var cell2 = row.insertCell(5);
    var element2 = document.createElement("input");
    element2.type = "text";
    element2.name = 'e[]';
    cell2.appendChild(element2);
    /////////////////////////////////////
    var cell2 = row.insertCell(6);
    var element2 = document.createElement("input");
    element2.type = "number";
    element2.name = 'f[]';
    cell2.appendChild(element2);
    /////////////////////////////////////
    var cell2 = row.insertCell(7);
    var element2 = document.createElement("input");
    element2.type = "number";
    element2.name = 'g[]';
    cell2.appendChild(element2);


    document.getElementById('submit');

}

function addRow_prof_conferences(tableID) {
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
        removeRow(btnName,tableID);
    }

    cell1.appendChild(element1);

    /////////////////////////////////////
    var cell2 = row.insertCell(1);
    var element2 = document.createElement("input");
    element2.type = "text";
    element2.name = 'title[]';
    cell2.appendChild(element2);

    /////////////////////////////////////
    var cell23 = row.insertCell(2);
    var element23 = document.createElement("select");
    var opt = document.createElement('option');
    var opt1 = document.createElement('option');
    var opt2 = document.createElement('option');

    opt.text = 'Presenter';
    opt1.text = 'Organizer';
    opt2.text = 'Attendee';
    element23.options.add(opt,0);
    element23.options.add(opt1,1);
    element23.options.add(opt2,2);

    element23.type = "text";
    element23.name = 'role[]';

    cell23.appendChild(element23);

    /////////////////////////////////////
    var cell21 = row.insertCell(3);
    var element21 = document.createElement("input");
    element21.type = "text";
    element21.name = 'location[]';
    cell21.appendChild(element21);
    /////////////////////////////////////

    /////////////////////////////////////
    var cell22 = row.insertCell(4);
    var element22 = document.createElement("input");
    element22.type = "url";
    element22.name = 'url[]';
    cell22.appendChild(element22);
    /////////////////////////////////////


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
    element1.setAttribute("class", "form-control form-control-lg");

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