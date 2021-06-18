<!DOCTYPE html>
<html>
<body>

<h2>JavaScript For Loop</h2>
<button type="button"
onclick="document.getElementById('demo').innerHTML = num">
Click me to show the number from 1 to 10.</button>
<p id="demo"></p>

<script>
var num = "";
var all=0;
var i;
for (i = 1; i <= 10; i++) {
  all+=i;
  num += "The number is: " +all + "<br>";
  
}

</script>

</body>
</html>
