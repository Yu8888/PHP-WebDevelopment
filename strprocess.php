<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Web Development Form - Lab 3</h1>
    <?php
    
    if (isset ($_POST["put"])){
        $str = $_POST["put"];
        $pattern = "/^[A-Za-z ]+$/";
    if (preg_match($pattern,$str)){
        $ans="";
        $len= strlen($str);
        for($i =0;$i<$len;$i++){
            $letter = substr($str,0,1);
            if(!is_numeric(strpos("AEIOUaeiou","h"))){
                $ans =$ans.$letter;
            }
        }
        echo"<p>The word with no vowels is ", $ans, ".</p>";

       }else {echo "<p>Please enter a string containing only letters or space.</p>";

         }   }else{
                echo"<p>Please enter string from the input form.</p>";
            }
        
    

        ?>

</body>
</html>