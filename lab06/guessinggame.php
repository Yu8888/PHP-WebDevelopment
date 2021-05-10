<?php
 session_start(); // start the session
 $randNum = rand(1,100);
 if (!isset ($_SESSION["click"])) { // check if session variable exists
 $_SESSION["click"] = 0; // create the session variable
  // create the session variable
 }
 
 $num = $_SESSION["click"];
  // copy the value to a variable
  $_SESSION["number"]=$randNum;
 $num1 = $_SESSION["number"]; // copy the value to a variable
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gussing game</title>
</head>
<body>
<?php 

?>
    <section>
    <h1>Gussing Game</h1>
    </section>
    <section><p>Enter a number between 1 to 100,<br>then press the Guess button</p></section>
    <section>
    <div>
    <form action="" method="post">
    <input type="number" name="guess" id="guess" min="1" max="100">
    <input type="submit" value="guess">
    <p> <?php    if(isset($_POST['guess'])){
        if($_POST['guess']==$num1){
            echo "Congraduations! You guessed the right number";
        }else{
            echo "Sorry, this is the wrong number, please try again";
        }
    }
    
    ?></p>
    <p>The number of guess is : <?php echo $_SESSION['click']++ ?></p>
    </form>
   
    </div>
    
    

    <a href="giveup.php">Give up</a><br>
    <a href="startover.php">Start over</a>
    </section>


</body>
</html>