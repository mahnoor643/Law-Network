<?php
include "shared/header.php";
require "shared/config.php";
?>


<div class="page-wrapper">
<div class="content container-fluid">



<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header">
<div class="row align-items-center">
<div class="col">
<h5 class="card-title">CLIENTS...</h5>
</div>

</div>
<div class="card-body p-0">
<div class="table-responsive">
<table class="datatable table table-borderless hover-table" id="data-table">
<thead class="thead-light">

<tr>
<th>ID</th>
<th>Clients</th>
<th>Last Visit</th>
</tr>
</thead>
<tbody>
    <?php
    $client_query="SELECT * from clients_reg";
    $client_run=mysqli_query($conn,$client_query);
    while($row_client=mysqli_fetch_array($client_run)){ 
    ?>
<tr>
<td><?php echo $row_client['c_id'];?></td>
<td>
<h2 class="table-avatar">
<a href="#" data-bs-target="#patientlist" data-bs-toggle="modal"><img class="avatar avatar-img" src="data:<?php echo $row_client['c_pic_type'];?>;base64,<?php echo base64_encode($row_client['c_pic']);?>" alt="User Image"></a>
<a href="#" data-bs-target="#patientlist" data-bs-toggle="modal"><span class="user-name"><?php echo $row_client['c_name'];?></span></a>
</h2>
</td>
<td><span class="user-name">26 November 2022 </span><span class="d-block">12/20/2022</span></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>

</div>


<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/patient-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2022 14:44:31 GMT -->
</html>