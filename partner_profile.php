<!DOCTYPE html>
<html lang="en">

<?php
ob_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <script src="https://kit.fontawesome.com/742d0b1255.js" crossorigin="anonymous"></script> -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="full_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="partnerprofile.css?v=<?php echo time(); ?>">


    <title>Your Profile | Partner Info</title>
</head>


<body>
    
    <?php
    
    include 'partials/_db_connect.php';
    include 'partials/_headerPartner.php' ;
    
    if (!isset($_SESSION['partnerisloggedin']) ) {
        $message = "Login First, to See Your Profile";
        header("location:/green/partner.php?Ploggedinsuccess=false&Plogin_errormessage='$message'");
        ob_end_flush();
    }
    
    ?>
 
    <?php
    $partnerid = $_SESSION['partnerid'];  
    ?>

<?php
    if(isset($_POST['submitbtn']))
    {
    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submitbtn'] == 'imguploading')
    {

    $status = 'error'; 
    if(!empty($_FILES["pimage"]["name"])) 
    { 
        // Get file info 
        $fileName = basename($_FILES["pimage"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes))
        { 
            $image = $_FILES['pimage']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
            
            $sql = "UPDATE `partner` SET `partner_image` = '$imgContent' WHERE `partner_id` = '$partnerid'";
            
            $result = mysqli_query($con,$sql);
            
            if($result)
            {
                $showAlert = "true";
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 

                // echo "done";
                // header("location:/green/partner_previous_history.php?operation=completed");
            }
            
            else
            { 
                // $statusMsg = 
                echo "File upload failed, please try again."; 
            }  
        }
        else
        { 
            // $statusMsg = 
            echo 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }
    else
    { 
         //$statusMsg = 
         echo 'Please select an image file to upload.'; 
    } 
}
    }
    ?>


<!-- Modal -->
<div class="modal fade" id="profilePhotoModal" tabindex="-1" aria-labelledby="profilePhotoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profilePhotoModalLabel">Select New Profile picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">        
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="container text-center ">
        <label>
            <center><img src="images/profileimg.jpeg" width=200px height=100px style="align:center" alt=""></center><hr>
            <h4 class="text-primary"> + Add New Profile </h4>
            <input type="file" accept="image/* " class="form-control" name="pimage" style="visibility: hidden;" required>
        </label>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submitbtn" value='imguploading'>Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>

    <?php

 $quer = "SELECT * FROM `partner` where `Partner_id`= $partnerid";
 $result = mysqli_query($con,$quer);
 
     while($row = mysqli_fetch_assoc($result))
     {
        $partner_name = $row['Partner_name'];
        $partner_email = $row['Partner_email'];
        $partner_phone = $row['Partner_mobile'];
        $partner_ngo= $row['Partner_ngo'];
        $imageresult = $row['Partner_image'];   

           
     }

     $all_task = "SELECT COUNT(*) as allcount FROM `greentask` WHERE Task_partner_id=$partnerid";
    $result1=mysqli_query($con,$all_task);
    $datacount=mysqli_fetch_assoc($result1);
    $count_all =  $datacount['allcount']; 
    // echo $count_all;

    $completed_task = "SELECT COUNT(*) as Completecount FROM `greentask` WHERE Task_partner_id=$partnerid AND Task_status='Completed'";
    $result2=mysqli_query($con,$completed_task);
    $datacount=mysqli_fetch_assoc($result2);
    $count_completed =  $datacount['Completecount'];
    // echo $count_completed;

    $pending_task = "SELECT COUNT(*) as Pendingcount FROM `greentask` WHERE Task_partner_id=$partnerid AND Task_status='Pending'";
    $result2=mysqli_query($con,$pending_task);
    $datacount=mysqli_fetch_assoc($result2);
    $count_pending =  $datacount['Pendingcount'];
    // echo $count_pending;
    
    $accepted_task = "SELECT COUNT(*) as Acceptedcount FROM `greentask` WHERE Task_partner_id=$partnerid AND Task_status='Accepted'";
    $result3=mysqli_query($con,$accepted_task);
    $datacount=mysqli_fetch_assoc($result3);
    $count_accepted =  $datacount['Acceptedcount'];
    // echo $count_accepted;

    $rejected_task = "SELECT COUNT(*) as Rejectedcount FROM `greentask` WHERE Task_partner_id=$partnerid AND Task_status='Rejected'";
    $result4=mysqli_query($con,$rejected_task);
    $datacount=mysqli_fetch_assoc($result4);
    $count_rejected =  $datacount['Rejectedcount'];
    // echo $count_accepted;
    

?>


    <?php
    if(isset($_POST['changes']))
    {
    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['changes'] == 'Save Changes')
    {
    $infoupdated=false;
    $P_name = $_POST["inputusername"];
    $P_email = $_POST["inputuseremail"];
    $P_mob = $_POST["inputusermob"];

    $quer= "UPDATE `partner` SET `Partner_name` = '$P_name', `Partner_email` = '$P_email', `Partner_mobile` = '$P_mob' WHERE `partner`.`Partner_id` = $partnerid";
    $result = mysqli_query($con,$quer);
    if ($result) 
    {       
            echo '<script>
            
            </script>';

            echo '<div class="alert alt2 alert-success alert-dismissible " role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
            <p><i class="fa fa-check-circle"></i>Your Details has been Updated successfully.</p>
            </div>';
            $_SESSION['partnername'] = $P_name;

            $quer = "SELECT * FROM `partner` where `Partner_id`= $partnerid";
            $result = mysqli_query($con,$quer);
            
                while($row = mysqli_fetch_assoc($result))
                {
                   $partner_name = $row['Partner_name'];
                   $partner_email = $row['Partner_email'];
                   $partner_phone = $row['Partner_mobile'];
                   $partner_ngo= $row['Partner_ngo'];   
                }
    }
    }
    }
?>

    <a href="partner.php" class="square_btn"> <button type="button"><b>Back</b></button></a>

    <div class="container my-1">
        <div class="main-body">

            <?php
           echo ' <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                            <div class="contain">
                            <img src="data:image/jpg;charset=utf8;base64,'.base64_encode($imageresult).'" alt="Admin" onclick="openmodal()" onerror="this.src=`images/profile1.png`;" class=" partner_profile_image" width="150">
                            <div class="middle">
                                <div class="text">Edit</div>
                            </div>
                        </div>
                                <div class="mt-3">
                                    <h4>'.$partner_name.'</h4>
                                    <p class="text-secondary mb-1"><b>Partner</b></p><hr>
                                    <h5 class="text-secondary mb-2"><b>'.$partner_ngo.'</b></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-8 details">
                  
                    
					<div class="card mb-4">
                        <form method="POST" action="/GREEN/partner_profile.php">
                    
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="inputusername" value="'.$partner_name.'" disabled required>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="email" class="form-control" name="inputuseremail" value="'.$partner_email.'" disabled=false required> 
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Mobile No.</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="tel" class="form-control" name="inputusermob" value="'.$partner_phone.'" disabled required maxlength=11 minlength="10">
								</div>
							</div>
							<div class="row mt-3">
								
								<div class="col-sm-11 text-secondary">
									<input type="button" name="changes" id="editbtn"  class="btn btn-primary px-4" value="Edit">
									<input type="submit" name="changes" id="savebtn"  class="btn btn-primary px-4" value="Save Changes">
								</div>
							</div>
						</div>
                        </form>
					</div>
                    <hr>
                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card ">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i
                                            class="material-icons text-info mr-2">Project</i> Status</h6>
                                    <small>Pending</small>
                                    <small class="float-right">('.$count_pending.'/'.$count_all.')</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: '.$count_pending.'%"
                                            aria-valuenow="90" aria-valuemin="0" aria-valuemax="'.$count_all.'"></div>
                                    </div>
                                    <small>Accepted</small>
                                    <small class="float-right">('.$count_accepted.'/'.$count_all.')</small>

                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: '.$count_accepted.'%"
                                            aria-valuenow="66" aria-valuemin="0" aria-valuemax="'.$count_all.'"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i
                                            class="material-icons text-info mr-2">Target</i>End Status</h6>
                                    <small>Completed</small>
                                    <small class="float-right">('.$count_completed.'/'.$count_all.')</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: '.$count_completed.'%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="'.$count_all.'"></div>
                                    </div>
                                    <small>Rejected</small>
                                    <small class="float-right">('.$count_rejected.'/'.$count_all.')</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: '.$count_rejected.'%"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="'.$count_all.'"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            ?>

        </div>
    </div>


    <script>
    var editbtn = document.getElementById("editbtn");
    var savebtn = document.getElementById("savebtn");
    savebtn.style.visibility = "hidden";

    editbtn.addEventListener("click", (e) => {
        $('.form-control').removeAttr("disabled");
        editbtn.style.display = "none";
        savebtn.style.visibility = "visible";
    });


    function openmodal()
    {
        $("#profilePhotoModal").modal('toggle');
    }

    </script>


</body>

<script>
$(".alert").show('medium');
setTimeout(function() {
    $(".alert").hide('medium');
}, 3500);
</script>

</html>