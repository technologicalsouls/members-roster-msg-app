<?php session_start();
    require_once('../includes/config.php');

    $uuid = mysqli_real_escape_string($conn, $_POST['uuid']);

    $sql = "DELETE FROM artists WHERE uuid = '$uuid'";

    mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("location:artistdashboard.php?");