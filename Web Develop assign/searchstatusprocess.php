<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .father {
        position: relative;
        height: 600px;
        border: 2px solid black;
    }

    .a1 {
        position: absolute;
        bottom: 20px;
        right: 2px;
    }

    .a2 {
        position: absolute;
        bottom: 20px;
        left: 1px;
    }
</style>

<body>
    <div class="father">
        <?php
        $sql_host = "cmslamp14.aut.ac.nz";
        $sql_user = "yxn9194";
        $sql_pass = "mr.liu1009.";
        $sql_db = "yxn9194";

        $conn = mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
        if ($conn->connect_error) {
            die("connection fail:" . $conn->connect_error);
        }
        
        $sql1 = "CREATE TABLE IF NOT EXISTS login12 (
        
        statuscode VARCHAR(30) NOT NULL PRIMARY KEY,
        status1 VARCHAR(30) NOT NULL,
        share VARCHAR(30) NOT NULL,
        date1 VARCHAR(30) NOT NULL,
        permissionType VARCHAR(30) NOT NULL

        )ENGINE=InnoDB DEFAULT CHARSET=utf8 ";

        if (!(mysqli_query($conn, $sql1))) {
            echo "Insert fail;";
            echo mysqli_error($conn);
        } else {
            echo "";
        }
        $Search = $_GET["Search"];
        $sql1 = "select * from login12 where status1 like '%" . $Search . "%' OR statuscode like '%" . $Search . "%'";
        
        $result = mysqli_query($conn, $sql1);
        if (!$result) {
            die('Search fail: ' . mysqli_error($conn));
        }
        echo "<h2>Status Information</h2>";
        
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<table border='0'><tr><td>Status: </td><td>{$row['statuscode']}</td></tr>";
            echo "<table border='0'><tr><td>Statuscode: </td><td>{$row['status1']}</td></tr>";
            echo "<table border='0'><tr><td>Share: </td><td>{$row['share']}</td></tr>";
            echo "<table border='0'><tr><td>Date Posted: </td><td>{$row['date1']}</td></tr>";
            echo "<table border='0'><tr><td>Permission: </td><td>{$row['permissionType']}</td></tr>";
            echo "</tr>";
        }


        ?>
        <a href="http://yxn9194.cmslamp14.aut.ac.nz/assign1/index.html" target="_black" class="a1">Return to Homepage</a>
        <a href="http://yxn9194.cmslamp14.aut.ac.nz/assign1/searchstatusform.html" target="_black" class="a2">Search Status</a>
    </div>
</body>

</html>