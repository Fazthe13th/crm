<?php
 session_start();
 session_destroy();
 header("Location: login_reg.php");
 exit;
?>