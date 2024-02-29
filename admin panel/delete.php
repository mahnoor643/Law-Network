<?php
include "shared/config.php";
$id_delect=$_GET['id'];
$delect="DELETE FROM `lawyer_reg` WHERE l_id = '$id_delect'";
$delect_run=mysqli_query($conn,$delect);
header("location:lawyers.php");
?>