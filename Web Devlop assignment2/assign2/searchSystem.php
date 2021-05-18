<?php
//  $sql_host="localhost";
//  $sql_user="root";
//  $sql_pass="mr.liu1009.";
//  $sql_db="test";

$Search = $_POST["bsearch"];

$conn = mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
if ($conn->connect_error) {
    die("connection fail:" . $conn->connect_error);
}

        // if(isset($Search)){
        //     echo "search";
        //     $sql1 = "select bookingNumber from assign2 where bookingNumber = '$Search'";
        //     $result = mysqli_query($conn, $sql1);
        // }
        $sql = "SELECT * FROM assign2";
        $result1 = mysqli_query($conn, $sql);

      
         if($Search==null){
             echo"1";
            $today = date("H:i");
            $timestampnow = strtotime($today);// become to s now
            $sqll = "SELECT pickUpTime FROM assign2";
            $result2 = mysqli_query($conn, $sqll);
            
            foreach($result2 as $time ){
                echo"ww";
                $resultt = $time['pickUpTime'];
                $timestampbooking = strtotime($resultt);// pick up s
                
                if(($timestampbooking>$timestampnow)){
                    $finaltime = -($timestampbooking - $timestampnow);
                    echo"opop";
                    if($finaltime <= (2 * 60 * 60)){
                    echo"plpl";
                        $sql5 = "SELECT bookingNumber,cname,phoneNumber,suburb,destinationSuburb,pickUpTime,status1 FROM assign2 WHERE status1 = 'unassigned' AND pickUpTime = '$resultt' ";
                        $data=mysqli_query($conn, $sql5);
                        if(!$data==null){
                            foreach($data as $q){
                                // echo "<h2>Booking Information</h2>";
                                echo "<table border='1'><tr><td>bookingNumber</td><td>cname</td><td>phoneNumber</td>
                                <td>suburb</td><td>destinationSuburb</td><td>pickUpDate</td><td>pickUpTime</td><td>status1</td></tr>";
                                echo "<tr>";
                                echo "<td>{$q['bookingNumber']}</td>";
                                echo "<td>{$q['cname']}</td>";
                                echo "<td>{$q['phoneNumber']}</td>";
                                echo "<td>{$q['suburb']}</td>";
                                echo "<td>{$q['destinationSuburb']}</td>";
                                echo "<td>{$q['pickUpTime']}</td>";
                                echo "<td>{$q['status1']}</td>";
                                echo "<td><input type='submit' value='assign' class='1'> </td>";
                                echo "</tr>";               
                                                    
                                
                            }
                        }else{
                            echo "cant get data<br>";
                        }
                        
                    }else{
                        echo"ssss";
                    }
                }
                
            }
        }
        else if(!$Search==null ){
            $row = mysqli_fetch_array($result1);
            if($Search!=$row['bookingNumber']){
                echo "Your prefer number is not at database or your prefer number is already assigned";
            }else if($Search==$row['bookingNumber']){
                echo "66";
                echo $row['bookingNumber'];
            echo "<h2>Booking Information</h2>";
            echo "<table border='1'><tr><td>bookingNumber</td><td>cname</td><td>phoneNumber</td><td>unitNumber</td><td>streetNumber</td>
            <td>streetName</td><td>suburb</td><td>destinationSuburb</td><td>pickUpDate</td><td>pickUpTime</td><td>status1</td><td>bookingDate</td><td>bookingTime</td></tr>";
            foreach ($result1 as $q ) {
                echo "<tr>";
                echo "<td>{$q['bookingNumber']}</td>";
                echo "<td>{$q['cname']}</td>";
                echo "<td>{$q['phoneNumber']}</td>";
                echo "<td>{$q['unitNumber']}</td>";
                echo "<td>{$q['streetNumber']}</td>";
                echo "<td>{$q['streetName']}</td>";
                echo "<td>{$q['suburb']}</td>";
                echo "<td>{$q['destinationSuburb']}</td>";
                echo "<td>{$q['pickUpDate']}</td>";
                echo "<td>{$q['pickUpTime']}</td>";
                echo "<td>{$q['bookingDate']}</td>";
                echo "<td>{$q['bookingTime']}</td>";
                echo "<td><input type='submit' value='assign' class='1'> </td>";
                echo "</tr>";
            }
            
        }
    }
        else{
            echo "6";
            echo "<h2>Booking Information</h2>";
            echo "<table border='1'><tr><td>bookingNumber</td><td>cname</td><td>phoneNumber</td><td>unitNumber</td><td>streetNumber</td>
            <td>streetName</td><td>suburb</td><td>destinationSuburb</td><td>pickUpDate</td><td>pickUpTime</td><td>status1</td><td>bookingDate</td><td>bookingTime</td></tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>{$row['bookingNumber']}</td>";
                echo "<td>{$row['cname']}</td>";
                echo "<td>{$row['phoneNumber']}</td>";
                echo "<td>{$row['unitNumber']}</td>";
                echo "<td>{$row['streetNumber']}</td>";
                echo "<td>{$row['streetName']}</td>";
                echo "<td>{$row['suburb']}</td>";
                echo "<td>{$row['destinationSuburb']}</td>";
                echo "<td>{$row['pickUpDate']}</td>";
                echo "<td>{$row['pickUpTime']}</td>";
                echo "<td>{$row['bookingDate']}</td>";
                echo "<td>{$row['bookingTime']}</td>";
                
                echo "<td><input type='submit' value='assign' class='1'> </td>";
                
                echo "</tr>";
            }
        }
    

?>
<script>
       function myFunction() {
            const p = document.querySelector('p');

            var elements = document.getElementsByClassName("oo");


            var formData = new FormData();

            for (var i = 0; i < elements.length; i++) {
                formData.append(elements[i].name, elements[i].value);
            }
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function () {
                if (xmlHttp.readyState == 4 && xmlHttp.status >= 200) {
                    p.innerHTML = xmlHttp.responseText;
                }
            }
            xmlHttp.open("POST", "searchSystem.php");
            xmlHttp.send(formData);
        }

</script>