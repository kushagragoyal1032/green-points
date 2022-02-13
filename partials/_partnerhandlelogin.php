<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    include '_db_connect.php';

$P_email = $_POST["partner_email"];
$P_password = $_POST["partner_pass"];

$quer = "select * from partner where Partner_email = '$P_email' and Partner_pass = '$P_password'";

$result = mysqli_query($con,$quer);
$num = mysqli_num_rows($result);

if($num == 1)
{
      $row = mysqli_fetch_assoc($result);      // fetch the name from the table

      session_start();
      $_SESSION['partnerisloggedin'] = true;
      $_SESSION['partnerid'] = $row["Partner_id"];  // this used to save id of logged in user
    //   $_SESSION['sno'] = $row["sno"];  // this used to save id of logged in user
      $_SESSION['partnername'] = $row["Partner_name"];
      header("location:/green/partner.php?ploginsuccess=true");
      exit();
}
else
{

  $showLoginError = "User does not exist or invalid email and password !!";
  header("location:/green/partner.php?ploginError=$showLoginError&ploginsuccess=false");
 
}
$con->close();
}
?>