<?php
session_start();

session_unset();
session_destroy();
header("location:/green/partner.php?ploggedoutsuccess=true");
exit;
?>