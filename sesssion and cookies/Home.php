<?php
 
 session_start();
 if(isset($_POST['submit'])){
 if(isset($_SESSION['name'])){
    echo 'You entered in as    ' . $_SESSION['name'] . '     and email of   ' . $_SESSION['email'];
 }else{
    echo 'no Session found';
 }

 session_destroy();

}

 

?>