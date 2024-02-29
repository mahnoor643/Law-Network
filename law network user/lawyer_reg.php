<?php
include "../admin panel/shared/config.php";

// error_reporting(0);


if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $l_email=$_POST['email'];
    $degree=$_POST['degree'];
    $uni=$_POST['uni'];
    $expertise=$_POST['expertise'];
    $case_won=$_POST['case_won'];
    $case_lost=$_POST['case_lost'];
    $experience=$_POST['experience'];
    $img_tmp=$_FILES['img']['tmp_name'];
    $img_name=$_FILES['img']['name'];
    $img_type=$_FILES['img']['type'];
    $target_folder="assets/images/lawyer profile/";
    
    $allowed_ext=array('png','jpeg','jpg','gif','jfif');
    $ext=explode('.',$img_name);
    $img_ext=strtolower(end($ext));
    if(in_array($img_ext,$allowed_ext)==false){
       $error[]="not required extention";
    }
    if(empty($error)==true){
       $add_img=addslashes(file_get_contents($img_tmp));
       move_uploaded_file($img_tmp,$target_folder.$img_name);
    }
    $num=$_POST['number'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    $details=addslashes($_POST['details']);
    $str=$_POST['pasword'];
 
    // it's to set random password
    // $str="abcdefghijklmnopqrstuvwxyz0123456789";
    // $str=str_shuffle($str);
    // $str=substr($str,0,6);
 
    $insert="insert into lawyer_reg(l_name , l_email , pass , l_pic , address , city , l_num , degree , uni_clg , expertise , l_status , details, l_pic_type, case_won , case_lost , experience)
     values('$name','$l_email','$str','$add_img','$address','$city','$num','$degree','$uni','$expertise',1,'$details','$img_type','$case_won','$case_lost','$experience')";
    $insert_run=mysqli_query($conn,$insert);
    if(!$insert_run){
     echo "not  working";
    }else {echo "<script>
        alert('Your request is submitted, wait for confirmation mail');
        window.location.href = 'index.php';
    </script>";}
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attorney's Registration - Law Network</title>
    <link rel="icon" href="assets/images/law short logo.png" type="image/gif" sizes="20x20">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');

*{
    padding:0;
    margin:0;
}
.container{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background-color:#eee;
}
.container .card{
    height:530px;
    width:800px;
    background-color:#fff;
    position:relative;
    box-shadow:0 15px 30px rgba(0,0,0,0.1);
    font-family: 'Poppins', sans-serif;
    border-radius:20px;
}
.container .card .form{
    width:100%;
    height:100%;
    
    display:flex;
}
.container .card .left-side{
    width:35%;
    background-color:#333;
    height:100%;
 border-top-left-radius:20px;
 border-bottom-left-radius:20px;
  padding:20px 30px;
  box-sizing:border-box;

}
/* title color */

.section-title1 h1{
    /* font-size: 3rem;
    font-weight: 700; */
    color: #DEA057;
    background: -webkit-linear-gradient(40deg, #202020 0%, #DEA054 80%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 15px;
    margin-top: -7px;
    display: inline-block;}

/*left-side-start*/
.left-heading{
    color:#fff;
   
}
.steps-content{
    margin-top:30px;
    color:#fff;
}
.steps-content p{
    font-size:12px;
    margin-top:15px;
}
.progress-bar{
    list-style:none;
    /*color:#fff;*/
    margin-top:30px;
    font-size:13px;
    font-weight:700;
    counter-reset:container 0;
}
.progress-bar li{
       position:relative;
       margin-left:40px;
       margin-top:50px;
       counter-increment:container 1;
      color:#b69d74;
}
.progress-bar li::before{
    content:counter(container);
    line-height:25px;
    text-align:center;
    position:absolute;
    height:25px;
    width:25px;
    border:1px solid #b69d74;
    border-radius:50%;
    left:-40px;
    top:-5px;
    z-index:10;
    background-color:#333;

     
}


.progress-bar li::after{
    content: '';
    position: absolute;
    height: 90px;
    width: 2px;
    background-color: #b69d74;
    z-index: 1;
    left: -27px;
    top: -70px;
}


.progress-bar li.active::after{
    background-color: #fff;

}

.progress-bar li:first-child:after{
  display:none;  
}

.progress-bar li.active::before{
    color:#fff;
      border:1px solid #fff;
}
.progress-bar li.active{
    color:#fff;
}
.d-none{
   display:none;   
}


/*left-side-end*/
.container .card .right-side{
    width:65%;
    background-color:#fff;
    height:100%;
  border-radius:20px;
}
/*right-side-start*/
.main{
    display:none;
}
.active{
    display:block;
}
.main{
    padding:40px;
}
.main small{
    display:flex;
    justify-content:center;
    align-items:center;
    margin-top:2px;
    height:30px;
    width:30px;
    background-color:#ccc;
    border-radius:50%;
    color:yellow;
    font-size:19px;
}
.text{
    margin-top:20px;
}
.congrats{
    text-align:center;
}
.text p{
    margin-top:10px;
    font-size:13px;
    font-weight:700;
    color:#cbced4;
}
.input-text{
    margin:30px 0;
     display:flex;
    gap:20px;
}

.input-text .input-div{
    width:100%;
    position:relative;
    
}



input[type="text"]{
    width:100%;
    height:40px;
    border:none;
    outline:0;
    border-radius:5px;
    border:1px solid #cbced4;
    gap:20px;
    box-sizing:border-box;
    padding:0px 10px;
}
input[type="email"] {
    width: 100%;
    height: 40px;
    border: none;
    outline: 0;
    border-radius: 5px;
    border: 1px solid #cbced4;
    gap: 20px;
    box-sizing: border-box;
    padding: 0px 10px;
}
input[type="password"] {
    width: 100%;
    height: 40px;
    border: none;
    outline: 0;
    border-radius: 5px;
    border: 1px solid #cbced4;
    gap: 20px;
    box-sizing: border-box;
    padding: 0px 10px;
}
input[type="number"] {
    width: 100%;
    height: 40px;
    border: none;
    outline: 0;
    border-radius: 5px;
    border: 1px solid #cbced4;
    gap: 20px;
    box-sizing: border-box;
    padding: 0px 10px;
}
select{
    width:100%;
    height:40px;
    border:none;
    outline:0;
    border-radius:5px;
    border:1px solid #cbced4;
    gap:20px;
    box-sizing:border-box;
    padding:0px 10px;
}
.input-text .input-div span{
    position:absolute;
    top:10px;
    left:10px;
    font-size:14px;
    transition:all 0.5s;
}
.input-div input:focus ~ span,.input-div input:valid ~ span  {
    top:-15px;
    left:6px;
    font-size:10px;
    font-weight:600; 
}

.input-div span{
    top:-15px;
    left:6px;
    font-size:10px;
}
.buttons button{
    height:40px;
    width:100px;
    border:none;
    border-radius:5px;
    background-color:#b69d74;
    font-size:12px;
    color:#fff;
    cursor:pointer;
}
.button_space{
    display:flex;
    gap:20px;
    
}
.button_space button:nth-child(1){
    background-color:#fff;
    color:#000;
    border:1px solid#000;
}
.user_card{
    margin-top:20px;
    margin-bottom:40px;
    height:100px;
    width:100%;
    border:1px solid #c7d3d9;
    border-radius:10px;
    display:flex;
    overflow:hidden;
    position:relative;
    box-sizing:border-box;
}
.user_card span{
    height:80px;
    width:100%;
    background-color:#dfeeff;
}
.circle{
    position:absolute;
    top:40px;
    left:60px;
}
.circle span{
    height:70px;
    width:70px;
    background-color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
    border:2px solid #fff;
    border-radius:50%;
}
.circle span img{
    width:100%;
    height:100%;
    border-radius:50%;
    object-fit:cover;
}
.social{
    display:flex;
    position:absolute;
    top:100px;
    right:10px;
}
.social span{
    height:30px;
    width:30px;
    border-radius:7px;
    background-color:#fff;
    border:1px solid #cbd6dc;
    display:flex;
    justify-content:center;
    align-items:center;
    margin-left:10px;
    color:#cbd6dc;

}
.social span i{
        cursor:pointer;
}
.heart{
    color:red !important;
}
.share{
        color:red !important;
}
.user_name{
    position:absolute;
    top:110px;
    margin:10px;
    padding:0 30px;
    display:flex;
    flex-direction:column;
    width:100%;
    
} 
.user_name h3{
    color:#4c5b68;
}
.detail{
    /*margin-top:10px;*/
   display:flex;
   justify-content:space-between;
   margin-right:50px;
}
.detail p{
    font-size:12px;
    font-weight:700;

}
.detail p a{
    text-decoration:none;
    color:blue;
}






.checkmark__circle {
  stroke-dasharray: 166;
  stroke-dashoffset: 166;
  stroke-width: 2;
  stroke-miterlimit: 10;
  stroke: #7ac142;
  fill: none;
  animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}

.checkmark {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  display: block;
  stroke-width: 2;
  stroke: #fff;
  stroke-miterlimit: 10;
  margin: 10% auto;
  box-shadow: inset 0px 0px 0px #7ac142;
  animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
}

.checkmark__check {
  transform-origin: 50% 50%;
  stroke-dasharray: 48;
  stroke-dashoffset: 48;
  animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
}

@keyframes stroke {
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes scale {
  0%, 100% {
    transform: none;
  }
  50% {
    transform: scale3d(1.1, 1.1, 1);
  }
}
@keyframes fill {
  100% {
    box-shadow: inset 0px 0px 0px 30px #7ac142;
  }
}










.warning{
    border:1px solid red !important;
}


/*right-side-end*/
@media (max-width:750px) {
    .container{
        height:scroll;
       
        
    }
    .container .card {
        max-width: 350px;
        height:auto !important;
        margin:30px 0;
    }
    .container .card .right-side {
     width:100%;
            
    }
     .input-text{
         display:block;
     }
     
     .input-text .input-div{
  margin-top:20px;
    
}

    .container .card .left-side {
           
     display: none;
    }
}
.b-style{
    background-color: #b69d74;
    padding: 15px;
    color: white;
    font-size: large;
    border-radius: 50px;
    margin: 20px;
    border: none;
    z-index: 3;
}
    </style>
</head>
<body>
<!-- header end -->

<div class="container">
        <div class="card">
            
            <div class="form">
                <div class="left-side">
                    <div class="left-heading">
                        <h3>indeed</h3>
                    </div>
                    <div class="steps-content">
                        <h3>Step <span class="step-number">1</span></h3>
                        <p class="step-number-content active">Enter your personal information to get closer to Law Network.</p>
                        <p class="step-number-content d-none">Get to know better by adding your diploma,certificate and education life.</p>
                        <p class="step-number-content d-none">Help Law Network get to know you better by telling then about your past experiences.</p>
                        <p class="step-number-content d-none">Add your profile picture.</p>
                    </div>
                    <ul class="progress-bar">
                        <li class="active">Personal Information</li>
                        <li>Education</li>
                        <li>Work Experience</li>
                        <li>User Photo</li>
                    </ul>  
                </div>

                <!-- it's lawyer registeration form -->

                <div class="right-side">
                <form  method="post" enctype="multipart/form-data">
                    <div class="main active">
                        <small><i class="fa fa-smile-o"></i></small>
                        <div class="text section-title1">
                            <h1>Your Personal Information</h1>
                            <p>Enter your personal information to get closer to us.</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input name="name" type="text" required require id="user_name">
                                <span>Full Name</span>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input name="number" type="number" require required >
                                <span>Phone number</span>
                            </div>
                            <div class="input-div">
                                <input name="email" require type="email" required >
                                <span>E-mail Address</span>
                            </div>
                           
                        </div>
                        <div class="input-text"> 
                            <div class="input-div">
                                <input name="pasword" require type="password" required >
                                <span>Password</span>
                            </div>
                            <div class="input-div">
                                <input name="address" type="text" required >
                                <span>Address</span>
                            </div>
                            <div class="input-div">
                                
                                <select  name="city" required>
                                    <?php
                                    $city="select * from city";
                                    $city_run=mysqli_query($conn,$city);
                                    while($fetch_city=mysqli_fetch_array($city_run)){
                                    ?>
                                        <option value="<?php echo $fetch_city['city']; ?>"><?php echo $fetch_city['city']; ?></option>
                                          <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="buttons">
                            <button class="next_button">Next Step</button>
                        </div>
                    </div>
                    <div class="main">
                        <small><i class="fa fa-smile-o"></i></small>
                        <div class="text section-title1">
                            <h1>Education</h1>
                            <p>Inform Law Network about your education life.</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <label style="font-size: small;">degree</label>
                                <select  name="degree" required >
                                    <?php
                                    $degree="select * from l_degree";
                                    $degree_run=mysqli_query($conn,$degree);
                                    while($fetch_deg=mysqli_fetch_array($degree_run)){
                                    ?>
                                        <option value="<?php echo $fetch_deg['degree']; ?>"><?php echo $fetch_deg['degree']; ?></option>
                                          <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input name="uni" type="text" required >
                                <span>College/University name</span>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <label style="font-size: small;">Expertise</label>
                                <select name="expertise" require>
                                    <?php
                                    $exp="select * from l_expertise";
                                    $expertise_run=mysqli_query($conn,$exp);
                                    while($fetch_exp=mysqli_fetch_array($expertise_run)){
                                    ?>
                                        <option value="<?php echo $fetch_exp['l_expertise']; ?>"><?php echo $fetch_exp['l_expertise']; ?></option>
                                          <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="next_button">Next Step</button>
                        </div>
                    </div>
                    <div class="main">
                        <small><i class="fa fa-smile-o"></i></small>
                        <div class="text section-title1">
                            <h1>Work Experiences</h1>
                            <p>Can you talk about your past work experience?</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input name="experience" require type="text" required >
                                <span>Experience</span>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input name="case_won" require type="number" required>
                                <span>Case won</span>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input name="case_lost" require type="number" required>
                                <span>Case lost</span>
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="next_button">Next Step</button>
                        </div>
                    </div>
                    
                    
                    
                    <div class="main">
                        <small><i class="fa fa-smile-o"></i></small>
                        <div class="text section-title1">
                            <h1>Attorney's Photo</h1>
                            <p>Upload your profile picture and share yourself.</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input name="details" type="text" require required style="height:80px;">
                                <span>Something more about yourself</span>
                            </div>
                        </div>
                        <div class="user_card">
                            
                            <div class="mb-3 circle">
                                <label for="formFile" class="form-label">Upload pic for your profile</label>
                                <input class="form-control" require required name="img"  type="file" id="formFile">
                              </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button name="submit" type="submit" class="submit_button">Submit</button>
                        </div>
                    </div></form>
                     <div class="main">
                         <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                             <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                         
                        <div class="text congrats">
                            <h2>Congratulations!</h2>
                            <p>Thanks Mr./Mrs. <span class="shown_name"></span> your information have been submitted successfully for the future reference we will contact you soon.</p>
                        <a style="text-decoration:none;" href="index.php"><input class="b-style" type="button" value="Back to Home"></a>
                        </div>
                    </div>
                                    </form>
    
                </div>

               

            </div>
        </div>
    </div>
    </body>
                                    
<script>
    var next_click=document.querySelectorAll(".next_button");
var main_form=document.querySelectorAll(".main");
var step_list = document.querySelectorAll(".progress-bar li");
var num = document.querySelector(".step-number");
let formnumber=0;

next_click.forEach(function(next_click_form){
    next_click_form.addEventListener('click',function(){
        if(!validateform()){
            return false
        }
       formnumber++;
       updateform();
       progress_forward();
       contentchange();
    });
}); 

var back_click=document.querySelectorAll(".back_button");
back_click.forEach(function(back_click_form){
    back_click_form.addEventListener('click',function(){
       formnumber--;
       updateform();
       progress_backward();
       contentchange();
    });
});

var username=document.querySelector("#user_name");
var shownname=document.querySelector(".shown_name");
 

var submit_click=document.querySelectorAll(".submit_button");
submit_click.forEach(function(submit_click_form){
    submit_click_form.addEventListener('click',function(){
       shownname.innerHTML= username.value;
       formnumber++;
       updateform(); 
    });
});

var heart=document.querySelector(".fa-heart");
heart.addEventListener('click',function(){
   heart.classList.toggle('heart');
});


var share=document.querySelector(".fa-share-alt");
share.addEventListener('click',function(){
   share.classList.toggle('share');
});

 

function updateform(){
    main_form.forEach(function(mainform_number){
        mainform_number.classList.remove('active');
    })
    main_form[formnumber].classList.add('active');
} 
 
function progress_forward(){

    num.innerHTML = formnumber+1;
    step_list[formnumber].classList.add('active');
}  

function progress_backward(){
    var form_num = formnumber+1;
    step_list[form_num].classList.remove('active');
    num.innerHTML = form_num;
} 
 
var step_num_content=document.querySelectorAll(".step-number-content");

 function contentchange(){
     step_num_content.forEach(function(content){
        content.classList.remove('active'); 
        content.classList.add('d-none');
     }); 
     step_num_content[formnumber].classList.add('active');
 } 
 
 
function validateform(){
    validate=true;
    var validate_inputs=document.querySelectorAll(".main.active input");
    validate_inputs.forEach(function(vaildate_input){
        vaildate_input.classList.remove('warning');
        if(vaildate_input.hasAttribute('require')){
            if(vaildate_input.value.length==0){
                validate=false;
                vaildate_input.classList.add('warning');
            }
        }
    });
    return validate;
    
}
</script>
</html>



