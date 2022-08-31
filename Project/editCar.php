<?php
session_start();
include "config.php";
include "editCarPage.php";
$carId = $_POST['carId'];

$status = $_POST['selectStatus'];


$sql1= "SELECT * FROM car WHERE plate_no = '{$carId}'";
$result = mysqli_query($conn, $sql1);

if(mysqli_num_rows($result) == 1){
    $sql = "UPDATE `car` SET `conditionn` = '$status' WHERE `car`.`plate_no` = '$carId' ";
    if ($conn->query($sql) === TRUE) {
        echo "Car condition edited";
      } else {
        echo "Error";
      }
}
else{
        echo "car doesn't exist";
    }

