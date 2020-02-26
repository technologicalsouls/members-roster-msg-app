<?php session_start();
    require_once('../includes/config.php');
    $first = mysqli_real_escape_string($conn, $_POST['cfirst']);
    $last = mysqli_real_escape_string($conn, $_POST['clast']);
    $email = mysqli_real_escape_string($conn, $_POST['cemail']);
    $a = mysqli_real_escape_string($conn, $_POST['cartists']);
    $msgsubj = mysqli_real_escape_string($conn, $_POST['subject']);
    $msg = mysqli_real_escape_string($conn, $_POST['msg']);
    $photo = mysqli_real_escape_string($conn, $_POST['cphoto']);

    $tmp = $_FILES['cphoto']['tmp_name'];
    $filename = str_replace(' ', '', $last.$first);
    mkdir ('messages/'.$filename);
    $img = 'messages/'.$filename.'/msgimg.jpg';
    move_uploaded_file( $tmp, $img );

    $sql = "INSERT INTO messages (first_name, last_name, email, msgsubj, msg, artist_uuid, imgpath) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo 'Connection error';
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 'sssssss', $first, $last, $email, $msgsubj, $msg, $a, $img);
        mysqli_stmt_execute($stmt);
        mysqli_close($conn);
    };
header('location:index.php');