<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lab02 Task4 - Leap Year</h1>

    <?php

    function year_check($my_year)
    {
    if ($my_year % 400 == 0 && $my_year %100 ==0)
        print("The year you entered $my_year is a leap year.");
    if ($my_year % 4 == 0)
        print("The year you entered $my_year is a leap year.");
    else if ($my_year % 100 == 0)
        print("The year you entered $my_year is not a leap year.");
    else
        print("The year you entered $my_year is not a leap year.");
    }
    $my_year = $_POST["Input1"];
    year_check($my_year);
    ?>
</body>
</html>