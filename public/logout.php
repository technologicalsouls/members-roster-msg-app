<?php session_start();

if(isset($_POST['submit'])){
    session_unset($_SESSION['uuid']);
    session_destroy();
    header('location:index.php');
}