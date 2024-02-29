<?php
include "shared/header.php";
require "shared/config.php";

$conn=mysqli_connect('localhost','root','','lawyer_web');


if(isset($_POST['submit'])){

$blog_name = $_POST['lawyer_name'];  
$blog_tittle=$_POST['tittle'];
$blog=$_POST['blog'];

$folder="blogimages/";

// for image

$imgsize=$_FILES['img']['size'];
$imgname=$_FILES['img']['name'];
$imgtmpname=$_FILES['img']['tmp_name'];
$img_type=$_FILES['img']['type'];
$imgerror=$_FILES['img']['error'];


$allowedextension=array('jpg','jpeg','jfif','gif','png');
$ext=explode('.',$imgname);
$img_ext=strtolower(end($ext));


if(in_array($img_ext,$allowedextension)===false){
  $error[]= "This extension isn't allowed";
}
if(empty($error)==true){
  $add_img=addslashes(file_get_contents($imgtmpname));
  move_uploaded_file($imgtmpname,$folder.$imgname);
}

// end
$sql="INSERT INTO blog(blog_tittle,b_lawyer_name,blog_here,blog_image,blog_image_type) VALUE ('$blog_tittle','$blog_name','$blog','$add_img','$img_type')";
$query1=mysqli_query($conn,$sql);
if(!$query1){
  echo "it's not working";
}else echo "inserted";
}


?>
<form  method="post" enctype="multipart/form-data">
<div class="page-wrapper">
<div class="content container-fluid">

<div class="row">
<div class="col-md-12">
<h5 class="mb-3">Add Blog</h5>
<div class="row">
<div class="col-md-6">
<div class="form-group form-focus">
  
<input type="text" name="lawyer_name" class="form-control floating">
 <label class="focus-label"> Lawyer Name<span class="text-danger">*</span></label>
</div>
<div class="form-group form-focus">
  
<input type="text" name="tittle" class="form-control floating">
 <label class="focus-label">Blog Title <span class="text-danger">*</span></label>
</div>
<div class="form-group form-focus">
<textarea rows="4" name="blog" class="form-control bg-grey floating"></textarea>
<label class="focus-label">Write Blog Here ...  <span class="text-danger">*</span></label>
</div>
<div class="form-group">
<div class="change-photo-btn  bg-grey">
<div>
<i class="feather-upload"></i>
<p>Upload File</p>
</div>
<input type="file" name="img" class="upload">
</div>
</div>
<div id="videoId" style="display: none">
<div class="form-group form-focus">
<input type="text" class="form-control floating">
<label class="focus-label">Video ID <span class="text-danger">*</span></label>
</div>
</div>
<button type="submit" name="submit" class="btn btn-primary save-btn">Submit</button>
</div>
</div>
</div>
</div>

</div>
</div>

</div>
</form>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/add-blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2022 14:44:39 GMT -->
</html>

