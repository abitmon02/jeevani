<?php
include('../config.php');
$y=$_GET['aa'];

$sql="update tbl_leave  set status='2' where lv_id='$y'";
 
mysqli_query($con,$sql);
 

header('location:manage_drleave.php');
?>

