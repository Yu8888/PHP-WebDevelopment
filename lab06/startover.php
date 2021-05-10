<?php
 session_start();; // start the session
 $num = $_SESSION["number"];; // copy the value to a variable
 session_destroy();
 header("location:guessinggame.php"); // redirect to number.php
?> 