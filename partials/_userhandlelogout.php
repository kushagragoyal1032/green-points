<?php
session_start();

session_unset();
session_destroy();
header("location:/green/index.php?loggedoutsuccess=true");
exit;
?>