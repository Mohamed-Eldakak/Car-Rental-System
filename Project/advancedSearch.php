<?php
session_start();
include "config.php";

$plateNo=$_POST['plateNo'];
$model=$_POST['model'];
$carname=$_POST['carname'];
$carstatus=$_POST['carstatus'];
$condition=$_POST['condition'];
$carcolor=$_POST['carcolor'];
$carprice=$_POST['carprice'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$resDay=$_POST['resDay'];
$endDay=$_POST['endDay'];

$sql = "SELECT C.car_id,C.color,C.NAME, C.model,C.plate_no,C.Status,C.conditionn,C.warehouse_id,CU.uid,CU.fname,CU.lname,CU.email,CU.mobileno,R.reserve_id,R.startDate,R.EndDate
        FROM car C , users CU , Reservation R
        WHERE C.plate_no=R.plate_no AND CU.uid=R.uid";
if(!empty($plateNo)){
    $sql .= " AND C.plate_no = '$plateNo' ";
}
if(!empty($model)){
    $sql .= " AND C.model = '$model' ";
}
if(!empty($carname)){
    $sql .= " AND C.NAME = '$carname' ";
}
if(!empty($carstatus)){
    $sql .= " AND C.Status = '$carstatus' ";
}
if(!empty($condition)){
    $sql .= " AND C.conditionn = '$condition' ";
}
if(!empty($carcolor)){
    $sql .= " AND C.color = '$carcolor' ";
}
if(!empty($carprice)){
    $sql .= " AND C.price = '$carprice' ";
}
if(!empty($fname)){
    $sql .= " AND CU.fname = '$fname' ";
}
if(!empty($lname)){
    $sql .= " AND CU.lname = '$lname' ";
}
if(!empty($email)){
    $sql .= " AND CU.email = '$email' ";
}
if(!empty($mobile)){
    $sql .= " AND CU.mobileno = '$mobile' ";
}
if(!empty($resDay)){
    $sql .= " AND R.startDate = '$resDay' ";
}
if(!empty($endDay)){
    $sql .= " AND R.EndDate = '$endDay' ";
}

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		echo "	<tr>
		          <td>".$row['car_id']."</td>				  
		          <td>".$row['NAME']."</td>
		          <td>".$row['model']."</td>
		          <td>".$row['color']."</td>
		          <td>".$row['plate_no']."</td>
		          <td>".$row['Status']."</td>
		          <td>".$row['conditionn']."</td>
                  <td>".$row['warehouse_id']."</td>

		          <td>".$row['uid']."</td>
                  <td>".$row['fname']."</td>
		          <td>".$row['lname']."</td>
		          <td>".$row['email']."</td>
		          <td>".$row['mobileno']."</td>

		          <td>".$row['reserve_id']."</td>
		          <td>".$row['startDate']."</td>
		          <td>".$row['EndDate']."</td>
		        </tr>";
	}
}
else{
	echo "<tr><td>0 result's found</td></tr>";
}
?>