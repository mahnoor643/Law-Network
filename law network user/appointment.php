<?php
error_reporting(0);

session_start();
$email=$_SESSION['clients_email'];
$pass=$_SESSION['clients_pass'];
$id=$_SESSION['clients_id'];
if(isset($email)&& isset($pass)){
 }
 else {
  header('location:../law network user/clients_login.php');
 }
include "../admin panel/shared/config.php";


$select="select * from clients_reg where c_id='$id'";
$select_run=mysqli_query($conn,$select);
$select_fetch=mysqli_fetch_array($select_run);

// php for showing lawyers according their expertise

if(isset($_POST['law'])){
    $trun="truncate law_expert";
    $trun_run=mysqli_query($conn,$trun);
    $expertise = $_POST['expertise'];
    $law_exp="insert into law_expert(c_id , expertise) value('$id','$expertise')";
    $law_exp_run=mysqli_query($conn,$law_exp);
}

if (isset($_POST['submit'])) {
  $lawyer=$_POST['lawyer'];
  $number=$_POST['number'];
  $city=$_POST['city'];
  $address=$_POST['address'];
  $date=date('Y-m-d', strtotime($_POST['date']));
  $ques_title=$_POST['ques_title'];
  $question=$_POST['question'];

 try{ $appoint="insert into appointments(cl_num , cl_que , cl_ques_title , c_id_FK ,  cl_city , cl_address ,
   b_date , lawyer_id , status) value('$number','$question','$ques_title','$id','$city','$address','$date','$lawyer','waiting')";
  $appoint_run =mysqli_query($conn,$appoint);}
  catch (mysqli_sql_exception $e) { 
    var_dump($e);
    exit; 
 } 
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Appointment - Law Network</title>
  <style>
    @media (min-width: 1025px) {
      .h-custom {
        height: 100vh !important;
      }
    }
  </style>
<?php
include '_shared/_header.php';
?>

<!-- header end -->


<div class="content margin-set">
<div class="container-fluid justify-content-center d-flex">
<div class="row">
<div class="col-md-10 col-lg-12  theiaStickySidebar">
   
<h4>
  First select your matter related expert, so you'll be able to find your required one Attorney.
</h4><br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-c margin-adjust" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Category
</button>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <form method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Category to find relevant Attorney</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


      <div class="modal-body">

      <label class="form-label select-label">Choose Expertise</label>

    <select required name="expertise" class="select form-control">
    <?php
                                    $exp="select * from l_expertise";
                                    $expertise_run=mysqli_query($conn,$exp);
                                    while($fetch_exp=mysqli_fetch_array($expertise_run)){
                                    ?>
                                        <option value="<?php echo $fetch_exp['l_expertise']; ?>"><?php echo $fetch_exp['l_expertise']; ?></option>
                                          <?php } ?>
    </select>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="law" class="btn btn-c">submit</button>
      </div>
    </div>

    </form>

  </div>
</div>

<!-- Modal end -->

<form method="post">

<div class="row">
  <div class="col-6">
    <label class="form-label select-label">Choose Attorney</label>

    <select required name="lawyer" id="lawyer"   class="select form-control lawyer">
      <?php
      $law_e="select * from lawyer_reg join law_expert on lawyer_reg.expertise=law_expert.expertise where c_id='$id'";
      $law_e_run=mysqli_query($conn,$law_e);
      while($fet_law_e=mysqli_fetch_array($law_e_run)){
      ?>
      <option  value="<?php echo $fet_law_e['l_id']; ?>"><?php echo $fet_law_e['l_name']; ?></option>
                                          <?php } ?>
    </select>

  </div>
</div><br>

<div class="row">
 
  <div class="col-6">

    <div class="form-outline">
      <label class="form-label" for="lastName">Your city</label>
      <input type="text" required name="city" id="city" class="form-control form-control-lg" />
    </div>

  </div>
  <div class="col-6">

    <div class="form-outline">
      <label class="form-label" for="lastName">Your Address</label>
      <input type="text" required name="address" id="address" class="form-control form-control-lg" />
    </div>

  </div>
</div>

<div class="row">
  <div class="col-6">

<div class="form-outline">
  <label class="form-label" for="firstName">Your contact #</label>
  <input type="number" name="number" required id="contact"
    class="form-control form-control-lg" />
</div>

</div>
  <div class="col-6">

    <div class="form-outline datepicker">
      <label for="birthdayDate" class="form-label">Select date</label>
      <input type="text" required name="date" class="form-control form-control-lg"
        id="datepicker" />
    </div>
    <!-- <select name="lawyerdate" id="lawyerdate"></select> -->
    <!-- style="display:none;"  -->
  </div>
</div>

<div class="row">
  <div class="col-12 mb-4 pb-2">

    <div class="form-outline">
      <label class="form-label" for="emailAddress">Question title</label>
      <input type="text" required name="ques_title" id="emailAddress"
        class="form-control form-control-lg" />
    </div>

  </div>
</div>

<div class="row">
  <div class="col-12 mb-4 pb-2">

    <div class="form-outline">
      <label class="form-label" for="emailAddress">Briefly describe your question</label>
      <textarea type="text" required rows="4" name="question" id="emailAddress"
        class="form-control form-control-lg"></textarea>
    </div>

  </div>
</div>

<div class="mt-2 pt-2">
  <input class="btn btn-c" name="submit" type="submit" value="Submit" />
</div>

</form>
</div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function(){
  // console.log('ready hogai'); 

//   $(document).on('change',".lawyer", function(){   
// var app = $('.lawyer').val();   
//  console.log('lawyer agai' + app); 
//       $.ajax({ 
//  url:"getdate.php",
//  datatype:"json",
//   data:{
//         app:app
//       },
//       success:function(response){
//         console.log('date agai');
//         $("#lawyerdate").append(response);
var dateToday= new Date();

  // var array = [];
  //   var x = document.getElementById("lawyerdate");

  //   var i;
  //   for (i = 0; i < x.options.length; i++) {
  //       txt = x.options[i].value;
  //       array.push(txt)
  //   }

        $('#datepicker').datepicker({
          minDate: dateToday
            // beforeShowDay: function(date){
            //     var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            //     return [ array.indexOf(string) == -1 ]
            // }
            });

//         },
//  error:function(response){
//         console.log(response);
//       }
       });
//   });
// });
</script>
<!-- it's footer -->
<?php
include '_shared/_footer.php';
?>