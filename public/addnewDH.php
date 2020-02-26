<?php session_start();
require_once('../includes/config.php');

if ($_POST['pw'] != $_POST['retypepw']) {
    header('location:addnew.php?error');
} else {
    $a_name = mysqli_real_escape_string($conn, $_POST['first']);
    $pw = mysqli_real_escape_string($conn, $_POST['pw']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "INSERT INTO artists (artist_name, email, pw) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    //prepare stmt
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // echo 'Connection Error';
        header('location:addnew.php?error');
        exit();
    } else {
        $pw = password_hash($pw, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, 'sss', $a_name, $email, $pw);
        mysqli_stmt_execute($stmt);
    };
    mysqli_close($conn);
    header('location:artistdashboard.php?');
    exit();
}
