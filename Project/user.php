<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car renting</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="userPage.css">
</head>
<body>
    <label for="search">Enter car name</label>
    <br>
    <input type="text" id="search">
    <br>
    <label for="search">Enter car model</label>
    <br>
    <input type="text" id="searchModel">
    <br>
    <label for="search">Enter car colour</label>
    <br>
    <input type="text" id="searchColour">
    <br>
    <br>
    <table class="table table-hover" id="car table">
      <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Model</th>
            <th scope="col">Plate Number</th>
            <th scope="col">Condition</th>
            <th scope="col">Warehouse Location</th>
            <th scope="col">Color</th>
            <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody id="output">     
      </tbody>
    </table>
    <br>
    <br>
    <form action="" method="POST" name="myForm" id="myForm">
        <label for="car id">Enter car plate</label>
        <br>
        <input type="text" id="carplate" name="carplate" required>
        <br>
        <br>
        <label for="car id">Enter start date</label>
        <br>
        <input type="date" id="Startdate" name="Startdate" required>
        <br>
        <br>
        <label for="car id">Enter end date</label>
        <br>
        <input type="date" id="Enddate" name="Enddate" required>
        <br>
        <br>
        <input class="btn btn-primary" type="submit" value="Reserve" name="Reserve" id="Reserve">
        <span><input class="btn btn-primary" type="button" value="Pay" id="Pay"></span>
    </form>
    <br>
    <button id="myBtn" class="btn btn-primary">Logout</button>  
    

    <!-- log out-->
    <script>
        var btn = document.getElementById('myBtn');
        btn.addEventListener('click', function() {
        document.location.href = 'index.php';
        });
    </script>
     <!-- Payment-->
    <script>
        var btn = document.getElementById('Pay');
        btn.addEventListener('click', function() {
        document.location.href = 'payment.php';
        });
    </script>
    <br>
    <br>
    <!--Search with ajax-->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#search,#searchModel,#searchColour").keyup(function(){
                $.ajax({
                    type:'POST',
                    url:'search.php',
                    data:{
                        name:$("#search").val(),
                        model:$("#searchModel").val(),
                        color:$("#searchColour").val(),
                    },
                    success:function(data){
                        $("#output").html(data);
                    }
                })
            })
        })
    </script>
</body>
</html>
<script>
        var form = document.getElementById('myForm');
        form.onsubmit = function x(event) {
            var x = validateReservationForm();
            return x ;
        }
        function validateReservationForm() {
    var form = document.forms["myForm"];  
    if(form["Startdate"].value > form["Enddate"].value){
        alert("Pickup Time must be before the Return Time");
        return false;
        }
    } 
    </script>
<?php
    session_start();
    include "config.php";
    if(isset($_POST['Reserve'])) {
        $pickup_time = $_POST['Startdate'];
        $return_time = $_POST['Enddate'];
        $plate_id = $_POST['carplate'];
        $uid= $_SESSION['uid'];
        $sql = "SELECT * FROM `reservation` WHERE plate_no = '$plate_id' AND ((startDate BETWEEN '$pickup_time' AND  '$return_time') OR (EndDate BETWEEN '$pickup_time' AND '$return_time')  OR ('$pickup_time' BETWEEN startDate AND EndDate) OR ('$return_time' BETWEEN startDate AND EndDate))";
        $secondsql = "SELECT * FROM `car` WHERE plate_no = '$plate_id' AND conditionn = 'out of service'";
        $thirdsql= "SELECT * FROM `car` WHERE plate_no = '$plate_id'";
        $result = mysqli_query($conn, $sql);
        $resultt = mysqli_query($conn, $secondsql);
        $resulttt = mysqli_query($conn, $thirdsql);
        if ((mysqli_num_rows($result) == 0)&&(mysqli_num_rows($resultt)==0)&&(mysqli_num_rows($resulttt)!=0)){
            $query = "INSERT INTO `reservation` (plate_no,uid,startDate,EndDate,is_paid) VALUES('$plate_id','$uid','$pickup_time','$return_time','F')";
            $queryy = "UPDATE `car` SET `Status` = 'reserved' WHERE `car`.`plate_no` = '$plate_id'";
            $result = mysqli_query($conn, $query);
            $r = mysqli_query($conn, $queryy);
            echo '<samp>Reservation done successfully.</samp>';
        }else{
            echo '<samp>You can\'t reserve this car right now.</samp>';
        }
    }
?>