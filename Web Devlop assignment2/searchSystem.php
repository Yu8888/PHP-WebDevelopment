<?php
 $sql_host = "cmslamp14.aut.ac.nz";
 $sql_user = "yxn9194";
 $sql_pass = "mr.liu1009.";
 $sql_db = "yxn9194";

$Search = $_POST["bsearch"];

$conn = mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
if ($conn->connect_error) {
    die("connection fail:" . $conn->connect_error);
}


$sql = "SELECT * FROM assign2";
$result1 = mysqli_query($conn, $sql);


if ($Search == null) {
    $today = date("H:i");
    $timestampnow = strtotime($today); // the time will become to number of seconds now
    $sqll = "SELECT pickUpTime FROM assign2";
    $result2 = mysqli_query($conn, $sqll);

    foreach ($result2 as $time) {
        $resultt = $time['pickUpTime'];
        $timestampbooking = strtotime($resultt); // we picked up the number of seconds

        if (($timestampbooking > $timestampnow)) {
            $finaltime = $timestampbooking - $timestampnow;
            if ($finaltime <= ( 2 * 60 * 60)) {
                $sql5 = "SELECT bookingNumber,cname,phoneNumber,suburb,destinationSuburb,pickUpTime,status1 FROM assign2 WHERE status1 = 'unassigned' AND pickUpTime = '$resultt' ";
                $data = mysqli_query($conn, $sql5);
                if (!$data == null) {
                    foreach ($data as $q) {
                        echo '<table border="1">
                        <tr>
                          <th>bookingNumber</th>
                          <th>cname</th>
                          <th>phoneNumber</th>
                          <th>suburb</th>
                          <th>destinationSuburb</th>
                          <th>pickUpTime</th>
                          <th>status1</th>
                        </tr>
                        <tr>
                          <td>'.$q["bookingNumber"].'</td>
                          <td>'.$q["cname"].'</td>
                          <td>'.$q["phoneNumber"].'</td>
                          <td>'.$q["suburb"].'</td>
                          <td>'.$q["destinationSuburb"].'</td>
                          <td>'.$q["pickUpTime"].'</td>
                          <td id="'.$q["bookingNumber"].'" class="td" >'.$q["status1"].'</td>
                          <td><input type="submit" id="'.$q["bookingNumber"].'" value="Assign" class="button" /></td>
                        </tr>
                        </table>';
                    }
                } else {
                    echo "cant get data<br>";
                }
            } else if($finaltime > (2 * 60 * 60)){
                // echo"123";
            }
        } else if($timestampbooking <= $timestampnow){
            $finaltime = $timestampnow - $timestampbooking;
            if ($finaltime <= ( 60 )) {
                $sql6 = "SELECT bookingNumber,cname,phoneNumber,suburb,destinationSuburb,pickUpTime,status1 FROM assign2 WHERE status1 = 'unassigned' AND pickUpTime = '$resultt' ";
                $data2 = mysqli_query($conn, $sql6);
                if (!$data2 == null) {
                    foreach ($data2 as $q) {
                        echo '<table border="1">
                        <tr>
                          <th>bookingNumber</th>
                          <th>cname</th>
                          <th>phoneNumber</th>
                          <th>suburb</th>
                          <th>destinationSuburb</th>
                          <th>pickUpTime</th>
                          <th>status1</th>
                        </tr>
                        <tr>
                          <td>'.$q["bookingNumber"].'</td>
                          <td>'.$q["cname"].'</td>
                          <td>'.$q["phoneNumber"].'</td>
                          <td>'.$q["suburb"].'</td>
                          <td>'.$q["destinationSuburb"].'</td>
                          <td>'.$q["pickUpTime"].'</td>
                          <td id="'.$q["bookingNumber"].'" class="td" >'.$q["status1"].'</td>
                          <td><input type="submit" id="'.$q["bookingNumber"].'" value="Assign" class="button" /></td>
                        </tr>
                        </table>';
                    }
                } else {
                    echo "cant get data<br>";
                }
            } 
        }
    }
} else if (!$Search == null) {
    
    $sql0 = "select status1 from assign2 where bookingNumber='$Search'";
    $sqlp = "select bookingNumber from assign2 where bookingNumber='$Search'";

    
    $result4 = mysqli_query($conn, $sql0);
    $result5 = mysqli_query($conn, $sqlp);
    $row1 = mysqli_fetch_array($result4);
    $row2 = mysqli_fetch_array($result5);

        if ($Search != $row2['bookingNumber']) {
            echo "Sorry, this booking number is not at database!";
        } 
          else if ($Search == $row2['bookingNumber'] && $row1['status1']=='assigned') {
            echo"Your booking number has been assigned already, no need to assign again!";
          }
          else{
            $sqls = "UPDATE assign2 SET status1='assigned' WHERE bookingNumber='$Search'";
            $result3 = mysqli_query($conn, $sqls);
            echo"You assigned the taxi for this number successfully! ";

          }
            
            }

 else if($Search==0) {

    echo "Sorry, this booking number is not at database!";
    
}

?>