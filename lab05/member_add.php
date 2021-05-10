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
       $sql_host = "cmslamp14.aut.ac.nz";
       $sql_user = "yxn9194";
       $sql_pass = "mr.liu1009.";
       $sql_db = "yxn9194";     

        $m = $_POST["memberFirstName"];
        $n = $_POST["memberLastName"];
        $p = $_POST["gender"];
        $o = $_POST["email"];
        $q = $_POST["phone"];
        
        $conn = mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
        if ($conn->connect_error) {
            die("connection fail:" . $conn->connect_error);
        }

        $sql = "CREATE TABLE IF NOT EXISTS vipmember (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            memberFirstName VARCHAR(30) NOT NULL UNIQUE,
            memberLastName VARCHAR(30) NOT NULL,
            gender VARCHAR(30) NOT NULL,
            email VARCHAR(30) NOT NULL,
            phone int(11) NOT NULL

            )ENGINE=InnoDB DEFAULT CHARSET=utf8 ";
        if ($conn->query($sql) === TRUE) {
            echo "Table created successfully!<br>";
        } else {
            echo "Create table failed: " . $conn->error;
        }

        $sql = "INSERT INTO vipmember(memberFirstName, memberLastName, gender, email, phone) VALUES ('$m','$n','$p','$o','$q')";
       
        
        if (!(mysqli_query($conn, $sql))) {
            echo "Insert fail;<br>";
            echo mysqli_error($conn);
        } 

        else {
            echo "Insert Successfully！<br>";
            echo "<a href='http://yxn9194.cmslamp14.aut.ac.nz/lab05/member_add_form.php' target='_black' >Return to Form</a><br>";
        }


    
    ?>

</body>
</html>