<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <script src="https://kit.fontawesome.com/742d0b1255.js" crossorigin="anonymous"></script> -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <!-- <link rel="stylesheet" href="clientcss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="user_details.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="full_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="userprofile.css?v=<?php echo time(); ?>">


    <title>Your Profile</title>
</head>


<body>
    <?php include 'partials/_headerClient.php' ?>

    <?php
    $userid = $_SESSION['userid'];  
    ?>

    <?php
    include 'partials/_db_connect.php';

 $quer = "SELECT * FROM `user` where `User_id`= $userid";
 $result = mysqli_query($con,$quer);
 
     while($row = mysqli_fetch_assoc($result))
     {
        $user_name = $row['User_name'];
        $user_email = $row['User_email'];
        $user_phone = $row['User_mobile'];   
     }

    $all_task = "SELECT COUNT(*) as allcount FROM `greentask` WHERE Task_user_id=$userid";
    $result1=mysqli_query($con,$all_task);
    $datacount=mysqli_fetch_assoc($result1);
    $count_all =  $datacount['allcount']; 
    // echo $count_all;

    $completed_task = "SELECT COUNT(*) as Completecount FROM `greentask` WHERE Task_user_id=$userid AND Task_status='Completed'";
    $result2=mysqli_query($con,$completed_task);
    $datacount=mysqli_fetch_assoc($result2);
    $count_completed =  $datacount['Completecount'];
    // echo $count_completed;

    $pending_task = "SELECT COUNT(*) as Pendingcount FROM `greentask` WHERE Task_user_id=$userid AND Task_status='Pending'";
    $result2=mysqli_query($con,$pending_task);
    $datacount=mysqli_fetch_assoc($result2);
    $count_pending =  $datacount['Pendingcount'];
    // echo $count_pending;
    
    $accepted_task = "SELECT COUNT(*) as Acceptedcount FROM `greentask` WHERE Task_user_id=$userid AND Task_status='Accepted'";
    $result3=mysqli_query($con,$accepted_task);
    $datacount=mysqli_fetch_assoc($result3);
    $count_accepted =  $datacount['Acceptedcount'];
    // echo $count_accepted;

    $rejected_task = "SELECT COUNT(*) as Rejectedcount FROM `greentask` WHERE Task_user_id=$userid AND Task_status='Rejected'";
    $result4=mysqli_query($con,$rejected_task);
    $datacount=mysqli_fetch_assoc($result4);
    $count_rejected =  $datacount['Rejectedcount'];
    // echo $count_accepted;
    

?>


    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['changes'] == 'Save Changes')
    {
    $infoupdated=false;
    $U_name = $_POST["inputusername"];
    $U_email = $_POST["inputuseremail"];
    $T_mob = $_POST["inputusermob"];

    $quer= "UPDATE `user` SET `User_name` = '$U_name', `User_email` = '$U_email', `User_mobile` = '$T_mob' WHERE `user`.`User_id` = $userid";
    $result = mysqli_query($con,$quer);
    if ($result) 
    {
            echo '<div class="alert alt2 alert-success alert-dismissible " role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
            <p><i class="fa fa-check-circle"></i>Your Details has been changed successfully.</p>
            </div>';
            $_SESSION['username'] = $U_name;

            $quer = "SELECT * FROM `user` where `User_id`= $userid";
            $result = mysqli_query($con,$quer);
 
            while($row = mysqli_fetch_assoc($result))
            {
            $user_name = $row['User_name'];
            $user_email = $row['User_email'];
            $user_phone = $row['User_mobile'];   
        }
    }
}
?>

    <a href="index.php" class="square_btn"> <button type="button"><b>Back</b></button></a>

    <div class="container my-1">
        <div class="main-body">

            <?php
           echo ' <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="images/profile1.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>'.$user_name.'</h4>
                                    <p class="text-secondary mb-1">User</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-8 details">
                  
                    
					<div class="card mb-4">
                        <form method="POST" action="/GREEN/user_profile.php">
                    
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="inputusername" value="'.$user_name.'" disabled >
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="inputuseremail" value="'.$user_email.'" disabled=false> 
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Mobile No.</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="inputusermob" value="'.$user_phone.'" disabled>
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

    vlt = 1;
    editbtn.addEventListener("click", (e) => {
        // window.location = `/GREEN/user_profile.php?editable=${vlt}`;
        // var forms = document.getElementsByClassName("form-control");
        // forms.disabled = false;
        $('.form-control').removeAttr("disabled");
        // editbtn.style.visibility="hidden";
        editbtn.style.display = "none";
        savebtn.style.visibility = "visible";

        console.log("je");

    });

    // editbtn.addEventListener("click", (e) => {
    //     window.location = `/GREEN/user_profile.php?editable=${vlt}`;

    // }
    </script>


</body>

<script>
    $(".alert").show('medium');
    setTimeout(function() {
        $(".alert").hide('medium');
    }, 3000);
    </script>

</html>