<!DOCTYPE html>
<html>
<body>

<h1>Hello World!</h1>


<button type="button" onclick="myFunction('red')">change background color to red</button>
</br>

<button type="button" onclick="myFunction('green')">change background color to green</button>
</br>

<button type="button" onclick="myFunction('blue')">change background color to blue</button>
</br>

<button type="button" onclick="myFunction('pink')">change background color to pink</button>
</br>

<script>

function myFunction(color) {
  document.body.style.backgroundColor =color;
}
</script>

</body>
</html>
