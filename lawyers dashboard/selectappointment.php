<?php
echo "hello";
if(isset($_POST['app_id'])){
    echo  $_GET['app_id'];
echo $_POST['app_id'];
    $output= '';

    include "../admin panel/shared/config.php";
    $select_appointment_details="select * from appointments join clients_reg on appointments.c_id_FK=clients_reg.c_id where b_id='".$_POST['app_id']."'";
    $result=mysqli_query($conn,$select_appointment_details);

    $output .=
    '<div class="modal fade custom-modal appointment_details" id="appt_details">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">


            <div class="modal-header">
                <h5 class="modal-title">Client Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';

            while($details=mysqli_fetch_array($result)){
                $output .=
                
                '<div class="modal-body">
                    <ul class="info-details">
                        <li>
                            <div class="details-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="title">Complaint:</span>
                                        <span class="text">'.$details['cl_que'].'</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-end">
                                            <button type="button" class="btn bg-dark btn-sm"
                                                id="topup_status">Approve</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="title">Email Address:</span>
                            <span class="text">'.$details['c_email'].'</span>
                        </li>
                        <li>
                            <span class="title">Contact # :</span>
                            <span class="text">'.$details['cl_num'].'</span>
                        </li>
                    </ul>
                </div>';

                
      
            }
           $output .= '</div>
            </div>
        </div>';
        echo $output;
}
?>