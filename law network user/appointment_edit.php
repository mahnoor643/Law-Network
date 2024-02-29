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
$b_id=$_GET['id'];
include "../admin panel/shared/config.php";


$select="select * from clients_reg where c_id='$id'";
$select_run=mysqli_query($conn,$select);
$select_fetch=mysqli_fetch_array($select_run);

$select_bid="select * from appointments join lawyer_reg on lawyer_reg.l_id=appointments.lawyer_id where b_id='$b_id'";
$select_bid_run=mysqli_query($conn,$select_bid);
$select_bid_fetch=mysqli_fetch_array($select_bid_run);
$status=$select_bid_fetch['status'];

if($status=='waiting'){
    if (isset($_POST['submit'])) {
        $lawyer=$_POST['lawyer'];
        $number=$_POST['number'];
        $city=$_POST['city'];
        $address=$_POST['address'];
        $date=date('Y-m-d', strtotime($_POST['date']));
        $ques_title=$_POST['ques_title'];
        $question=$_POST['question'];
        $message="Your appointment is not edited";
        if(empty($question)==true){
          try{ $appoint="update appointments set cl_num='$number' , cl_ques_title='$ques_title' ,
            c_id_FK='$id' ,  cl_city='$city' , cl_address='$address' ,
             b_date='$date' , lawyer_id='$lawyer' , status='waiting' where b_id='$b_id'";
           $appoint_run =mysqli_query($conn,$appoint);}
           catch (mysqli_sql_exception $e) { 
             var_dump($e);
             exit; 
          } 
        }else{

       try{ $appoint="update appointments set cl_num='$number' , cl_que='$question' , cl_ques_title='$ques_title' ,
         c_id_FK='$id' ,  cl_city='$city' , cl_address='$address' ,
          b_date='$date' , lawyer_id='$lawyer' , status='waiting' where b_id='$b_id'";
        $appoint_run =mysqli_query($conn,$appoint);}
        catch (mysqli_sql_exception $e) { 
          var_dump($e);
          exit; 
       } 
      }
    if(!$appoint_run){
      echo "<script type='text/javascript'>alert('$message');</script>";
    }else {
      echo "<script>
        window.location.href = 'my_appointment.php';
        alert('Appointment edited successfully');
  </script>";
  }}
    

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
      
      <option value="<?php echo $select_bid_fetch['lawyer_id']; ?>"><?php echo $select_bid_fetch['l_name']; ?></option>
                                        
    </select>

  </div>
  <div class="col-6">
    <label class="form-label select-label">Expertise</label>

    <select required class="select form-control">
      <option value="<?php echo $select_bid_fetch['expertise']; ?>"><?php echo $select_bid_fetch['expertise']; ?></option>                          
    </select>

  </div>
</div>

<div class="row">
 
  <div class="col-6">

    <div class="form-outline">
      <label class="form-label" for="lastName">Your city</label>
      <input type="text" required name="city" value="<?php echo $select_bid_fetch['cl_city']; ?>" id="lastName" class="form-control form-control-lg" />
    </div>

  </div>
  <div class="col-6">

    <div class="form-outline">
      <label class="form-label" for="lastName">Your Address</label>
      <input type="text" required name="address" value="<?php echo $select_bid_fetch['cl_address']; ?>" id="lastName" class="form-control form-control-lg" />
    </div>

  </div>
</div><br>

<div class="row">
<div class="col-6">

<div class="form-outline">
  <label class="form-label" for="firstName">Your contact #</label>
  <input type="number" name="number" required id="firstName" value="<?php echo $select_bid_fetch['cl_num']; ?>"
    class="form-control form-control-lg" />
</div>

</div>
  <div class="col-6">

    <div class="form-outline datepicker">
      <label for="birthdayDate" class="form-label">Select date</label>
      <input type="text" required name="date" value="<?php echo $select_bid_fetch['b_date']; ?>" class="form-control form-control-lg"
        id="datepicker" />
    </div>

  </div>
</div><br>

<div class="row">
  <div class="col-12 mb-4 pb-2">

    <div class="form-outline">
      <label class="form-label" for="emailAddress">Question title</label>
      <input type="text" required name="ques_title" value="<?php echo $select_bid_fetch['cl_ques_title']; ?>" id="emailAddress"
        class="form-control form-control-lg" />
    </div>

  </div>
</div>

<div class="row">
  <div class="col-12 mb-4 pb-2">

    <div class="form-outline">
      <label class="form-label" for="emailAddress">Briefly describe your question</label>
      <textarea type="text" rows="4" name="question" value="<?php echo $select_bid_fetch['cl_que']; ?>" id="emailAddress"
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


<?php
}else{
  echo "<script>
  alert('Appointment ".$status.", You can\' t edit it now.');
  window.location.href = 'my_appointment.php';
</script>";
}

?>