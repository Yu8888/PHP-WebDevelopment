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
        $sql_host="localhost";
        $sql_user="root";
        $sql_pass="mr.liu1009.";
        $sql_db="test";
       
    // include("poststatusprocess.php");
    // $m =$_POST["statuscode"];
    // $n =$_POST["status"];
    // $p =$_POST["sex"];
    // $o =$_POST["Date"];
    // $i =$_POST["1"];
//     echo "Post successfully!<br>
//           Your Status Code: $m
//           Your Status: $n
//           Share: $p
//           Date: $o
//           Permission type: $i";

    $conn = mysqli_connect($sql_host,$sql_user,$sql_pass,$sql_db);            
    if ($conn->connect_error){
        die("connection fail:".$conn->connect_error);
    }
//     // $sql ="CREATE DATABASE test1";
    $sql1 = "CREATE TABLE IF NOT EXISTS login00 (
        id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        statuscode VARCHAR(30) NOT NULL,
        status1 VARCHAR(30) NOT NULL,
        share VARCHAR(30) NOT NULL,
        date1 DATE NOT NULL,
        permissionType VARCHAR(30) NOT NULL

        )ENGINE=InnoDB DEFAULT CHARSET=utf8 ";
//         if ( $conn ->query( $sql ) === TRUE)
//         {   
//         echo "Table MyGuests created successfully" ;
//         } else {   
//         echo "创建数据表错误: " . $conn ->error;
//         }
//         // $conn ->close();
//         $sql = "SELECT date_format(date1, '%d/%m/%Y') as date1" ;
//         $sql = "insert into login00(statuscode, status1, share, date1, permissionType)values('$m','$n','$p','$o','$i')" ;
       
//         // $sql = "insert into login4( status)values('$n')" ;
//         //插入数据库
        if (!(mysqli_query( $conn , $sql1 ))){
            echo "Insert fail;" ;
            echo mysqli_error($conn);
        } else {
            echo "" ;
}
    $Search=$_GET["Search"];
    $sql1="select * from login00 where statuscode like '%".$Search."%'";
    $result=mysqli_query($conn,$sql1);
    if(!$result){
        die('Search fail: '.mysqli_error($conn));
    }
    echo "<h2>Status Information</h2>";
	// echo "<table border='1'><tr><td>status</td><td>statuscode</td></tr>";
	while($row=mysqli_fetch_array($result)){
		echo "<tr>";
        echo "<table border='0'><tr><td>Status: </td><td>{$row['statuscode']}</td></tr>";
        echo "<table border='0'><tr><td>Statuscode: </td><td>{$row['status1']}</td></tr>";
        echo "<table border='0'><tr><td>Share: </td><td>{$row['share']}</td></tr>";
		// echo "<tr><td>{$row['statuscode']}</td></tr>";
        echo "<table border='0'><tr><td>Permission: </td><td>{$row['permissionType']}</td></tr>";
		// echo "<tr><td>{$row['status1']}</td></tr>";
		echo "</tr>";






    }
    ?>
</body>
</html>