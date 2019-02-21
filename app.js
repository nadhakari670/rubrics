function myFunction() {
  var row = document.getElementById("headerRow");
  var x = row.insertCell(1);
  x.innerHTML = "1";
  var second_row = document.getElementById("second_row");
  var y = row.insertCell(1);
  x.innerHTML = "";
}

function deleteRow(){
    var row= document.getElementById("headerRow");
    var x = row.deleteCell(1);
    x.innerHTML = "";
    var second_row = document.getElementById("second_row");
    var y = row.deleteCell(1);
    x.innerHTML = "";
}