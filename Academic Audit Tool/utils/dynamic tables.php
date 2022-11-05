<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
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
                removeRow(btnName);  
            }
            cell1.appendChild(element1);
            var tht = ['a','b','c','d','e','f','g']; 
            for(var x = 1; x<8; x++){
                var cell2 = row.insertCell(x);  
                var element2 = document.createElement("input");  
                element2.type = "text";
                element2.name = tht[x-1] + (rowCount);        
                cell2.appendChild(element2);
                
            }
            document.getElementById('submit');
            
        }  
    
        function removeRow(btnName) {  
            try {  
                var table = document.getElementById('dataTable');  
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
        
        
    </script>
</head>
<body>
    <p>
        <button id="adding"onclick="addRow('dataTable');">Add</button>
        <button id="removing">Remove</button>
    </p>
    <form action="" name="fisher" method="post">
        <input type="text" name="234a1"/>
        <input type="text" name="56a1"/>
        <input type="text" name="a541"/>
        <input type="text" name="a381"/>
        <input type="text" name="afrc1"/>
        <button type="submit" id="submit" value="submit">submit</button>

    </form>

    <form action="" method="post">
        <button style="padding: 20px; border: 2px solid rgb(25, 146, 25);" type="submit" id="submit" value="submit">submit</button>
        <table style="padding: 20px; border: 2px solid rgb(25, 146, 25);" id="dataTable">
            <thead  >
                <td>
                    
                </td>
                <td>
                    Author
                </td>
                <td>
                    Publication Year
                </td>
                <td>
                    Title
                </td>
                <td>
                    Type of Publication
                </td>
                <td>
                    Publisher
                </td>
                <td>
                    Volume Number
                </td>
                <td>
                    ISBN
                </td>
            </thead>
        
            <tbody>
                <tr>  
                    <td>
                        
                    </td>             
                    <td>
                        <input type="text" name="a1"/>
                    </td>
                    <td>
                        <input type="text" name="b1"/>
                    </td>
                    <td>
                        <input type="text" name="c1"/>
                    </td>
                    <td>
                        <input type="text" name="d1"/>
                    </td>
                    <td>
                        <input type="text" name="e1"/>
                    </td>
                    <td>
                        <input type="text" name="f1"/>
                    </td>
                    <td>
                        <input type="text" name="g1"/>
                    </td>
                </tr>                                      
            </tbody>           
        </table>
       
    </form>
    <?php 
    print_r(count($_POST));
    print_r($_POST);
    
    
    ?>
</body>
</html>
<!-- 
<form id="mainform" >
    <input type="button" value="add" onclick="add();"/>
    <input type="button" value="remove" onclick="remove();"/>
</form>
    
    <script>
        function add() {  
             var x= document.createElement("INPUT");
             x.setAttribute("type", "text");
             x.setAttribute("placeholder", "Name");
             x.setAttribute("class", "someInput");
             document.body.appendChild(x);
        }
        
        function remove() {
          var childs = document.body.getElementsByClassName("someInput");
          if(childs.length > 0) {
            document.body.removeChild(childs[childs.length - 1]);
          }
        }
        
       
       
    </script> -->