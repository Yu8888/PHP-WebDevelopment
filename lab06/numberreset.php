<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    if (!isset ($_SESSION["number"])) { // check if session variable exists
        $_SESSION["number"] = 0; // create the session variable
        }
        $num = $_SESSION["number"];
    session_unset();
    session_destroy();
    header("location:number.php");

?>
</body>
</html>