<?php

session_start();
include './linkMySql.php';
if (isset($_SESSION['username']) && $_SESSION['username']) {
    unset($_SESSION['username']);
    unset($_SESSION['level']);
    header('location: login.php');
} else {
    echo 'You did not <a href="login.php">login</a>';
}
 
