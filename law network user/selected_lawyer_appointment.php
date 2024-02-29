<?php
error_reporting(0);

session_start();
$email=$_SESSION['clients_email'];
$pass=$_SESSION['clients_pass'];
$id=$_SESSION['clients_id'];
$l_id=$_GET['id'];
if(isset($email)&& isset($pass)){
 }
 else {
  header('location:../law network user/clients_login.php');
 }
 include "../admin panel/shared/config.php";


$select="select * from clients_reg where c_id='$id'";
$select_run=mysqli_query($conn,$select);
$select_fetch=mysqli_fetch_array($select_run);

// header work end

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
   $message="Your appointment is not submitted";
   if(!$appoint_run){
    echo "<script type='text/javascript'>alert('$message');</script>";
   }else {
    echo "<script>
      window.location.href = 'my_appointment.php';
      alert('Appointment submitted successfully');
</script>";
}
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Appointment</title>
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
    
<form method="post">

<div class="row">
  <div class="col-6">
    <label class="form-label select-label">Your Attorney</label>

    <select required name="lawyer" class="select form-control">
      <?php
      $law_e="select * from lawyer_reg where l_id='$l_id'";
      $law_e_run=mysqli_query($conn,$law_e);
      $fet_law_e=mysqli_fetch_array($law_e_run);
      ?>
      <option value="<?php echo $fet_law_e['l_id']; ?>"><?php echo $fet_law_e['l_name']; ?></option>
                                        
    </select>

  </div>
  <div class="col-6">
    <label class="form-label select-label">Expertise</label>

    <select required class="select form-control">
      <option value="<?php echo $fet_law_e['expertise']; ?>"><?php echo $fet_law_e['expertise']; ?></option>                          
    </select>

  </div>
</div>

<div class="row">
 
  <div class="col-6">

    <div class="form-outline">
      <label class="form-label" for="lastName">Your city</label>
      <input type="text" required name="city" id="lastName" class="form-control form-control-lg" />
    </div>

  </div>
  <div class="col-6">

    <div class="form-outline">
      <label class="form-label" for="lastName">Your Address</label>
      <input type="text" required name="address" id="lastName" class="form-control form-control-lg" />
    </div>

  </div>
</div><br>

<div class="row">
 
<div class="col-6">

<div class="form-outline">
  <label class="form-label" for="firstName">Your contact #</label>
  <input type="number" name="number" required id="firstName"
    class="form-control form-control-lg" />
</div>

</div>
  <div class="col-6">

    <div class="form-outline datepicker">
      <label for="birthdayDate" class="form-label">Select date</label>
      <input type="text" required name="date" class="form-control form-control-lg"
        id="datepicker" />
    </div>

  </div>
</div><br>

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

<!-- it's footer -->
<?php
include '_shared/_footer.php';
?>