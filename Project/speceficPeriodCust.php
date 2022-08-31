<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report 1</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <form action="" method="POST">
        <label>Enter start date :</label>
        <input type="date" id="resDay" name = "resDay" class="form-control">
        <br>
        <br>
        <label>Enter end date :</label>
        <input type="date" id="endDay" name = "endDay" class="form-control">
        <br>
        <br>
        <input type="submit">
    </form>
    <br>
    <br>
    <table class="table table-hover" id="car table">
      <thead>
        <tr>
            <th scope="col">Car ID</th>
            <th scope="col">Car Name</th>
            <th scope="col">Car Model</th>
            <th scope="col">Plate Number</th>
            <th scope="col">Status</th>
            <th scope="col">Condition</th>
            <th scope="col">Warehouse id</th>

            <th scope="col">Customer ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile Number</th>

            <th scope="col">Reservation Id</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
        </tr>
      </thead>
      <tbody>
                <?php
            session_start();
            include "config.php";
            if(isset($_POST['resDay']) && isset($_POST['endDay'])){
            $resDay = $_POST['resDay'];
            $endDay = $_POST['endDay'];
            $sql = "SELECT C.car_id,C.NAME, C.model,C.plate_no,C.Status,C.conditionn,C.warehouse_id,CU.uid,CU.fname,CU.lname,CU.email,CU.mobileno,R.reserve_id,R.startDate,R.EndDate
                    FROM car C , users CU , Reservation R
                    WHERE C.plate_no=R.plate_no AND CU.uid=R.uid AND (R.startDate BETWEEN '$resDay' AND '$endDay') AND (R.EndDate BETWEEN '$resDay' AND '$endDay')";

            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
                while ($row=mysqli_fetch_assoc($result)) {
                    echo "	<tr>
                            <td>".$row['car_id']."</td>
                            <td>".$row['NAME']."</td>
                            <td>".$row['model']."</td>
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
            }
            ?>
      </tbody>
    </table>
</body>
</html>
