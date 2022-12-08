<?php
session_start();
include('shared/connection.php');

$username=$_GET['form-username'];
$password=$_GET['form-password'];


if($username&&$password) {

    $query = mysqli_query($con, "SELECT * FROM hod WHERE 
    hod_username='$username' 
    and hod_password='$password'") or die(mysqli_query($con));
    $row = mysqli_fetch_assoc($query);
    if ($row) {
        $_SESSION['hod_username'] = $row['hod_username'];
        //header('Location:admindashboard.php');
        echo "1";
        exit();
    } else {
        echo "0";
        exit();
    }
}

?>