<?php
include "db.php";
if (isset($_GET["userid"])){
    $userid=$_GET["userid"];
    $sql="DELETE FROM  clients WHERE userid=$userid";
    $conn->query($sql);
}
header("location:/phpbootcamp1/index.php");
exit;


?>