<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
<?php
include "db.php";
?>
</head>
<body>
    <div class="container my-5">
    <h2> List of clients</h2>
    <a class="btn btn-primary" href="create.php" role="botton">New Client</a>
     <br>
     <table class="table">
        <thead>
            <tr>
                <th>userid</th>
                <th>firstname</th>
                <th>surname</th>
                <th>username</th>
                <th>gender</th>
                <th>email</th>
                <th>phonenumber</th>
                <th>password</th>
                <th>confirm_password</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
    <?php
        $sql="SELECT * FROM clients";
        $result=$conn->query($sql);

        if (!$result){
        die("invalid query:".$conn->error);
        }
        //read from each row
        while($row=$result->fetch_assoc()){
        echo"    
        <tr>
        <td>$row[userid]</td>
        <td>$row[firstname]</td>
        <td>$row[surname]</td>
        <td>$row[username]</td>
        <td>$row[gender]</td>
        <td>$row[email]</td>
        <td>$row[phonenumber]</td>
        <td>$row[password]</td>
        <td>$row[confirm_password]</td>
        <td>
        <a class='btn btn-primary btn-sm' href='/phpbootcamp1/edit.php?userid=$row[userid]'>edit</a>
        <a class='btn btn-danger btn-sm' href='/phpbootcamp1/delete.php?userid=$row[userid]'>delete</a>
        </td>
        </tr>
        ";
        }

        ?>
        </tbody> 

</body>
</html>