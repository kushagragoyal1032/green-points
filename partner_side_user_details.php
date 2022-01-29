<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="clientcss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="user_details.css">
    <title>History</title>
</head>

<body class="mybodystyle">

<?php include 'partials/_headerPartner.php' ?>


<?php 
    
    
    // if(!isset($_SESSION['userisloggedin']) && $_SESSION['userisloggedin']!=true)
    // {
    //     $message = "Login First, to View Your Activity Details";
    //     header("location:/green/index.php?loggedinsuccess=false&login_errormessage='$message'");
    // }
    include 'partials/_db_connect.php';

    
   
        
        // $task_id = $_GET['TaskID'];
        $task_id = $_GET["TaskID"];
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
           $partner_id =  $row['Task_partner_id'];
           $location_link =  $row['Task_gps_link'];
        }

        $coordinator_name = "Coordinator not assigned yet";

        $quer2 =  "SELECT `Partner_name` FROM `partner` where `Partner_id`= $partner_id ";
        $partner_result = mysqli_query($con,$quer2);
        if($partner_result)
        {
        while($row = mysqli_fetch_assoc($partner_result))
        {
           $coordinator_name =  $row['Partner_name'];
        }


            $quer = "SELECT * FROM `user` where `User_id`= $user_id";
        $result = mysqli_query($con,$quer);
        while($row = mysqli_fetch_assoc($result))
            {
                    $user_name = $row['User_name'];
                    $user_email = $row['User_email'];
                    $user_phone = $row['User_mobile'];   
                }
    }


     
// $con->close();


    echo '<div class="student-profile py-32 px-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="card shadow-sm mt-4">
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
                            </table>
                        </div>
                    </div>

                    <div style="height: 26px;"></div>

                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Your Description</h3>
                        </div>
                        <div class="card-body pt-0">
                            <p>'.$user_desc.'</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    ?>
    
</body>

</html>