function addRow() {
          
    var myName = document.getElementById("what");
    var age = document.getElementById("when");
    var table = document.getElementById("myTable");
 
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
 
    row.insertCell(0).innerHTML= '<input type="button" value = "Delete" onClick="Javacsript:deleteRow(this)">';
    row.insertCell(1).innerHTML= myName.value;
    row.insertCell(2).innerHTML= age.value;
 
}
 
function deleteRow(obj) {
      
    var index = obj.parentNode.parentNode.rowIndex;
    var table = document.getElementById("myTable");
    table.deleteRow(index);
    
}
 
function load() {
    
    console.log("Page load finished");
 
}
