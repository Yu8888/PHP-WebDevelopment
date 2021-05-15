// using POST method
var xhr = new XMLHttpRequest();
function getData(dataSource, divID, aName, aPwd) {
 if(xhr) {
 var obj = document.getElementById(divID);
 var requestbody ="name="+encodeURIComponent(aName)+"&pwd="+encodeURIComponent(aPwd);
 xhr.open("POST", dataSource, true);

 xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 xhr.send(requestbody);
 xhr.onreadystatechange = function() {
 if (xhr.readyState == 4 && xhr.status == 200) {
 obj.innerHTML = xhr.responseText;
 } // end if
 } // end anonymous call-back function

 } // end if
} // end function getData() 