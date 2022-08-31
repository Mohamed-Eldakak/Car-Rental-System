<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report 4</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <form action="" method="POST">
        <label>Enter Customer ID :</label>
        <input type="text" id="CID" name = "CID" >
        <br>
        <br>
        <input type="submit">
    </form>
    <br>
    <br>
    <table class="table table-hover" id="car table">
      <thead>
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile Number</th>
            <th scope="col">reserve_id</th>
            <th scope="col">startDate</th>
            <th scope="col">EndDate</th>
            <th scope="col">Plate Number</th>
            <th scope="col">CAR Name</th>
            <th scope="col">CAR Model</th>
            <th scope="col">Payed</th>
            <th scope="col">Payed Date</th>
        </tr>
      </thead>
      <tbody>
<?php
            require_once("config.php");
            if(isset($_POST['CID'])){
            $CID = $_POST['CID'];
            $sql = "SELECT CU.fname,CU.lname,CU.email,CU.mobileno,R.reserve_id,R.startDate,R.EndDate,C.plate_no,C.NAME, C.model,R.is_paid,R.paid_at
                    FROM car C JOIN reservation R ON (C.plate_no=R.plate_no) JOIN users CU ON (R.uid=Cu.uid)
                    WHERE  R.uid='$CID' ";

            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
                while ($row=mysqli_fetch_assoc($result)) {
                    echo "	<tr>
                            <td>".$row['fname']."</td>
                            <td>".$row['lname']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['mobileno']."</td>
                            <td>".$row['reserve_id']."</td>
                            <td>".$row['startDate']."</td>
                            <td>".$row['EndDate']."</td>
                            <td>".$row['plate_no']."</td>
                            <td>".$row['NAME']."</td>
                            <td>".$row['model']."</td>
                            <td>".$row['is_paid']."</td>
                            <td>".$row['paid_at']."</td>
                            </tr>";
                }
            }
            else{
                echo "<tr><td>0 result's found</td></tr>";
            }
            }
?>
      </tbody>
    </table>
</body>
</html>