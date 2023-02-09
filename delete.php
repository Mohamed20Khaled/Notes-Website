<?php
include "./db.php";
$id=$_GET["id"];
$DeleteQuery="DELETE FROM `notes` WHERE `sno`='$id' ";
$res=mysqli_query($con,$DeleteQuery);
header("location: ./index.php");
?>