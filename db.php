<?php
$servername="localhost";
$username="root";
$password ="";
$database="myshop";
//create connection
$conn=new mysqli($servername,$username,$password,$database);
//check connection
if($conn ->connect_error){
    die("connection failed:" .$conn->connect_error);
}
//read all row from database table
// $sql="SELECT * FROM clients";
// $result=$conn->query($sql);

// if (!$result){
//     die("invalid query:".$conn->error);
// }
// //read from each row
// while($row=$result->fetch_assoc()){
//     echo"    
//     <tr>
//     <td>$row[userid]</td>
//     <td>$row[firstname]</td>
//     <td>$row[surname]</td>
//     <td>$row[username]</td>
//     <td>$row[gender]</td>
//     <td>$row[email]</td>
//     <td>$row[phonenumber]</td>
//     <td>$row[password]</td>
//     <td>$row[confirm_password]</td>
//     <td>
//         <a class='btn btn-primary btn-sm' href='/phpbootcamp1/edit.php?userid=$row[userid]'>edit</a>
//         <a class='btn btn-primary btn-sm' href='/phpbootcamp1/delete.php?userid=$row[userid]'>delete</a>
//     </td>
// </tr>
// ";
// }
?>