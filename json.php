<?php

include 'db.php';
$sql="SELECT* FROM clients";
$result=mysqli_query($conn,$sql);
$json_array=array();
while($row= mysqli_fetch_assoc($result)){
    $json_array[]=$row;

}
header('content-type: application/json');
echo json_encode($json_array);
?>