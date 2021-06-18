// JavaScript Document

function makeTable(){
	var theTable =document.getElementById("tbl");
	//IE requires rows to be added to a tBody element
	//IE automatically creates a tBody element - delete it and then manually create
	if (theTable.firstChild != null){
		var badIEBody = theTable.childNodes[0];  
		theTable.removeChild(badIEBody);
	}
	var tBody = document.createElement("TBODY");
	theTable.appendChild(tBody);

	var newRow = document.createElement("tr");
	var c1 = document.createElement("td");
	var v1 = document.createTextNode("7308");
	c1.appendChild(v1);
	newRow.appendChild(c1);
	var c2 = document.createElement("td");
	var v2 = document.createTextNode("software engineering");
	c2.appendChild(v2);
	newRow.appendChild(c2);
	tBody.appendChild(newRow);

	newRow = document.createElement("tr");
	c1 = document.createElement("td");
	v1 = document.createTextNode("7003");
	c1.appendChild(v1);
	newRow.appendChild(c1);
	c2 = document.createElement("td");
	v2 = document.createTextNode("Web Development");
	c2.appendChild(v2);
	newRow.appendChild(c2);
	tBody.appendChild(newRow);
}

function appendRow() {
  var rn = window.prompt("Input number of rows",1);
  for (var r = 0; r < parseInt(rn, 10); r++) {
    var number = window.prompt("please input the subject number");
  	var subject = window.prompt("please input the subject name");
    var row = document.getElementById('tbl').insertRow(-1);
    // row.style.color="pink";
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
	const randomColor = Math.floor(Math.random()*16777215).toString(16);
	row.style.color = "#" + randomColor;
	// color.innerHTML = "#" + randomColor;
    // Add some text to the new cells:
    cell1.innerHTML = number;
    cell2.innerHTML = subject;
  }

}


