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
            $sd_1="12";
            $sql_host = "cmslamp14.aut.ac.nz";
            $sql_user = "yxn9194";
            $sql_pass = "";
            $sql_db = "yxn9194"            ;
            $conn = mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
            if ($conn->connect_error) {
                die("connection fail:" . $conn->connect_error);
            }
            
            $sql1 = "CREATE TABLE IF NOT EXISTS Car (
            
            car_id int(10) NOT NULL PRIMARY KEY,
            make VARCHAR(30) NOT NULL,
            model VARCHAR(30) NOT NULL,
            price int(10) NOT NULL,
            year of manufactory int(10) NOT NULL
    
            )ENGINE=InnoDB DEFAULT CHARSET=utf8 ";
    
            if (!(mysqli_query($conn, $sql1))) {
                // echo "Insert fail;";
                // echo mysqli_error($conn);
            } else {
                echo "";
            }
            $sql1 = "select car_id, make, model, price from Car";
            $result=mysqli_query($conn,$sql1);
	if(!$result){
		die('fetch failed'.mysqli_error($conn));
	}
	echo "<h2>Mysql Car</h2>";
	echo "<table border='1'><tr><td>car_id</td><td>make</td><td>model</td><td>price</td></tr>";
	while($row=mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>{$row['car_id']}</td>";
		echo "<td>{$row['make']}</td>";
		echo "<td>{$row['model']}</td>";
		echo "<td>{$row['price']}</td>";
		echo "</tr>";
	}
    ?>
</body>
</html>