<?php
session_start();
include "config.php";
$name=$_POST['name'];
$model=$_POST['model'];
$color=$_POST['color'];
$sql = "SELECT * FROM car c,warehouse w WHERE c.warehouse_id=w.warehouse_id ";
if(!empty($model)){
    $sql .= "AND c.model = '$model' ";
}
if(!empty($color)){
    $sql .= "AND c.color = '$color' ";
}
if(!empty($name)){
    $sql .= "AND NAME LIKE '%".$name."%' ";
}
$sql .= "ORDER BY car_id" ;
$result = mysqli_query($conn, $sql);
echo mysqli_num_rows($result);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		echo "	<tr>
		          <td>".$row['car_id']."</td>
		          <td>".$row['NAME']."</td>
		          <td>".$row['model']."</td>
		          <td>".$row['plate_no']."</td>
		          <td>".$row['conditionn']."</td>
		          <td>".$row['location']."</td>
		          <td>".$row['color']."</td>
		          <td>".$row['price']."</td>
		        </tr>";
	}
}
else{
	echo "<tr><td>0 result's found</td></tr>";
}
?>