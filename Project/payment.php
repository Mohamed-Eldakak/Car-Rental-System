<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<?php
session_start();
include "config.php";
$uid= $_SESSION['uid'];
$sql="SELECT NAME , model , color , price FROM car c JOIN reservation r ON(c.plate_no=r.plate_no) WHERE r.uid = '$uid' AND r.is_paid='F'";
$sqll="SELECT SUM(price) AS price FROM car c JOIN reservation r ON(c.plate_no=r.plate_no) WHERE r.uid = '$uid' AND r.is_paid='F'";
$result = mysqli_query($conn, $sql);
$sum = mysqli_query($conn, $sqll);
if(mysqli_num_rows($result)>0){
	echo "<table class=\"table table-hover\" id=\"paymenttable\">
	<thead>
	  <tr>
		  <th scope=\"col\">Car Name</th>
		  <th scope=\"col\">Model</th>
		  <th scope=\"col\">Color</th>
		  <th scope=\"col\">Price</th>
	  </tr>
	</thead>
	<tbody></tbody>";
	while ($row=mysqli_fetch_assoc($result)) {
		echo "	
				<tr>
		          <td>".$row['NAME']."</td>
		          <td>".$row['model']."</td>
		          <td>".$row['color']."</td>
		          <td>".$row['price']."</td>
		        </tr>";
	}
    $roww=mysqli_fetch_assoc($sum);
    echo "	<tr>
    <td> </td>
    <td> </td>
    <td>SUM</td>
    <td>".$roww['price']."</td>
  </tr>";
  
}
else{
	echo "<tr><td>No Payments</td></tr>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="payment.css">
</head>
<body>
	<form action="" method="POST">
		<input type="submit" value="Confirm Payment" class="btn btn-primary" name = "payButton" id="payButton">
	</form>
	<input type="button" id="myBtn" value="Go Back" class="btn btn-primary">
</body>
<script>
        var btn = document.getElementById('myBtn');
        btn.addEventListener('click', function() {
        document.location.href = 'user.php';
        });
</script>
</html>
<?php
		if(isset($_POST['payButton'])){
			$uid= $_SESSION['uid'];
			$currentDate = date("Y-m-d");
			$mysql = "UPDATE reservation SET is_paid = 'T' , paid_at ='$currentDate' WHERE reservation.uid='$uid'";
			$pay = mysqli_query($conn, $mysql);
			echo '<samp>Payment done successfully.</samp>';
		}
?>