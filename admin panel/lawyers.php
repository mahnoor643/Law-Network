
<?php
include "shared/header.php";

require "shared/config.php";


?>
<style>
    	/* search  */
	.top-nav-here .form-control {
		border-color:transparent !important;
		background: transparent;
		border-radius: .5rem;
		color: #7E84A3;
		height: 40px;
		padding: 10px 10px 10px 38px;
	}
    .top-nav-here:hover
    {
        background-color: black;
        border-radius: .9rem;
        transition: 0.9s;
    }

</style>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col-sm-12">
<h3 class="page-title">LAWYERS</h3>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped">
<div class="top-nav-here">
				<div class="main">
					<form class="search" method="post">
						
						<!-- <div class="s-icon"><i class="fas fa-search"></i></div> -->
						<?php
						if(isset($_POST['search'])){
							$results=$_POST['Email'];
                          require "search.php";
						  if (is_Countable($results)>0){
							foreach ($results as $r){
								echo "<div>" . $r['Attorney'] . " -" .$r['Email'] . "</div>";
							}
						  }else { echo "<div>No Result found</div>";}
						
					
						} 

						?>
						<!-- <input type="text" name="search" class="form-control" placeholder=" Search here..." href="search.php" /> -->
                    </form>    
                
                </div>        
</div>                        

   
<thead>
<tr>
<th>Attorney's pic</th>
<th>Attorney</th>
<th >Email</th>
<th>City</th>
<th>Degree</th>
<th>Expertise</th>
<th>Experience</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
	
<tr>
<?php 

$sql="select * from lawyer_reg";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
?>
<td> <img src="data:<?php echo $row['l_pic_type'];?>;base64,<?php echo base64_encode($row['l_pic']);?>" alt="" style="width:75px; height: 50px;" > </td>
<td><?php echo $row['l_name'];?></td>
<td><?php echo $row['l_email'];?></td>
<td><?php echo $row['city'];?></td>
<td><?php echo $row['degree'];?></td>
<td><?php echo $row['expertise'];?></td>
<td><?php echo $row['experience'];?></td>

<td><?php 
$id=$row['l_id'];
$st=$row['l_status'];
if($st==1){
	echo "<a href='active.php?id=$id&status=$st'><button type='button' class='btn btn-rounded btn-success'>Active</button></a>";
}else  {
	echo "<a href='active.php?id=$id&status=$st'><button type='button' class='btn btn-rounded btn-danger'>Deactive</button></a>";
}





?></td>

<td  class="text-end">
<div class="actions">
<a class="text-danger"  href="delete.php?id=<?php echo $row['l_id']?>" >
<i class="feather-trash-2 me-1"></i> 
</a>

</div>
</td>

</tr>
<?php
}
?>


</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

</div>
</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2022 14:44:41 GMT -->
</html>