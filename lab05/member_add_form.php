<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Posting Form</h1>
    <form action="member_add.php" method="POST">
    <table width="600">
        <tr>
        <td>Member First Name: <input type="text"  name="memberFirstName"></td>
        </tr>
        <tr><td>Member Last Name: <input type="text" name="memberLastName"></td></tr>
        <tr>
        <td>Gender: <input type="text" name ="gender" ></td>
        </tr>
        <tr>
        <td>Email: <input type="text" name="email"></td>
        </tr>
        <tr>
        <td>Phone: <input type="text" name="phone"></td>
        </tr>
        <tr>
            <td width="100"><input type="submit" value="Post"></td>
            <td width="100"><input type="reset" value="Reset"></td>
        </tr>
    </table>
    
</body>
</html>