<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Managing Session</title>
</head>
<body>
<h1>Web Development - Lab06</h1>
<?php
 session_start();
 if (!isset ($_SESSION["number"])) { // check if session variable exists
    $_SESSION["number"] = 0; // create the session variable
    }
 $num = $_SESSION["number"];// displays the number
 echo "<p>The number is $num</p>"; 
  // start the session

?>

<p><a href="numberup.php">Up</a></p> 
<p><a href="numberdown.php">Down</a></p>
<p><a href="numberreset.php">Reset</a></p>
</body>
</html>