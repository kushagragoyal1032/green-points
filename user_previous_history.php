<!DOCTYPE html>
<html lang="en">

<?php

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
    <link rel="stylesheet" href="clientcss.css?v=<?php echo time(); ?>">



    <title>History</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/742d0b1255.js" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</head>

<body class="mybg">

    <div class="loading">
        <i class="loader"></i>
    </div>

    <?php 
    
    
    session_start();
    
    if(isset($_SESSION['userisloggedin']) && $_SESSION['userisloggedin']==true)
    {
        $userid = $_SESSION['userid'];
        include 'partials/_db_connect.php';
    }
    
    else {
        $message = "Login First, to See your Activity";
        header("location:/green/index.php?loggedinsuccess=false&login_errormessage='$message'");
        ob_end_flush();
    }
    ?>

    <div class="row">
        <div class="col-md-1" style="align-left">
            <a href="index.php" class="square_btn"> <button type="button"><b>Back</b></button></a>
        </div>
        <div class="col-md-11">
            <h1
                style="font-weight:700; font-size: xxx-large; text-align: center; margin-top: 15px; font-family: Courier, monospace;">
                Your Activity</h1>
        </div>
    </div>

    <div class="mt-10 ml-32 mr-32 p-10 mb-32"
        style="border-radius: 10px ; text-align: center; background-image: linear-gradient(to right, #5de035,#26ddb9); min-height: 700px; ">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#AllTasks">All Tasks</a></li>
            <li><a data-toggle="tab" href="#Pending">Pending Tasks</a></li>
            <li><a data-toggle="tab" href="#Accepted">Accepted Tasks</a></li>
            <li><a data-toggle="tab" href="#Completed">Completed Tasks</a></li>
        </ul>

        <div class="tab-content">


            <div id="AllTasks" class="tab-pane fade in active">
                <h3 class="mb-10 mt-4 text-4xl text-white">All TASKS</h3>
                <table class="table table-striped" id=myTableAll>
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
                            $quer = "SELECT * FROM `greentask` where `Task_user_id`= $userid";
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
                                <a href="user_details.php?TaskID='.$actual_Task_id.'"> <button type="button" class="btn mainbtn m-2">'.$row['Task_status'].'</button></a>

                                </td>
                            </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- =========================================== -->

            <div id="Pending" class="tab-pane fade">
                <h3 class="mb-10 mt-4 text-4xl text-white">PENDING TASKS</h3>
                <table class="table table-striped" id=myTable1>
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
                        $quer = "SELECT * FROM `greentask` where `Task_user_id`= $userid and `Task_status`= 'Pending'";
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
                                <a href="user_details.php?TaskID='.$actual_Task_id.'"> <button type="button" class="btn mainbtn m-2">'.$row['Task_status'].'</button></a>
                            </td>
                        </tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>


            <!-- =========================================== -->

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
                            $quer = "SELECT * FROM `greentask` where `Task_user_id`= $userid and `Task_status`= 'Completed'";
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
                                    <a href="user_details.php?TaskID='.$actual_Task_id.'"> <button type="button" class="btn mainbtn m-2">'.$row['Task_status'].'</button></a>
                                </td>
                            </tr>';
                            }
                        ?>


                        <!-- <tr>
                            <th scope="row">2</th>
                            <td>'kaye</td>
                            <td>'how r u</td>
                            <td>328022</td>
                            <td>
                                <button type="button" class="btn btn-primary editbtn mx-2 text-black">Edit</button>

                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>



            <!-- =========================================== -->

            <div id="Accepted" class="tab-pane fade">
                <h3 class="mb-14 mt-4 text-4xl">Accepted Tasks</h3>
                <table class="table table-striped" id=myTable3>
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
                            $quer = "SELECT * FROM `greentask` where `Task_user_id`= $userid and `Task_status`= 'Accepted'";
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
                                    <a href="user_details.php?TaskID='.$actual_Task_id.'"> <button type="button" class="btn mainbtn m-2">'.$row['Task_status'].'</button></a>
                                </td>
                            </tr>';
                            }
                        ?>


                        <!-- <tr>
                            <th scope="row">3</th>
                            <td>'kaye</td>
                            <td>'how r u</td>
                            <td>328022</td>
                            <td>
                                <button type="button" class="btn btn-primary editbtn mx-2 text-black">Edit</button>

                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>


    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#myTable1').DataTable();
        $('#myTable2').DataTable();
        $('#myTable3').DataTable();
        $('#myTableAll').DataTable();


    });
    </script>

    <script>
    // for loading
    $(window).on('load', function() {
        $('.loading').fadeOut("slow");
    })
    </script>

</body>

</html>