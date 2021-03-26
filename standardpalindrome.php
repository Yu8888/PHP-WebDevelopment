<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Lab03 Task3- Regular expression</h1>
    <?php
$b = $_POST["inputt1"];

// $b =  strrev($a);
$b = str_replace(' ', '', $b);
$b = preg_replace('/[^A-Za-z0-9\-]/', '', $b);
// $b = strtolower($b);

// $c =strrev($b);

// if($c == $b ){

print "<br>The string you entered after regular expression is $b! ";

// } else {

// print "<br>The string you entered $a is a perfect palindrome!"; 

// }
?>
</body>
</html>