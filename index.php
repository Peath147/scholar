<?php
    session_start();

    if(isset($_SESSION['login'])){
        header("Location: Home.php");
    }else{
        $_SESSION['login'] = False;
        $_SESSION['user_lvl'] = 'User';
        header("Location: Home.php");
    }
        
?>