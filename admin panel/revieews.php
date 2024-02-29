<?php
include "shared/header.php";
require "shared/config.php";
?>


<div class="page-wrapper">
<div class="content container-fluid">
<div class="card-body p-0">
<h3 class="page-title">REVIEWS...</h3>
<div class="table-responsive">
<table class="datatable table table-borderless hover-table" id="data-table">
<thead class="thead-light">
<tr>
<th>Client</th>
<th>Lawyer</th>
<th>Reviews Tittle</th>
<th>Reviews</th>
</tr>
</thead>
<tbody>
<?php 
$review_query="SELECT * FROM lawyer_reviews join clients_reg on lawyer_reviews.r_client_id=clients_reg.c_id join lawyer_reg on lawyer_reg.l_id=lawyer_reviews.r_lawyer_id";
$reviews_run=mysqli_query($conn,$review_query);
while($rev_row=mysqli_fetch_array($reviews_run)){


?>
<tr>
<td>
<h2 class="table-avatar">
<a><img class="avatar avatar-img" src="data:<?php echo $rev_row['c_pic_type'];?>;base64,<?php echo base64_encode($rev_row['c_pic']);?>"></a>
<a ><span class="user-name">#<?php echo $rev_row['r_client_id'];?></span></a>
</h2>
</td>
<td>
<h2 class="table-avatar">
<!-- <a class="avatar-pos" href="profile.html"><img class="avatar avatar-img" src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a> -->
<a  class="desc-info"><span class="text-muted">#<?php echo $rev_row['r_lawyer_id'];?></span></a>
</h2>
</td>

<td class="desc-info"><?php echo $rev_row['review_title'];?></td>
<td  class="user-name"><?php echo $rev_row['review'];?></td></tr>
<?php
}
?>
</tbody>
</table>
</div>
</div>
</div>


<div class="modal fade contentmodal" id="deleteModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content doctor-profile">
<div class="modal-header border-bottom-0 justify-content-end">
<button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x-circle"></i></button>
</div>
<div class="modal-body">
<form action="https://doccure-html.dreamguystech.com/template/admin/ratings.html">
<div class="delete-wrap text-center">
<div class="del-icon"><i class="feather-x-circle"></i></div>
<h2>Sure you Want to delete</h2>
<p>“Rating”</p>
<div class="submit-section">
<button type="submit" class="btn btn-success me-2">Yes</button>
<a href="#" class="btn btn-danger" data-bs-dismiss="modal">No</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/ratings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2022 14:44:31 GMT -->
</html>