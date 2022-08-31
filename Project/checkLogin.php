<?php
session_start();
include "config.php";
include "index.php";
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
if($role === "admin"){
    $sql = "SELECT * FROM admin WHERE email='$email' AND PASSWORD='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['aid'] = $row['aid'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['PASSWORD'] = $row['PASSWORD'];
        header("Location: admin.php");
    }
    else {
       //echo '<samp>Incorrect username or password</samp>';
       header("location:index.php?error=1");
    }
}else{
    $sql = "SELECT * FROM users WHERE email='$email' AND PASSWORD='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) !=0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['uid'] = $uid;
        $_SESSION['uid'] = $row['uid'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['PASSWORD'] = $row['PASSWORD'];
        header("Location: user.php");       
    }
    else{
       // echo '<samp>Incorrect username or password</samp>';
       header("location:index.php?error=1");
    }
}
?>