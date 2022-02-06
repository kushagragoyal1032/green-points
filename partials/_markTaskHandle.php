

<?php
include '_db_connect.php';
//completing the task and update desc and status in DB
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['completebtn'])) 
{

    $hiddentaskid = $_POST["Complete_Task_id"];
    $partner_desc = $_POST["PartnerDesc"];
    $InnerforCompletion = $_POST["Com_operation_from_Puser_details"];
    

    // image data

    $status = 'error'; 
    if(!empty($_FILES["pimage"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["pimage"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes))
        { 
            $image = $_FILES['pimage']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
            
            $sql = "UPDATE `greentask` SET `Task_status` = 'Completed', `Task_partner_desc` = '$partner_desc', `Partner_task_image` = '$imgContent' WHERE `greentask`.`Task_sno` = '$hiddentaskid'";
            
            $result = mysqli_query($con,$sql);
            
            if($result)
            {
                $showAlert = "true";
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 

                if ($InnerforCompletion=="InnerCompletion") {
                    header("location:/green/partner_side_user_details.php?TaskID=${hiddentaskid}");
                    
                }
                else {
                    header("location:/green/partner_previous_history.php");
                }
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

    // $sql = "UPDATE `greentask` SET `Task_status` = 'Completed', `Task_partner_desc` = '$partner_desc' WHERE `greentask`.`Task_sno` = '$hiddentaskid'";
    // $result = mysqli_query($con,$sql);

}



?>

<?php
//rejecting the task and update desc and status in DB
//earlier used $_POST['rejectbtn'] == 'rejecting'
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rejectbtn'])) {
    $hiddentaskid = $_POST["Reject_Task_id"];
    $partner_desc = $_POST["PartnerDesc"];
    $InnerforRejection = $_POST["Rej_operation_from_Puser_details"];

    $sql = "UPDATE `greentask` SET `Task_status` = 'Rejected', `Task_partner_desc` = '$partner_desc' WHERE `greentask`.`Task_sno` = '$hiddentaskid'";
    $result = mysqli_query($con,$sql);
    if ($result) 
    {
        if ($InnerforRejection=="InnerRejection") {
                
        header("location:/green/partner_side_user_details.php?TaskID=${hiddentaskid}");
            
        }
        else {
            header("location:/green/partner_previous_history.php");
            
        }
    }
}
?>