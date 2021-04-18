<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Status Posting System</h1>
    <form action="poststatusprocess.php" method="POST">
    <table width="600">
        <tr>
        <td>Status Code (Required): <input type="text" maxlength= "5" size ="5" name="statuscode"></td>
        </tr>
        <tr><td>Status (Required): <input type="text" name="status"></td></tr>
        <tr>
        <td>Share: <input type="radio" name ="sex" value="Public">Public</td>
        <td><input type="radio" name="sex" value="Friends">Friends</td>
        <td><input type="radio" name="sex" value="Only me">Only me
        </td></tr>
        <tr>
            <td>Date: 
                <input type="text" name="Date" value="<?php
                $currentDateTime=date('d-m-Y');
                echo $currentDateTime; ?>">

                </td>
        </tr>
        <tr>
            <td>Permission Type:</td>
            <td width="240"><input type="checkbox" name="hobby[]" value="Allow Like">Allow Like</td>
            <td width="240"><input type="checkbox" name="hobby[]" value="Allow Comment">Allow Comment</td>
            <td width="240"><input type="checkbox" name="hobby[]" value="Allow Share">Allow Share</td>
        </tr>
        <tr>
            <td width="100"><input type="submit" value="Post"></td>
            <td width="100"><input type="reset" value="Reset"></td>
        </tr>
    </table>
    <a href="http://yxn9194.cmslamp14.aut.ac.nz/assign1/index.html" target="_black">Return to Homepage</a></br>
    
    </form>
</body>
</html>