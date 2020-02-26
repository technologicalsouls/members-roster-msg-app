<?php session_start();
require_once('../includes/config.php');

if (!isset($_POST['submit'])) {
  header('location:addnew.php?error');
} else {
    $pw = mysqli_real_escape_string($conn, $_POST['pw']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $aname= mysqli_real_escape_string($conn, $_POST['first']);

    if(empty($pw) || empty($email) || empty($aname)){
        header('location:artistlogin.php?error');
    } else {
        $sql = "SELECT * FROM artists WHERE artist_name='$aname' AND email='$email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1){
            // echo '<p>not found</p>';
            header('location:artistlogin.php?error');
        } else {
            if($row = mysqli_fetch_assoc($result)){
                if( password_verify($pw, $row['pw'])){
                    if($row['email'] == $email && $row['artist_name'] == $aname){
                        $dj = date('m/d/Y', strtotime($row['date_added']));
                        $_SESSION['date_added'] = $dj;
                        $_SESSION['uuid'] = $row['uuid'];
                        $_SESSION['aname'] = $row['artist_name'];
                        $_SESSION['last'] = $row['last_name'];
                        $_SESSION['email'] = $row['email'];
                        header('location:artistdashboard.php');
                    } else{
                        header('location:index.php');
                    }
                } else{
                    header('location:index.php');
                }
            }
        }
        mysqli_close($conn);
        exit();
    }
}