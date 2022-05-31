<?php
session_start();

$_SESSION = [];

$_SESSION['login'] = False;
$_SESSION['user_lvl'] = 'User';

header("Location: _login.php");
?>