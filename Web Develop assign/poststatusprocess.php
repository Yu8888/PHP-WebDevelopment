<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=P, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="content">
    <?php
    $sql_host = "cmslamp14.aut.ac.nz";
    $sql_user = "yxn9194";
    $sql_pass = "mr.liu1009.";
    $sql_db = "yxn9194";

    $c = $_POST["statuscode"];
    $pattern1 = "/^S{1}[0-9]{4}$/";
    $d = $_POST["status"];
    $pattern = "/^[a-zA-z0-9., ?!]+$/";
    if (preg_match($pattern1, $c) == 0 && preg_match($pattern, $d) == 1) {
        echo "Status code:Please input 'S'and followed with four numbers!";
    } else if (preg_match($pattern1, $c) == 1 && preg_match($pattern, $d) == 0) {
        echo "Status:Please input alphanumeric characters including spaces, comma, period (full stop), 
        exclamation point and question mark only!";
    } else if (preg_match($pattern1, $c) == 0 && preg_match($pattern, $d) == 0) {
        echo "Status code:Please input 'S'and followed with four numbers.<br>
              Status:Please input alphanumeric characters including spaces, comma, period (full stop), 
              exclamation point and question mark only!";
    } 

    else {
        $hobby_arr = array();
        $hobby_arr = $_POST['hobby'];
                $hobby = implode('、', $hobby_arr);
                $m = $_POST["statuscode"];
                $n = $_POST["status"];
                $p = $_POST["sex"];
                $o = $_POST["Date"];
                echo "Post successfully!<br>
                      Your Status Code: $m
                      Your Status: $n
                      Share: $p
                      Date: $o
                      Permission type: $hobby";
        ?>
        </div>
        <?php
        $conn = mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
        if ($conn->connect_error) {
            die("connection fail:" . $conn->connect_error);
        }

        $sql = "CREATE TABLE IF NOT EXISTS login12 (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            statuscode VARCHAR(30) NOT NULL UNIQUE,
            status1 VARCHAR(30) NOT NULL,
            share VARCHAR(30) NOT NULL,
            date1 VARCHAR(30) NOT NULL,
            permissionType VARCHAR(60) NOT NULL

            )ENGINE=InnoDB DEFAULT CHARSET=utf8 ";
        if ($conn->query($sql) === TRUE) {
            echo "Table created successfully!<br>";
        } else {
            echo "Create table failed: " . $conn->error;
        }

        $sql = "INSERT INTO login12(statuscode, status1, share, date1, permissionType) VALUES ('$m','$n','$p','$o','$hobby')";
       
        
        if (!(mysqli_query($conn, $sql))) {
            echo "Insert fail;<br>";
            echo mysqli_error($conn);
        } 

        else {
            echo "Insert Successfully！<br>";
            echo "<a href='http://yxn9194.cmslamp14.aut.ac.nz/assign1/searchstatusform.html' target='_black' >Search Status</a><br>";
        }


    }
    ?>

</body>

</html>