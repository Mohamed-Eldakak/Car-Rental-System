<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADD CAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="addCar.css">
</head>
<body>
<form method="POST" action="addCar.php" id="myFormid">
    <label >Enter car id</label>
    <br>
    <input type="text" id="id" name="id" required>
    <br>
    <label >Enter car name</label>
    <br>
    <input type="text" id="name" name="name" required>
    <br>
    <label >Enter car model</label>
    <br>
    <input type="text" id="model"  name="model" required>
    <br>
    <label >Enter car plate no</label>
    <br>
    <input type="text" id="plate no"  name="plateNo" required>
    <br>
    <label >Enter car status</label>
    <br>
    <select name="status" id="status">
        <option value="active" name="active" id="active">Active</option>
        <option value="reserved" name="reserved" id="reserved">Reserved</option>
    </select>
    <br>
    <label >Enter car condition</label>
    <br>
    <select name="condition" id="condition">
        <option value="good" name="good" id="good">Good</option>
        <option value="out of service" name="outOfService" id="outOfService">Out of service</option>
    </select>
    <br>
    <br>
    <select name="warehouse" id="warehouse">
            <option value="">Select Warehouse</option>  
            <?php
                include "config.php";
                $sql="SELECT * FROM warehouse";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row['location']; ?>" id="<?php echo $row['location']; ?>"><?php echo $row['location'] ?></option>
                    <?php 
                    }
            ?>
    </select>
    <br>
    <label >Enter car color</label>
    <br>
    <input type="text" id="color"  name="color" required>
    <br>
    <label >Enter car price</label>
    <br>
    <input type="text" id="price"  name="price" required>
    <br>
    <br>
    <button type="submit" class="btn btn-primary">ADD CAR</button>
</form>
<script>
        var form = document.getElementById('myFormid');
        form.onsubmit = function x(event) {
            var carid=document.getElementById('id').value;
            var carprice=document.getElementById('price').value;
            var x = isNumber(carid);
            var y = isNumber(carprice);
            if((x && y) == false){
                alert("Must be a number");
            }
            return x && y;
        }
        function isNumber(n) {
            if(isNaN(n)){
                return false;
            }else{
                return true;
            }
        }
    </script>
    <input type="button" id="myBtn" value="Go Back" class="btn btn-primary">
    <script>
        var btn = document.getElementById('myBtn');
        btn.addEventListener('click', function() {
        document.location.href = 'admin.php';
        });
</script>
</body>
</html>