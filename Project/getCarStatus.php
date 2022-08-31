<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car renting</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <form action="" method="POST">
    <label>Choose a Day :</label>
    <input type="date" id="day" name = "day">
    <br>
    <br>
    <input type="submit">
    </form>
    
 <table class="table table-hover" id="car table">
      <thead>
        <tr>
            <th scope="col">Model</th>
            <th scope="col">Plate Number</th>
            <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody> 
          
            <?php
            include "config.php";
            if(isset($_POST['day'])){
            $day = $_POST['day'];
            $sqlAvailable = "SELECT C.model , C.plate_no 
                             FROM car C LEFT JOIN reservation R ON C.plate_no = R.plate_no
                             WHERE startDate IS NULL OR '$day' NOT BETWEEN startDate and EndDate ";
            $sqlReserved = "SELECT C.model , C.plate_no 
                            FROM car C LEFT JOIN reservation R ON C.plate_no = R.plate_no
                            WHERE '$day' BETWEEN startDate and EndDate";
            $result = mysqli_query($conn, $sqlAvailable);
            $resultt = mysqli_query($conn, $sqlReserved);
            if(mysqli_num_rows($result)>0){
                while ($row=mysqli_fetch_assoc($result)) {
                echo "	<tr>
                            <td>".$row['model']."</td>
                            <td>".$row['plate_no']."</td>
                            <td>Available</td>
                        </tr>";
                }
            }
            if(mysqli_num_rows($resultt)>0){
                while ($roww=mysqli_fetch_assoc($resultt)) {
                echo "	<tr>
                            <td>".$roww['model']."</td>
                            <td>".$roww['plate_no']."</td>
                            <td>Reserved</td>
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
    <br>
    <br>

</body>
</html>

