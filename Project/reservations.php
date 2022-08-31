<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <table class="table table-hover" id="car table">
      <thead>
        <tr>
            <th scope="col">Reserve id</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Plate Number</th>
            <th scope="col">User id</th>
            <th scope="col">Paid</th>
        </tr>
      </thead>
      <tbody>
            <?php
            require_once("config.php");
            $sql = "SELECT * FROM reservation";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
                while ($row=mysqli_fetch_assoc($result)) {
                    echo "	<tr>
                            <td>".$row['reserve_id']."</td>
                            <td>".$row['startDate']."</td>
                            <td>".$row['EndDate']."</td>
                            <td>".$row['plate_no']."</td>
                            <td>".$row['uid']."</td>
                            <td>".$row['is_paid']."</td>
                            </tr>";
            }
        }
        else{
            echo "<tr><td>No Reservations Found</td></tr>";
        }
        ?> 
      </tbody>
    </table>
</body>
