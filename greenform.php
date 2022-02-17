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

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css"
        rel="stylesheet"> <!-- for switch button-->
    <script
        src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js">
    </script> <!-- for switch button-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/742d0b1255.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="full_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="clientcss.css?v=<?php echo time(); ?>">
    <style>
    html {
        overflow: scroll;
        overflow-x: hidden;
    }

    ::-webkit-scrollbar {
        width: 0px;

        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }
    </style>

    <script>
    // check box script
    function myFunction() {
        // Get the checkbox
        var checkBox = document.getElementById("myCheck");
        // Get the output text
        var text = document.getElementById("hidecontent");

        // If the checkbox is checked, display the output text
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
            allt.value = "";
            leng.value = "";
        }
    }
    </script>

    <script>
    function hideDtls() {

        var togglebtn = document.getElementById("hide_contact_toggle");
        var hide_contact = document.getElementById("hide_contact_details");
        if (togglebtn.checked == true) {
            hide_contact.value = "Encrypt";
        } else {
            hide_contact.value = "NonEncrypt";
        }
    }
    </script>

    <title>2nd page</title>

</head>

<body>

    <div class="loading">
        <i class="loader"></i>
    </div>

    <?php include 'partials/_headerClient.php'?>
    <?php 


if(isset($_SESSION['userisloggedin']) && $_SESSION['userisloggedin']==true)
{
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        include 'partials/_db_connect.php';
        $T_userid = $_SESSION['userid'];
        $T_state = $_POST["green_state"];
        $T_city = $_POST["green_city"];
        $T_address = $_POST["green_address"];
        $T_pincode = $_POST["green_pincode"];
        // $T_status = $_POST["partner_email"];
        $T_gps_link = $_POST["locationLink"];
        $T_user_desc = $_POST["green_desc"];
        $Encryption_on_contacts = $_POST["green_enc_contact"];
       

    // image data

    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes))
        { 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
            
            $quer = "INSERT INTO `greentask` (`Task_user_id`, `Task_state`, `Task_city`, `Task_address`, `Task_pincode`, `Task_user_desc`, `Task_status`, `Task_gps_link`, `Task_enc_contact` , `Task_images` , `Task_partner_id`) VALUES ('$T_userid', '$T_state', '$T_city', '$T_address', '$T_pincode', '$T_user_desc', 'Pending', '$T_gps_link', '$Encryption_on_contacts' , '$imgContent', '0')";
            
            $result = mysqli_query($con,$quer);
            
            if($result)
            {
                // $showAlert = true;
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
                header("location:/green/successful.php");
                exit();
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
        // $statusMsg = 
        $quer = "INSERT INTO `greentask` (`Task_user_id`, `Task_state`, `Task_city`, `Task_address`, `Task_pincode`, `Task_user_desc`, `Task_status`, `Task_gps_link`, `Task_partner_id`) VALUES ('$T_userid', '$T_state', '$T_city', '$T_address', '$T_pincode', '$T_user_desc', 'Pending', '$T_gps_link', '0')";
        $result = mysqli_query($con,$quer);
        header("location:/green/successful.php");

        // echo 'Please select an image file to upload.'; 
    } 
    
    $con->close();
}
}//end of if


else {
    $message = "Login First, to Make A Green Point";
    header("location:/green/index.php?loggedinsuccess=false&login_errormessage='$message'");
    ob_end_flush();
}


?>

    <div class="container-fluid w-100 ">
        <div class="row">
            <div class="col-md-4 left_side text-dark font-mono"
                style="background-image: linear-gradient(to right, #5de035,#178250); overflow:scroll">
                <img src="images/tree_split.jpg" class="splitimage" alt="">
                <div class="container mt-4 mb-4">
                    <form method="POST" action="<?php $_SERVER['REQUEST_URI']?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">State</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="green_state"
                                aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">City</label>
                            <input type="text" class="form-control" name="green_city" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Green point Address</label>
                            <input type="text" class="form-control" name="green_address" required>
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Pincode</label>
                            <input type="text" class="form-control" name="green_pincode" required>
                        </div>

                        <label class="form-label">Want to <b>Hide</b> My Contact Details</label>
                        <div class="mb-4">

                            <input type="checkbox" data-toggle="switchbutton" id="hide_contact_toggle"
                                data-onstyle="warning" onchange="hideDtls()">
                        </div>

                        <div>
                            <input type="hidden" id="hide_contact_details" value="NonEncrypt" name="green_enc_contact">
                        </div>



                        <div class="mb-3">
                            <label class="form-label">Select Image File to Upload:</label>
                            <input type="file" class="form-control" name="image">
                            <p class="form-text text-danger mt-1 ml-0">* Please Select only one Image</p>

                        </div>


                        <div class="mb-3 form-check mt-4">
                            <input type="checkbox" class="form-check-input" id="myCheck" onclick="myFunction()">
                            <label class="form-check-label" for="exampleCheck1">Make Green Point At My Location</label>
                        </div>

                        <div id="hidecontent" style="display:none">

                            <div class="row">
                                <div class="col-md-6 col-6 ">
                                    <div class="">
                                        <label for="exampleInputPassword1" class="form-label">allti</label>
                                        <input type="text" class="form-control" id="allt">
                                    </div>
                                </div>

                                <div class="col-md-6 col-6">
                                    <div class="">
                                        <label for="exampleInputPassword1" class="form-label">legni</label>
                                        <input type="text" class="form-control" id="leng">
                                    </div>
                                </div>

                            </div>
                            <div class="form-text mt-2 text-black mt-4 ml-4">Please Click on <mark>GET MY
                                    LOCATION</mark> button below to give your currnt location.</div>

                            <div class="container" style="text-align: center;">
                                <button type="button" class="btn-primary mt-4 p-1 rounded-full"
                                    onclick="getLocation()">GET MY LOCATION</button>
                            </div>

                            <input type="hidden" name="locationLink" id="locationLink">
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleInputPassword1" name="green_desc"></textarea>
                        </div>

                        <button type="submit" class="btn rounded-2xl btn-success form-control mt-12">Submit</button>
                    </form>
                </div>

            </div>
            <div class="col-md-8 right_side fill m-0 p-0  d-none d-sm-block"
                style="background-image: url(images/tree_plantation.jpg); background-repeat: no-repeat; background-size: 100% 110%;">
                <div class="container mt-8 text-black">
                    <b> <i>
                            <h1 class="text-4xl font-mono">LET'S COME AND BUILD THE FUTURE</h1>
                        </i></b>
                    <b>
                        <h1 class="mt-4 text-green-500 text-xl">#Save_environment</h1>
                    </b>

                </div>

            </div>
        </div>
    </div>

    <script>
    var allt = document.getElementById("allt");
    var leng = document.getElementById("leng");
    var loc_link = document.getElementById("locationLink");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        // x.innerHTML = "Latitude: " + position.coords.latitude + 
        // "<br>Longitude: " + position.coords.longitude;
        allt.value = position.coords.latitude;
        leng.value = position.coords.longitude;
        loc_link.value = "https://maps.google.com/?q=" + position.coords.latitude + "," + position.coords.longitude;
    }
    </script>

    <script>
    // for loading
    $(window).on('load', function() {
        $('.loading').fadeOut("slow");
    })
    </script>

</body>

</html>