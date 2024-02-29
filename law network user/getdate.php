<?php
include "../admin panel/shared/config.php";
 $app = $_GET['app'];
$getapp= "SELECT * from appointments where lawyer_id= '$app'";
$rungetapp= mysqli_query($conn, $getapp);
while($row= mysqli_fetch_array($rungetapp)){
    $getdates=$row['b_date'];

    ?>

 <option value='<?php echo $row['b_date'] ?>'><?php echo $row['b_date'] ?></option>;
   
    <?php   
}
   
?>
