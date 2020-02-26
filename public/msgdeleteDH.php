<?php session_start();
    require_once('../includes/config.php');
    if(!isset($_SESSION['uuid'])){
        header('location:artistlogin.php');
    }
    $cuid = mysqli_real_escape_string($conn, $_POST['cuid']);
    $qry = "DELETE FROM messages WHERE cuid = $cuid";
    $delete = mysqli_query($conn, $qry);

    if(mysqli_num_rows($delete) > 0){
        unset($delete);
    };
    mysqli_close($conn);
header('location:artistdashboard.php');