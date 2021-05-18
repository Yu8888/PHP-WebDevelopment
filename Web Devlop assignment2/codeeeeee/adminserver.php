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
        }else{
            echo "";
        }
        
        $idbutton = $_POST["id"];

        if(isset($idbutton)){
            echo 'assign';
            $sql = "UPDATE assign22 SET bookingstatus='assigned' WHERE bookingid='$idbutton'";
            mysqli_query($conn, $sql);

        }else{
            
        
            $id = $_POST['bsearch'];
            $sql1 = "select bookingid from assign22 where bookingid = '$id'";
            $result = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $sql2 = "select bookingstatus from assign22 where bookingid = '$id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
        // $ptime = "SELECT ptime FROM assign2 WHERE bookingid = '$id'";
        if(isset($id) && $id >=1){
            if($id != $row['bookingid']){
                echo "number: ".$id." is not found. Please try again";
            }else if($row2['bookingstatus'] == 'assigned'){
                echo "number: ".$id." is already assigned. Please do another operation";
            }
            else{
        $sql = "UPDATE assign22 SET bookingstatus='assigned' WHERE bookingid='$id'";
        mysqli_query($conn, $sql);
        echo "Congraduations! You have already assigned a taxi to this client";
            }
        
        }else if(isset($id) && $id < 0){
            echo "Please input a positive number";
        }
        else{
        $today = date("H:i");
        $timestampnow = strtotime($today);// become to s now
        $sql = "SELECT ptime FROM assign2";
        $ptime=mysqli_query($conn, $sql);

        foreach ($ptime as $time)
        {   
         
            $result = $time['ptime'];
           
            $timestampbooking = strtotime($result);// pick up s
            
            if(($timestampbooking>$timestampnow)){
                $finaltime = $timestampbooking - $timestampnow;
                
                if($finaltime <= (2 * 60 * 60)){
                    
                    $sql5 = "SELECT bookingid,cname,phone,sbname,dsbname,ptime,bookingstatus FROM assign22 WHERE bookingstatus = 'unassigned' AND ptime = '$result' ";
                    $data=mysqli_query($conn, $sql5);
                    if(isset($data)){
                        foreach($data as $d){
                          
                            echo '<table>
                            <tr>
                              <th>bookingid</th>
                              <th>cname</th>
                              <th>phone</th>
                              <th>sbname</th>
                              <th>dsbname</th>
                              <th>ptime</th>
                              <th>bookingstatus</th>
                            </tr>
                            <tr>
                              <td>'.$d["bookingid"].'</td>
                              <td>'.$d["cname"].'</td>
                              <td>'.$d["phone"].'</td>
                              <td>'.$d["sbname"].'</td>
                              <td>'.$d["dsbname"].'</td>
                              <td>'.$d["ptime"].'</td>
                              <td id="'.$d["bookingid"].'" class="td" >'.$d["bookingstatus"].'</td>
                              <td><input type="submit" id="'.$d["bookingid"].'" value="Assign" class="button" /></td>
                            </tr>
                            </table>';
                            
                        }
                    }else{
                        echo "cant get data<br>";
                    }
                    
                }else{
                    // echo "there are no results<br>";
                }
            }
           
        }
        
    }
        
        // $data =  mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }
?>