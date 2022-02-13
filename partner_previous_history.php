<?php
ini_set('mysql.connect_timeout',300);
ini_set('default_socket_timeout',300);

?>

<!DOCTYPE html>
<html lang="en">



<?php
    session_start();
    include 'partials/_db_connect.php';
    $partnerid = $_SESSION['partnerid'];

if(isset($_GET['P_accept']))
{
    $task_no = $_GET['P_accept'];
    $quer= "UPDATE `greentask` SET `Task_status` = 'Accepted', `Task_partner_id` = $partnerid WHERE `greentask`.`Task_sno` = $task_no";
    $result = mysqli_query($con,$quer);
    if ($result) {
            echo '<div class="alert alert-success alert-dismissible " role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p><i class="fa fa-check-circle"></i>Task has been Accepted Successfully.</p>
            </div>';
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="full_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="partnercss.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/742d0b1255.js" crossorigin="anonymous"></script>
    <title>History</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>


<body class="mybg">
    <?php 
    if(isset($_SESSION['partnerisloggedin']) && $_SESSION['partnerisloggedin']==true)
    {
        // you are looged in
    }
    
    else {
        $message = "Login First, to See Activity/Task";
        header("location:/green/partner.php?Ploggedinsuccess=false&Plogin_errormessage='$message'");
        ob_end_flush();
    }
    ?>


    <!-- Modal for Mark the task Completed and Rejected -->
    <!-- starts Here -->
    <?php include 'partials/_markTaskModal.php'; ?>
    <!-- ends Here -->

    <?php
        if(isset($_GET['operation']))
        {
            if ($_GET['operation']=="completed") {
                echo '<div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <p><i class="fa fa-check-circle"></i>Congrats, Task has been Completed Successfully.</p>
                </div>';
            }
            if ($_GET['operation']=="rejected") {
                echo '<div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <p><i class="fa fa-check-circle"></i>Task has been Rejected Successfully.</p>
                </div>';
            }
        }
        ?>
    <!-- operation -->




    <div class="row">
        <div class="col-md-1" style="align-left">
            <a href="partner.php" class="square_btn"> <button type="button"><b>Back</b></button></a>
        </div>
        <div class="col-md-11">
            <h1
                style="font-weight:700; font-size: xxx-large; text-align: center; margin-top: 15px; font-family: Courier, monospace;">
                Partner Previous History</h1>
        </div>
    </div>
    <div class="ml-sm-1 mr-sm-1  mt-10 ml-32 mr-32 p-10 mb-32 "
        style="border-radius: 10px ; text-align: center; background-image: linear-gradient(to right, #5de035,#26ddb9); min-height: 700px; ">

        <ul class="nav nav-tabs">
            <!-- <li class="active"><a data-toggle="tab" href="#AllTasks">All Tasks</a></li> -->
            <li class="active"><a data-toggle="tab" href="#Pending">Pending Tasks</a></li>
            <li><a data-toggle="tab" href="#Accepted">Accepted Tasks</a></li>
            <li><a data-toggle="tab" href="#Completed">Completed Tasks</a></li>
            <li><a data-toggle="tab" href="#Rejected">Rejected Tasks</a></li>
        </ul>


        <div class="tab-content">
            <!-- ==================PENDING TASKS========================= -->



            <div id="Pending" class="tab-pane fade in active">
                <h3 class="mb-10 mt-4 text-4xl text-white">PENDING TASKS</h3>
                <table class="table table-striped" id=myTable1>
                    <thead class="Theading">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">State</th>
                            <th scope="col">Area</th>
                            <th scope="col">Pincode</th>
                            <th scope="col">Status | Operation</th>
                            <!-- <th scope="col">Operation</th> -->
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sno=0;
                        $quer = "SELECT * FROM `greentask` where `Task_status`= 'Pending'";
                        $result = mysqli_query($con,$quer);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sno=$sno+1;
                            $user_id =  $row['Task_user_id'];
                            $actual_Task_id = $row['Task_sno'];
                            echo '  <tr>
                            <th scope="row">'.$sno.'</th>
                            <td>'.$row['Task_state'].'</td>
                            <td>'.$row['Task_address'].'</td>
                            <td>'.$row['Task_pincode'].'</td>
                            <td>
                                
                            <a href="partner_side_user_details.php?TaskID='.$actual_Task_id.'"> <button type="button" class="btn mainbtn m-2">'.$row['Task_status'].'</button></a>
                           
                            <button type="button" class="btn acceptbtn secbtn" id='.$actual_Task_id.'>Accept This Task</button>
                            </td>
                            
                        </tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>


            <!-- ==================COMPLETED TASKS========================= -->

            <div id="Completed" class="tab-pane fade">
                <h3 class="mb-14 mt-4 text-4xl">Completed Tasks</h3>
                <table class="table table-striped" id=myTable2>
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">State</th>
                            <th scope="col">Area</th>
                            <th scope="col">Pincode</th>
                            <th scope="col">Status</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $sno=0;
                            $quer = "SELECT * FROM `greentask` where `Task_partner_id`= $partnerid and `Task_status`= 'Completed'";
                            $result = mysqli_query($con,$quer);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $sno=$sno+1;
                                $actual_Task_id = $row['Task_sno'];
                                echo '  <tr>
                                <th scope="row">'.$sno.'</th>
                                <td>'.$row['Task_state'].'</td>
                                <td>'.substr($row['Task_address'],0,101).'</td>
                                <td>'.$row['Task_pincode'].'</td>
                                <td>
                                <a href="partner_side_user_details.php?TaskID='.$actual_Task_id.'"> <button type="button" class="btn mainbtn m-2">'.$row['Task_status'].'</button></a>

                                </td>
                            </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>



            <!-- ====================ACCEPTED TASKS======================= -->

            <div id="Accepted" class="tab-pane fade">
                <h3 class="mb-14 mt-4 text-4xl">MY ACCEPTED TASKS</h3>
                <table class="table table-striped" id=myTable3>
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">State</th>
                            <th scope="col">Area</th>
                            <th scope="col">Pincode</th>
                            <th scope="col">Status | Operation</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $sno=0;
                            $quer = "SELECT * FROM `greentask` where `Task_partner_id`= $partnerid and `Task_status`= 'Accepted'";
                            $result = mysqli_query($con,$quer);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $sno=$sno+1;
                                $actual_Task_id = $row['Task_sno'];
                                echo '  <tr>
                                <th scope="row">'.$sno.'</th>
                                <td>'.$row['Task_state'].'</td>
                                <td>'.$row['Task_address'].'</td>
                                <td>'.$row['Task_pincode'].'</td>
                                <td>
                                <a href="partner_side_user_details.php?TaskID='.$actual_Task_id.'"> <button type="button" class="btn mainbtn m-2">'.$row['Task_status'].'</button></a>
                                <button type="button" class="btn btn-success completebtn secbtn m-2" id='.$actual_Task_id.' data-toggle="modal" data-target="#CompletedModal">Mark As Completed</button>

                                <button type="button" class="btn btn-success rejectbtn secbtn" id='.$actual_Task_id.' data-toggle="modal" data-target="#RejectedModal">Mark As Rejected</button>
                                </td>
                            </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>


            <!-- ==================REJECTED TASKS========================= -->



            <div id="Rejected" class="tab-pane fade in">
                <h3 class="mb-10 mt-4 text-4xl text-white">REJECTED TASKS</h3>
                <table class="table table-striped" id=myTable4>
                    <thead class="Theading">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">State</th>
                            <th scope="col">Area</th>
                            <th scope="col">Pincode</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sno=0;
                        $quer = "SELECT * FROM `greentask` where `Task_status`= 'Rejected'";
                        $result = mysqli_query($con,$quer);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sno=$sno+1;
                            $user_id =  $row['Task_user_id'];
                            $actual_Task_id = $row['Task_sno'];
                            echo '  <tr>
                            <th scope="row">'.$sno.'</th>
                            <td>'.$row['Task_state'].'</td>
                            <td>'.$row['Task_address'].'</td>
                            <td>'.$row['Task_pincode'].'</td>
                            <td>
                                
                            <a href="partner_side_user_details.php?TaskID='.$actual_Task_id.'"> <button type="button" class="btn mainbtn m-2">'.$row['Task_status'].'</button></a>
                            </td>
                        </tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#myTable1').DataTable();
        $('#myTable2').DataTable();
        $('#myTable3').DataTable();
        $('#myTable4').DataTable();

        // $('#myTableAll').DataTable();


    });
    </script>

    <!-- Acceptence of Task -->
    <script>
    accept = document.getElementsByClassName('acceptbtn');
    Array.from(accept).forEach((element) => {
        element.addEventListener("click", (e) => {
            taskid = e.target.id;
            console.log(taskid);
            // hiddenid.value = taskid;
            if (confirm("Are You Sure to want to Accept this Task")) {
                window.location = `partner_previous_history.php?P_accept=${taskid}`;
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
            // console.log(taskid);
            // hiddenid.value = taskid;
            // if (confirm("Are You Sure to want to Reject this Task")) {
            //     window.location = `partner_previous_history.php?P_reject=${taskid}`;
            // } else {
            //     console.log("NO");
            // }
        })
    })
    </script>


    <!-- Completion of Task -->
    <script>
    MarkCompleteBtn = document.getElementsByClassName('completebtn');
    Array.from(MarkCompleteBtn).forEach((element) => {
        element.addEventListener("click", (e) => {
            // console.log("editbtn", );
            // tr= e.target.parentNode.parentNode;
            // title_sc = tr.getElementsByTagName("td")[0].innerText;
            // description_sc = tr.getElementsByTagName("td")[1].innerText;
            // console.log(title_sc, description_sc);
            // edit_title.value = title_sc;
            // edit_desc.value = description_sc;

            Complete_Task_id.value = e.target
                .id; //here it taking the id of button of completed and putting in into the hidden input of modal
            // $("#CompletedModal").modal('data-toggle');
        })
    })
    </script>

    <script>
    $(".alert").show('medium');
    setTimeout(function() {
        $(".alert").hide('medium');
    }, 2000);
    </script>

</body>

</html>