<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/742d0b1255.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="clientcss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="user_details.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="full_style.css?v=<?php echo time(); ?>">

    <title>History</title>
</head>

<body class="mybodystyle">

    <div class="loading">
        <i class="loader"></i>
    </div>

    <?php include 'partials/_headerPartner.php' ?>
    <a href="partner_previous_history.php" class="square_btn"> <button type="button"><b>Back</b></button></a>




    <?php
        if(isset($_GET['operation']))
        {
            if ($_GET['operation']=="completed") {
                echo '<div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
                <p><i class="fa fa-check-circle"></i>Congrats, Task has been Completed Successfully.</p>
                </div>';
            }
            if ($_GET['operation']=="rejected") {
                echo '<div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
                <p><i class="fa fa-check-circle"></i>Task has been Rejected Successfully.</p>
                </div>';
            }
        }
        ?>



    <?php 
        include 'partials/_db_connect.php';
        $task_id = $_GET["TaskID"];
        if(isset($_GET['Opearation']) && $_GET['Opearation']=="Acceptation")
        {
                
        $partnerid = $_SESSION['partnerid'];
        $quer= "UPDATE `greentask` SET `Task_status` = 'Accepted', `Task_partner_id` = $partnerid WHERE `greentask`.`Task_sno` = $task_id";
        $result = mysqli_query($con,$quer);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
                <p><i class="fa fa-check-circle"></i>Task has been Accepted Successfully.</p>
            </div>';
        }
        }

        
        
        $quer1 =  "SELECT * FROM `greentask` where `Task_sno`= $task_id ";
        $task_result = mysqli_query($con,$quer1);
        while($row = mysqli_fetch_assoc($task_result))
        {  
           $user_id = $row['Task_user_id'];
           $state =  $row['Task_state'];
           $city =  $row['Task_city'];
           $address =  $row['Task_address'];
           $pincode =  $row['Task_pincode'];
           $status =  $row['Task_status'];
           $user_desc = $row['Task_user_desc'];
           $partner_desc = $row['Task_partner_desc'];    // change
           $partner_id =  $row['Task_partner_id'];
           $location_link =  $row['Task_gps_link'];
        }

        $coordinator_name = "Coordinator not assigned yet";

        $quer2 =  "SELECT * FROM `partner` where `Partner_id`= $partner_id ";
        $partner_result = mysqli_query($con,$quer2);
        if($partner_result)
        {
            while($row = mysqli_fetch_assoc($partner_result))
            {
            $coordinator_name =  $row['Partner_name'];
            $coordinator_ngo = $row['Partner_ngo'];
            }

                $quer = "SELECT * FROM `user` where `User_id`= $user_id";
                $result = mysqli_query($con,$quer);
                while($row = mysqli_fetch_assoc($result))
                    {
                        $user_name = $row['User_name'];
                        $user_email = $row['User_email'];
                        $user_phone = $row['User_mobile'];   
                    }

            // for fetch photos upload by user from databse
            $quer3 = "SELECT * FROM `greentask` where `Task_sno`= $task_id ";
            $task_result3 = mysqli_query($con,$quer3);

            // for fetch photos upload by partner from databse
            $quer4 = "SELECT `Partner_task_image` FROM `greentask` where `Task_sno`= $task_id ";
            $task_result_P_image = mysqli_query($con,$quer4);
        }


     
 // $con->close();


    echo '<div class="student-profile mb-5 px-10">
        <div class="container">


        <div class="col-lg-12 mb-4">
        <div class="card shadow-sm mt-6">
            <div class="card-header bg-transparent border-0">
                <h3 class="mb-0"> Task Status </h3>
            </div>
            <div class="card-body pt-0">
            <div class="row d-flex justify-content-center">
            <div class="col-12 text-center">
                <ul id="progressbar" class="text-center">';

                if ($status=="Pending") 
                {
                     echo '<li class="active step0"><b>Pending</b></li>
                     <li class=" step0"><b>Accepted</b></li>
                     <li class=" step0"><b>Completed</b></li>';
                }
                else if ($status=="Accepted") 
                {
                     echo '<li class="active step0"><b>Pending</b></li>
                     <li class="active step0"><b>Accepted</b></li>
                     <li class=" step0"><b>Completed</b></li>';
                }
                else if($status=="Completed")
                {
                     echo '<li class="active step0"><b>Pending</b></li>
                     <li class="active step0"><b>Accepted</b></li>
                     <li class="active step0"><b>Completed</b></li>';
                }
                else {
                     echo '<li class="active step0"><b>Pending</b></li>
                     <li class="active step0"><b>Accepted</b></li>
                     <li class="active step0"><b>Rejected</b></li>';
                }
                
                echo '</ul>
            </div>
        </div>
            </div>
        </div>
    </div>



            <div class="row">
                <div class="col-lg-4 ">';

                
                if($status == "Accepted")  // if task accepted only then this part visible
                { 
                    include 'partials/_markTaskModal.php'; 
                echo  '<div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            
                        </div>
                        <div class="card-body pt-0 text-center">
                        <button type="button" class="btn completebtn secbtn mr-4" id='.$task_id.' data-bs-toggle="modal" data-bs-target="#CompletedModal">Mark As Completed</button>

                        <button type="button" class="btn  rejectbtn secbtn ml-4" id='.$task_id.' data-bs-toggle="modal" data-bs-target="#RejectedModal">Mark As Rejected</button>
                        </div>
                    </div>';

                }

                if($status == "Pending")  // if task accepted only then this part visible
                { 
                
                echo  '<div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                           
                        </div>
                        <div class="card-body pt-0 text-center">
                        

                        <button type="button" class="btn acceptbtn secbtn" id='.$task_id.'>Accept This Task</button>
                            </td>
                        </div>
                    </div>';

                }

                    echo '<div class="card shadow-sm mt-4">
                        <div class="card-header bg-transparent text-center">
                            <img src="images/profile1.png" alt="user image" class="profile_img">
                            <h3>'.$user_name.'</h3>
                        </div>
                        <div class="card-body">
                            <p class="mb-3"><strong class="pr-3">User ID:</strong>'.$user_id.'</p>
                            <p class="mb-3"><strong class="pr-3">User Email:</strong>'.$user_email.'</p>
                            <p class="mb-3"><strong class="pr-3">User Mobile:</strong>'.$user_phone.'</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 ">
                    <div class="card shadow-sm mt-6">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information </h3>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">State</th>
                                    <td width="2%">:</td>
                                    <td>'.$state.'</td>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="30%">City</th>
                                    <td width="2%">:</td>
                                    <td>'.$city.'</td>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="30%">Address</th>
                                    <td width="2%">:</td>
                                    <td>'.$address.'</td>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="30%">Pincode</th>
                                    <td width="2%">:</td>
                                    <td>'.$pincode.'</td>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="30%">Status</th>
                                    <td width="2%">:</td>
                                    <td>'.$status.'</td>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="30%">Assigned Coordinator</th>
                                    <td width="2%">:</td>
                                    <td>'.$coordinator_name.'</td>
                                    </th>
                                </tr>
                                <tr>
                                    <th width="30%">Location</th>
                                    <td width="2%">:</td>
                                    <td class=""><a href="'.$location_link.'" target="_blank" class="">Click Here</a></td>
                                    </th>
                                </tr>

                                <tr>
                                <th width="30%">User Images</th>
                                <td width="2%">:</td>

                                <td> <p id="heading">Click here</p>    
                                        <div id="myModal" class="modal">

                                        <!-- The Close Button -->
                                        <span class="close">&times;</span>
                                    
                                        <!-- Modal Content (The Image) -->
                                        <img class="modal-content" id="img01" alt="Image is not available">
                                    
                                        </div>
                                    </div>'; ?>

    <?php
                            echo '</td>
                            </tr>
                            </table>
                        </div>
                    </div>

                    <div style="height: 26px;"></div>

                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>User Description</h3>
                        </div>
                        <div class="card-body pt-0">
                            <p>'.$user_desc.'</p>
                        </div>
                    </div>
                 </div>';



                 if($status == "Completed")  // if task Completed only then this part visible
                 {  
                          
                 echo '<hr class="mt-5">
                 <div class="col-lg-12 ">
                    <div class="card shadow-sm mt-6">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Partner Information </h3>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Assigned Coordinator</th>
                                    <td width="2%">:</td>
                                    <td>'.$coordinator_name.'</td>
                                    </th>
                                </tr>

                                <tr>
                                    <th width="30%">Coordinator\'s NGO</th>
                                    <td width="2%">:</td>
                                    <td>'.$coordinator_ngo.'</td>
                                    </th>
                                </tr>

                                <tr>
                                    <th width="30%">Partner Images</th>
                                        <td width="2%">:</td>

                                        <td> <p id="P_heading">Click here</p>    
                                        <div id="P_myModal" class="modal">

                                        <!-- The Close Button -->
                                        <span class="P_close">&times;</span>
                                    
                                        <!-- Modal Content (The Image) -->
                                        <img class="P_modal-content" id="P_img01" alt="Image is not available">
                                    
                                        </div>
                                        </div>'; ?>

    <?php
                                        echo '</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div style="height: 26px;"></div>

                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Partner Description</h3>
                        </div>
                        <div class="card-body pt-0">
                            <p>'.$partner_desc.'</p>
                        </div>
                    </div>
                </div>';
              }  // if closed


                if($status == "Rejected")  // if task Rejected only then this part visible
                        {  
                                
                        echo '<hr class="mt-5">
                        <div class="col-lg-12 ">
                            <div style="height: 26px;"></div>

                            <div class="card shadow-sm">
                                <div class="card-header bg-transparent border-0">
                                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Partner Description/ Reason</h3>
                                </div>
                                <div class="card-body pt-0">
                                    <p>'.$partner_desc.'</p>
                                </div>
                            </div>
                        </div>';
                    }  // if closed



            '</div>
        </div>
    </div>';
    ?>

    <div style="display :none">
        <!-- this div have user image logic -->
        <?php if(mysqli_num_rows($task_result3) > 0)
    { 
        while($row = mysqli_fetch_assoc($task_result3))
        { 
            ?>
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Task_images']); ?>"
            id="userImage" />
        <?php  } 
    }

    else 
    {
        echo ' <p class="status error">Image(s) not Provided</p>';
    }?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
    // this script have user image logic
    var mainImage = document.getElementById("userImage");
    var modal = document.getElementById("myModal");
    var heading = document.getElementById("heading");
    var modalImg = document.getElementById("img01");

    heading.onclick = function() {
        modal.style.display = "block";
        modalImg.src = mainImage.src;
    }

    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    </script>


    <!-- --------------------------------------------------------->

    <div style="display :none">
        <!-- this div have partner image logic -->
        <?php if(mysqli_num_rows($task_result_P_image) > 0)
    { 
        while($row = mysqli_fetch_assoc($task_result_P_image))
        { 
            ?>
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Partner_task_image']); ?>"
            id="partnerImage" />
        <?php  } 
    }

    else 
    {
        echo ' <p class="status error">Image(s) not found</p>';
    }?>
    </div>

    <?php
    if($status == "Completed")  // if task Completed only then this part visible
    {  
    echo'<script>
    // this script have partner image logic
    var pmainImage = document.getElementById("partnerImage");
    var pmodal = document.getElementById("P_myModal");
    var pheading = document.getElementById("P_heading");
    var pmodalImg = document.getElementById("P_img01");

    pheading.onclick = function() {
        pmodal.style.display = "block";
        pmodalImg.src = pmainImage.src;
    }

    var pspan = document.getElementsByClassName("P_close")[0];

    // When the user clicks on <span> (x), close the modal
    pspan.onclick = function() {
        pmodal.style.display = "none";
    }
    </script>';
    }
    ?>


    <!-- Acceptence of Task in partnerside userdetails -->
    <script>
    accept = document.getElementsByClassName('acceptbtn');
    Array.from(accept).forEach((element) => {
        element.addEventListener("click", (e) => {
            taskid = e.target.id;
            console.log(taskid);
            // hiddenid.value = taskid;
            if (confirm("Are You Sure to want to Accept this Task")) {
                window.location =
                    `partner_side_user_details.php?TaskID=${taskid}&Opearation=Acceptation`;
            } else {
                console.log("NO");
            }
        })
    })
    </script>


    <!-- Rejection of Task -->
    <script>
    reject = document.getElementsByClassName('rejectbtn');
    Array.from(reject).forEach((element) => {
        element.addEventListener("click", (e) => {
            Reject_Task_id.value = e.target.id;
            Rej_operation_from_Puser_details.value = "InnerRejection";
        })
    })
    </script>


    <!-- Completion of Task -->
    <script>
    MarkCompleteBtn = document.getElementsByClassName('completebtn');
    Array.from(MarkCompleteBtn).forEach((element) => {
        element.addEventListener("click", (e) => {

            Complete_Task_id.value = e.target.id;
            Com_operation_from_Puser_details.value = "InnerCompletion";
        })
    })
    </script>

    <script>
    $(".alert").show('medium');
    setTimeout(function() {
        $(".alert").hide('medium');
    }, 2000);
    </script>

    <script>
    // for loading
    $(window).on('load', function() {
        $('.loading').fadeOut("slow");
    })
    </script>


</body>

</html>