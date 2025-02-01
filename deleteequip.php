<?php

require_once('connection.php');
$equipid=$_GET['id'];
$sql="DELETE from equipments where EQUIP_ID=$equipid";
$result=mysqli_query($con,$sql);

echo '<script>alert("EQUIPMENT DELETED SUCCESFULLY")</script>';
echo '<script> window.location.href = "adminvehicle.php";</script>';



?>