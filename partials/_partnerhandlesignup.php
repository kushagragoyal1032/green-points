<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include '_db_connect.php';


$showAlert = false;

$P_name = $_POST["partner_name"];
$P_email_id = $_POST["partner_email"];
$P_phone = $_POST["partner_phone"];
$P_ngo = $_POST["partner_ngo"];
$P_password = $_POST["partner_pass"];
$P_cpassword = $_POST["partner_cpass"];

$Existquer = "select * from partner where Partner_email = '$P_email_id'";
$result = mysqli_query($con,$Existquer);
$Existnum = mysqli_num_rows($result);

if($Existnum > 0)
{
  $showError = "Email already in use!!";
}

else
{
  if($P_password == $P_cpassword)
  {
//   $P_hash = password_hash($U_password, PASSWORD_DEFAULT);  
  $quer = "INSERT INTO `partner` (`Partner_name`, `Partner_email`, `Partner_mobile`, `Partner_pass`, `Partner_ngo`) VALUES ('$P_name', '$P_email_id', '$P_phone', '$P_password', '$P_ngo');";
  $result = mysqli_query($con,$quer);
    if($result)
    {
        $showAlert = true;
        header("location:/green/partner.php?signupsuccess=true");
        exit();
    }
  }
  else
  {
    $showError = "Passwords do not match !!";
  }

}
header("location:/green/partner.php?signupsuccess=false&show='$showError'");
  exit();

$con->close();

}

?>