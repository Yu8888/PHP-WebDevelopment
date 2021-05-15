<!--file data.php -->
<?php
$sql_host = "cmslamp14.aut.ac.nz";
$sql_user = "yxn9194";
$sql_pass = "mr.liu1009.";
$sql_db = "yxn9194";
$conn = mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
if ($conn->connect_error) {
    die("connection fail:" . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS assign2 (
			bookingNumber int(30) AUTO_INCREMENT PRIMARY KEY,
			cname VARCHAR(30) NOT NULL,
			phoneNumber int(20) NOT NULL,
			unitNumber int(20) NOT NULL,
			streetNumber int(20) NOT NULL,
			streetName VARCHAR(30) NOT NULL,
			suburb VARCHAR(30) NOT NULL,
			destinationSuburb VARCHAR(30) NOT NULL,
			pickUpDate VARCHAR(30) NOT NULL,
			pickUpTime VARCHAR(30) NOT NULL)";

if ($conn->query($sql) === TRUE) {
    echo "";
}
$sql = "INSERT INTO assign2 (username, userpassword, email) VALUES ('Dennis','1009l','Dennis@qq.com'),('Bob','1009l','Bob@qq.com')";
mysqli_query($conn, $sql);
// get name and password passed from client
$name = $_POST['name'];
$pwd = $_POST['pwd'];
$sql = 'SELECT * FROM assign2';
$retval = mysqli_query($conn, $sql);
// write back the password concatenated to end of the name
if (isset($_POST['name']) && isset($_POST['pwd'])) {
    if (!$retval) {
        die('Error: ' . mysqli_error($conn));
    }
    foreach ($retval as $data) {
        if ($data['username'] == $name && $data['userpassword'] == $pwd) {
            echo ($data['email']);
            return;
        }
        if ($data['username'] == $name && !($data['userpassword'] == $pwd)) {
            echo "Please input correct passord!";
            return;
        }
        if (!($data['username'] == $name) && !($data['userpassword'] == $pwd)) {

            echo "Please input correct username and password!";
            return;
        }
        if (!($data['username'] == $name) && ($data['userpassword'] == $pwd)) {

            echo "Sorry, the name is not in table!";
            return;
        }
    }
} else {
    echo "You didn't input value.";
}
?>