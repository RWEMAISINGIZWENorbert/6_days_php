<?php
 
 session_destroy();

 if(!$_SESSION['user_email']){
    header("location: ../../index.php");
 }

?>