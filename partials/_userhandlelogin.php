<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    include '_db_connect.php';

$U_email = $_POST["user_email"];
$U_password = $_POST["user_pass"];

$quer = "select * from user where User_email = '$U_email' and User_pass = '$U_password'";

$result = mysqli_query($con,$quer);
$num = mysqli_num_rows($result);

if($num == 1)
{
      $row = mysqli_fetch_assoc($result);     

      session_start();
      $_SESSION['userisloggedin'] = true;
      $_SESSION['userid'] = $row["User_id"];  // this used to save id of logged in user
      // $_SESSION['username'] = $row["user_name"];
      header("location:/green/index.php?loginsuccess=true");
      exit();
}
else
{

  $showLoginError = "User does not exist or invalid email and password !!";
  header("location:/green/index.php?loginError=$showLoginError&loginsuccess=false");
  exit();
 
}
$con->close();
}
?>