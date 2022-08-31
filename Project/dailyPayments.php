<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report 5</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <form action="" method="POST">
        <label>Enter start date :</label>
        <input type="date" id="StartDay" name = "StartDay" class="form-control">
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
            <th scope="col">reserve_id</th>
            <th scope="col">startDate</th>
            <th scope="col">EndDate</th>
            <th scope="col">plate_no</th>
            <th scope="col">uid</th>
            <th scope="col">is_paid</th>
            <th scope="col">paid_at</th>
        </tr>
      </thead>
      <tbody>
                <?php
            session_start();
            require_once("config.php");
            if(isset($_POST['StartDay']) && isset($_POST['endDay'])){
            $StartDay = $_POST['StartDay'];
            $endDay = $_POST['endDay'];
            $sql = "SELECT *
                    FROM Reservation R
                    WHERE (R.paid_at BETWEEN '$StartDay' AND '$endDay')";

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