<?php
include "shared/header.php";
require "shared/config.php";
?>

<div class="page-wrapper">
<div class="content container-fluid">

<div class="row">
<div class="col-md-9">
</div>
<div class="col-md-3 text-md-end">
<a href="add-blog.php" class="btn btn-primary btn-blog mb-3">Add Blog</a>
</div>
</div>

<?php
$query="select * from blog";
$result1=mysqli_query($conn,$query);
while($row1=mysqli_fetch_array($result1)){


?>

<div class="col-md-6 col-xl-4  col-sm-12 d-flex">
<div class="blog grid-blog">
<div class="blog-image">
<form method="post" enctype="multipart/form-data">  
<a ><img src="data:<?php echo $row1['blog_image_type'];?>;base64,<?php echo base64_encode($row1['blog_image']);?>"></a>
</form>  
</div>
<div class="blog-content">
<ul class="entry-meta meta-item">
<li>

<div class="post-author">
<a href="profile.html">
<span>
<span class="post-title"><?php echo $row1['b_lawyer_name']; ?></span>
</span>
</a>
</div>
</li>
</ul>
<h3 class="blog-title"><a href="blog-details.html"><?php echo$row1['blog_tittle'];?></a></h3>
<p><?php echo$row1['blog_here'];?></p>

</div>


</div>

</div>
<?php
}
?>
</div>
<!-- kuch bhi -->

</div>


</div>

</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/active-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2022 14:44:38 GMT -->
</html>