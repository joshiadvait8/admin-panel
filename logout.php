<?php
session_start();
    if(isset($_SESSION['login_user']))
    {
        session_destroy();
        header("Location: adminLogin.php");

    }
    else{
        echo "no session";
        header("Location: adminLogin.php");
    }
    
?>