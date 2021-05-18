<?php 
// $sql_host="cmslamp14.aut.ac.nz";
// $sql_user="jnc6641";
// $sql_pass="changjiu.5210";
// $sql_db="jnc6641";
$sql_host="localhost";
 $sql_user="root";
 $sql_pass="mr.liu1009.";
 $sql_db="test";
$conn = mysqli_connect($sql_host,$sql_user,$sql_pass,$sql_db);            
        if ($conn->connect_error){
            die("connection fail:".$conn->connect_error);
        }

$sql1 = "CREATE TABLE IF NOT EXISTS assign22 (
    bookingid INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    bookingstatus VARCHAR(30) NOT NULL DEFAULT 'unassigned',
    bookingdate VARCHAR(30) NOT NULL,
    cname VARCHAR(30) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    unumber VARCHAR(50),
    snumber VARCHAR(30) NOT NULL,
    stname VARCHAR(30) NOT NULL,
    sbname VARCHAR(30),
    dsbname VARCHAR(30),
    bookingtime VARCHAR(30) NOT NULL,
    ptime VARCHAR(30) NOT NULL
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 ";
    
    if ( $conn ->query( $sql1 ) === TRUE)
    {   
    echo "" ;
    } else {   
    echo "Create table failed: " . $conn ->error;
    }
   
    $cname = $_POST['cname'];
    $phone = $_POST['phone'];
    $unumber = $_POST['unumber'];
    $snumber = $_POST['snumber'];
    $stname = $_POST['stname'];
    $sbname = $_POST['sbname'];
    $dsbname = $_POST['dsbname'];
    $bookingtime = $_POST['date'];
    $time = $_POST['time'];

    $currentDateTime=date('d-m-Y');
    date_default_timezone_set('Pacific/Auckland'); 
    $currentDateTime1 = date_default_timezone_get();
 $currentDateTime1=date('H:i');
 
    $sql1 = "INSERT INTO assign22(bookingdate,cname, phone, unumber, snumber, stname,sbname,dsbname,bookingtime,ptime) VALUES ('$currentDateTime1','$cname', '$phone', '$unumber', '$snumber', '$stname','$sbname','$dsbname','$bookingtime','$time')";
    mysqli_query($conn , $sql1);
    $sql = "SELECT bookingid FROM assign22 WHERE cname = '$cname'";
    $data =  mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if(isset($data)){
        // $result = mysqli_query($con, $query) or die(mysqli_error($con));
     
        while ($row = mysqli_fetch_array($data, MYSQLI_BOTH)) {
            $id['bookingid'] = $row['bookingid'];
           
        }
       echo 'Thank you! Your booking reference number is'. $id['bookingid']. '. You will be picked up in front of your provided address at '. $time. ' on ' .$bookingtime. '.';
    // echo  $id['bookingid'];
    }else{
        echo "error";
    }
   
 

?>