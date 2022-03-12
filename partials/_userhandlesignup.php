<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include '_db_connect.php';


$showAlert = false;

$U_name = $_POST["user_name"];
$U_email_id = $_POST["user_email"];
$U_phone = $_POST["user_phone"];
$U_password = $_POST["user_pass"];
$U_cpassword = $_POST["user_cpass"];

$U_name = str_replace("<", "&lt", $U_name);
$U_name = str_replace(">", "&gt", $U_name); 

$U_email_id = str_replace("<", "&lt", $U_email_id);
$U_email_id = str_replace(">", "&gt", $U_email_id); 

$U_phone = str_replace("<", "&lt", $U_phone);
$U_phone = str_replace(">", "&gt", $U_phone);

$U_password = str_replace("<", "&lt", $U_password);
$U_password = str_replace(">", "&gt", $U_password);

$U_cpassword = str_replace("<", "&lt", $U_cpassword);
$U_cpassword = str_replace(">", "&gt", $U_cpassword);

$Existquer = "select * from user where User_email = '$U_email_id'";
$result = mysqli_query($con,$Existquer);
$Existnum = mysqli_num_rows($result);

if($Existnum > 0)
{
  $showError = "Email already in use!!";
}

else
{
  if($U_password == $U_cpassword)
  {
//   $P_hash = password_hash($U_password, PASSWORD_DEFAULT);  
  $quer = "INSERT INTO `user` (`User_name`, `User_email`, `User_pass`, `User_mobile`) VALUES ('$U_name', '$U_email_id', '$U_password', '$U_phone')";
  $result = mysqli_query($con,$quer);
    if($result)
    {
        $showAlert = true;
        header("location:/green/index.php?signupsuccess=true");
        exit();
    }
  }
  else
  {
    $showError = "Passwords do not match !!";
  }

}
header("location:/green/index.php?signupsuccess=false&show='$showError'");
  exit();

$con->close();

}

?>