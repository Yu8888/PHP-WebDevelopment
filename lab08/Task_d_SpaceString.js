function SpaceString(){
	var str = window.prompt("Please enter a string consisting of several words with spaces");
	var arr = str.split(" ");
	var text="";

	for (i = 0; i < arr.length; i++) {
	text += arr[i]+ "<br>";
	}
	document.getElementById("words").innerHTML = text;

}