<?php 
include "../admin panel/shared/config.php";

error_reporting(0);

// it's for header switching if logined
session_start();
$email=$_SESSION['clients_email'];
$pass=$_SESSION['clients_pass'];
$id=$_SESSION['clients_id'];
$select="select * from clients_reg where c_id='$id'";
$select_run=mysqli_query($conn,$select);
$select_fetch=mysqli_fetch_array($select_run);
// end 

// it's to add msg
if(isset($_POST['sendmsg'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['number'];
    $msg=$_POST['msg'];

    $insert="insert into contactus(con_name,con_email,con_phone,con_msg,con_from)values('$name','$email','$phone','$msg','client')";
    $insert_run=mysqli_query($conn,$insert);

    $message="Your question is not inserted";
    if(!$insert_run){
        echo "<script type='text/javascript'>alert('$message');</script>";
    }else{
        echo "<script>
            alert('Mr/Ms ".$name.", Your form is inserted, We will get back to you soon through mail.');
            window.location.href = 'index.php';
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
    <title>
        Contactus - Law Network
    </title>
    <style>
        .review-button {
            padding: 3px;
            font-size: 12px;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .parallax {
            background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.6)), url('assets/images/law3.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            padding: 12.5rem 0px;
        }
    </style>
    <?php include '_shared/_header.php'; ?>

    <!-- it's label div -->
    <div class="parallax">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">
                        Contactus
                    </h2>
                    <nav aria-label="breadcrumb">
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-section pt-120">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-6 col-md-6">
                    <div class="address-area">
                        <div class="section-title2 mb-50">
                            <h2>Contact Us If You Have More Questions.</h2>
                        </div>
                        <ul class="address-list sibling3">
                            <li>
                                <div class="icon">
                                    <svg width="44" height="44" viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_153_65)">
                                            <path
                                                d="M22 0.125C13.519 0.125 6.61914 7.02485 6.61914 15.5059C6.61914 18.3713 7.41288 21.1677 8.91508 23.5938L21.1245 43.2691C21.3584 43.646 21.7704 43.875 22.2135 43.875C22.217 43.875 22.2203 43.875 22.2237 43.875C22.6707 43.8715 23.0836 43.6354 23.3132 43.2519L35.2114 23.386C36.6307 21.0112 37.3809 18.2863 37.3809 15.5059C37.3809 7.02485 30.481 0.125 22 0.125ZM33.0115 22.0699L22.1941 40.1311L11.0939 22.2432C9.84348 20.2239 9.16553 17.8942 9.16553 15.5059C9.16553 8.43835 14.9325 2.67139 22 2.67139C29.0675 2.67139 34.8259 8.43835 34.8259 15.5059C34.8259 17.8233 34.1927 20.0935 33.0115 22.0699Z" />
                                            <path
                                                d="M22 7.81543C17.7595 7.81543 14.3096 11.2654 14.3096 15.5059C14.3096 19.7193 17.7034 23.1963 22 23.1963C26.3496 23.1963 29.6904 19.673 29.6904 15.5059C29.6904 11.2654 26.2405 7.81543 22 7.81543ZM22 20.6499C19.1582 20.6499 16.856 18.34 16.856 15.5059C16.856 12.6789 19.173 10.3618 22 10.3618C24.827 10.3618 27.1355 12.6789 27.1355 15.5059C27.1355 18.2986 24.8868 20.6499 22 20.6499Z" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_153_65">
                                                <rect width="43.75" height="43.75" fill="white"
                                                    transform="translate(0.125 0.125)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="text">
                                    <h4>Location</h4>
                                    <p>Plot A 575, Block 3 Gulshan-e-Iqbal, Karachi, Karachi City, Sindh</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <svg width="44" height="44" viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_153_52)">
                                            <path
                                                d="M34.7007 27.2267C33.805 26.2941 32.7247 25.7955 31.5797 25.7955C30.444 25.7955 29.3544 26.2849 28.4218 27.2175L25.5039 30.1261C25.2638 29.9969 25.0238 29.8768 24.7929 29.7568C24.4605 29.5906 24.1466 29.4336 23.8788 29.2674C21.1456 27.5314 18.6617 25.2692 16.2794 22.3421C15.1252 20.8832 14.3496 19.6551 13.7863 18.4085C14.5435 17.716 15.2452 16.9958 15.9285 16.3032C16.1871 16.0447 16.4456 15.7769 16.7042 15.5184C18.6433 13.5793 18.6433 11.0677 16.7042 9.12861L14.1834 6.6078C13.8971 6.32156 13.6016 6.02608 13.3246 5.7306C12.7706 5.1581 12.1889 4.56714 11.5887 4.01312C10.693 3.12668 9.62189 2.65576 8.49537 2.65576C7.36886 2.65576 6.27928 3.12668 5.3559 4.01312C5.34667 4.02235 5.34667 4.02235 5.33744 4.03159L2.19797 7.19876C1.01605 8.38068 0.341985 9.82114 0.194245 11.4924C-0.0273642 14.1887 0.766737 16.7003 1.37616 18.3439C2.87203 22.379 5.10659 26.1187 8.43997 30.1261C12.4843 34.9554 17.3505 38.7689 22.9092 41.4559C25.033 42.4624 27.8678 43.6535 31.0349 43.8567C31.2288 43.8659 31.432 43.8752 31.6166 43.8752C33.7496 43.8752 35.541 43.1088 36.9445 41.5852C36.9538 41.5667 36.9722 41.5575 36.9815 41.539C37.4616 40.9573 38.0156 40.431 38.5974 39.8677C38.9944 39.4891 39.4007 39.0921 39.7977 38.6766C40.7119 37.7255 41.192 36.6174 41.192 35.4817C41.192 34.3367 40.7026 33.2379 39.77 32.3145L34.7007 27.2267ZM38.0064 36.9499C37.9972 36.9499 37.9972 36.9591 38.0064 36.9499C37.6463 37.3377 37.2769 37.6886 36.8799 38.0764C36.2797 38.6489 35.6703 39.2491 35.0978 39.9231C34.1652 40.9204 33.0663 41.3913 31.6259 41.3913C31.4874 41.3913 31.3396 41.3913 31.2011 41.382C28.4587 41.2066 25.9102 40.1355 23.9988 39.2214C18.7725 36.6913 14.1834 33.0994 10.3698 28.5472C7.22112 24.7521 5.11583 21.2433 3.72153 17.4759C2.8628 15.1767 2.54885 13.3854 2.68735 11.6956C2.77969 10.6152 3.19521 9.71957 3.96161 8.95317L7.11031 5.80447C7.56277 5.37971 8.04292 5.14887 8.51384 5.14887C9.09557 5.14887 9.56649 5.49975 9.86197 5.79523C9.8712 5.80447 9.88043 5.8137 9.88967 5.82293C10.4529 6.34926 10.9885 6.89405 11.5517 7.47577C11.838 7.77125 12.1335 8.06673 12.4289 8.37144L14.9498 10.8923C15.9285 11.871 15.9285 12.7759 14.9498 13.7547C14.682 14.0225 14.4234 14.2903 14.1557 14.5488C13.38 15.3429 12.6413 16.0816 11.838 16.8018C11.8195 16.8203 11.8011 16.8295 11.7918 16.848C10.9977 17.6421 11.1455 18.4177 11.3117 18.9441C11.3209 18.9718 11.3301 18.9995 11.3394 19.0272C11.995 20.6154 12.9183 22.1112 14.3219 23.8934L14.3311 23.9026C16.8796 27.0421 19.5666 29.489 22.5307 31.3634C22.9092 31.6035 23.2971 31.7974 23.6664 31.9821C23.9988 32.1483 24.3128 32.3053 24.5805 32.4715C24.6175 32.49 24.6544 32.5177 24.6913 32.5361C25.0053 32.6931 25.3008 32.767 25.6055 32.767C26.3719 32.767 26.852 32.2868 27.009 32.1298L30.167 28.9719C30.4809 28.658 30.9795 28.2794 31.5612 28.2794C32.1337 28.2794 32.6047 28.6395 32.8909 28.9534C32.9001 28.9627 32.9001 28.9627 32.9094 28.9719L37.9972 34.0597C38.9482 35.0015 38.9482 35.9711 38.0064 36.9499Z" />
                                            <path
                                                d="M23.7683 10.5319C26.1875 10.9382 28.3851 12.0832 30.1395 13.8376C31.8939 15.592 33.0297 17.7897 33.4452 20.2089C33.5468 20.8183 34.0731 21.2431 34.6733 21.2431C34.7471 21.2431 34.8118 21.2338 34.8857 21.2246C35.5689 21.1138 36.0214 20.4674 35.9106 19.7842C35.412 16.8571 34.0269 14.1885 31.9124 12.074C29.7979 9.95945 27.1293 8.57439 24.2022 8.07577C23.5189 7.96497 22.8818 8.41742 22.7618 9.09148C22.6417 9.76554 23.085 10.4211 23.7683 10.5319Z" />
                                            <path
                                                d="M43.8237 19.424C43.0019 14.604 40.7304 10.218 37.24 6.72766C33.7496 3.23731 29.3636 0.965807 24.5436 0.144004C23.8695 0.0239658 23.2324 0.485653 23.1124 1.15972C23.0016 1.84301 23.454 2.48014 24.1373 2.60018C28.4402 3.32964 32.3646 5.3703 35.4856 8.48207C38.6066 11.6031 40.638 15.5274 41.3675 19.8303C41.4691 20.4398 41.9954 20.8645 42.5956 20.8645C42.6694 20.8645 42.7341 20.8553 42.8079 20.846C43.482 20.7445 43.9437 20.0981 43.8237 19.424Z" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_153_52">
                                                <rect width="43.75" height="43.75" fill="white"
                                                    transform="translate(0.125 0.125)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="text">
                                    <h4>Phone</h4>
                                    <a href="tel:03362456227">03362456227</a> <br>
                                    <a href="tel:03221654896">03221654896</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <svg width="44" height="44" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_464_33)">
                                            <path
                                                d="M45.3125 6.25H4.68753C2.10267 6.25 0 8.35267 0 10.9375V39.0625C0 41.6474 2.10267 43.75 4.68753 43.75H45.3125C47.8973 43.75 50 41.6474 50 39.0625V10.9375C50 8.35267 47.8973 6.25 45.3125 6.25ZM45.3125 9.37499C45.5248 9.37499 45.7267 9.41903 45.9114 9.49595L25 27.62L4.08854 9.49595C4.27318 9.41914 4.47514 9.37499 4.68743 9.37499H45.3125ZM45.3125 40.625H4.68753C3.82542 40.625 3.12499 39.9246 3.12499 39.0624V12.7975L23.9761 30.8685C24.2707 31.1233 24.6353 31.25 25 31.25C25.3647 31.25 25.7294 31.1234 26.0239 30.8685L46.875 12.7975V39.0625C46.8749 39.9246 46.1746 40.625 45.3125 40.625Z" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_464_33">
                                                <rect width="50" height="50" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="text">
                                    <h4>Email</h4>
                                    <a href="mailto:networklaw987@gmail.com"><span class="__cf_email__"
                                            data-cfemail="523b3c343d12372a333f223e377c313d3f">networklaw987@gmail.com</span>
                                    </a> <br>
                                    <a href="mailto:lawnet123@gmail.com"><span class="__cf_email__"
                                            data-cfemail="6b181e1b1b04191f2b0e130a061b070e45080406">lawnet123@gmail.com</span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 text-md-start text-center">
                    <div class="section-title2 mb-50">
                        <h2>Have Any Questions</h2>
                    </div>
                    <form class="contact-form" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-inner sibling2">
                                    <input type="text" name="name" require required placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-inner sibling2">
                                    <input type="email" name="email" require required placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-inner sibling2">
                                    <input type="number" name="number" require required placeholder="Enter your Phone">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-inner sibling2">
                                    <input type="text" name="msg" style="line-height:5" required require
                                        placeholder="Your message">
                                </div>
                            </div>
                            <div class="col-lg-12 text-lg-start text-center">
                                <button type="submit" name="sendmsg"
                                    class="eg-btn btn--outline btn--lg sibling3 capsule">
                                    Send Message &nbsp;<svg width="18" height="15" viewBox="0 0 22 13"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21.9805 6.64708C21.955 6.74302 20.6834 7.78829 18.0766 9.85862C13.9311 13.156 14.0201 13.0954 13.5751 12.949C13.1809 12.8177 13.0219 12.5097 13.1809 12.1814C13.2127 12.1057 14.6369 10.9342 16.3408 9.5809L19.4309 7.11669V5.90479L16.3091 3.41534C14.23 1.75907 13.1682 0.885493 13.1427 0.789551C13.041 0.466377 13.2635 0.143203 13.6577 0.0472607C13.7595 0.0270623 13.8485 0.00181433 13.8612 0.00181433C14.0201 -0.0385824 14.8467 0.582518 18.1148 3.18306C20.6898 5.23824 21.955 6.27846 21.9805 6.36935C22.0059 6.45015 22.0059 6.57134 21.9805 6.64708Z" />
                                        <path
                                            d="M17.4313 5.90479V7.11669L2.71236 7.10659C2.27365 7.10608 1.84766 7.10558 1.43438 7.10507C1.19278 7.10507 0.954985 7.10457 0.721643 7.10457C0.320448 7.09396 0 6.83189 0 6.51074C0 6.34662 0.0839268 6.19817 0.218718 6.09061C0.349695 5.98659 0.528993 5.92044 0.728001 5.9169L1.23283 5.9164L2.706 5.91488L17.4313 5.90479Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="map-section pt-120 pb-0 overflow-hidden">
        <div class="container-fluid px-0">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d904.5187569153555!2d67.09369325074596!3d24.929513867528538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3eb33f4acc92dbdf%3A0x59346e3d15b29f73!2sPlot%20A%20575%2C%20Block%203%20Gulshan-e-Iqbal%2C%20Karachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!3m2!1d24.9291078!2d67.0939903!5e0!3m2!1sen!2s!4v1669808495516!5m2!1sen!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <?php include '_shared/_footer.php'; ?>