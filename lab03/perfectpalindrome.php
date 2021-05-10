<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Lab03 Task2-Perfect Palindrome</h1>
    <?php
    
    // function check_plaindrome($string) {
    //     $string= $_POST["inputt"];
    //     //remove all spaces
    //     $string = str_replace(' ', '', $string);
    
    //     //remove special characters
    //     $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    
    //     //change case to lower
    //     $string = strtolower($string);
    
    //     //reverse the string
    //     $reverse = strrev($string);
    
    //     if ($string == $reverse) {
    //         echo "<p>It is Palindrome</p>";
    //     } 
    //     // else if(strcmp($string,$reverse)==0){
    //     //     echo "<p>It is Palindrome</p>";
    //     // }
    //     else {
    //         echo "</p>Not Palindrome</p>";
    //     }
    // }
    $a = $_POST["inputt"];

    $b =  strrev($a);
    $b = str_replace(' ', '', $b);
    $b = preg_replace('/[^A-Za-z0-9\-]/', '', $b);
    $b = strtolower($b);
    print $b;
    $c =strrev($b);

if($c == $b ){

    print "<br>The string you entered $a is a perfect palindrome!";

} else {

    print "<br>The string you entered $a is not a perfect palindrome!"; 

}
    ?>
</body>
</html>