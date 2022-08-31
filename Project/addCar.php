<?php
session_start();
include "config.php";
include "addCarPage.php";
$id = $_POST['id'];
$name = $_POST['name'];
$model = $_POST['model'];
$plateNo = $_POST['plateNo'];
$status = $_POST['status'];
$condition = $_POST['condition'];
$warehouse = $_POST['warehouse'];
$color = $_POST['color'];
$price = $_POST['price'];

$sql1= "SELECT * FROM car WHERE plate_no = '{$plateNo}'";
$seql="SELECT warehouse_id FROM warehouse WHERE location='{$warehouse}'";
$result = mysqli_query($conn, $sql1);
$resultt = mysqli_query($conn, $seql);
$row = $resultt -> fetch_assoc();
if(mysqli_num_rows($result) == 0){
    $sql = "INSERT INTO car (`car_id`, `NAME`, `model`, `plate_no`, `Status`, `conditionn`, `warehouse_id`,`color`,`price`) 
            VALUES ('$id', '$name', '$model', '$plateNo', '$status', '$condition', '{$row["warehouse_id"]}','$color', '$price')";
    if ($conn->query($sql) === TRUE) {
        echo "Car Added";
      } else {
        echo '<samp>Error</samp>';
      }
    }
else{
        echo '<samp>car already exists</samp>';
    }