<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit CAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="fromEdit.css">
</head>
<body class="edit">
<form method="POST" action="editCar.php">
    <label >Enter plate number of car to be edited </label>
    <br>
    <input type="text" id="car Id" name="carId" required>
    <br>
    <br>
    <br>
    <label >Enter car's new condition</label>
    <br>
    <select name="selectStatus" id="selectStatus">
        <option value="good" name="good" id="good">Good</option>
        <option value="out of service" name="outOfService" id="outOfService">Out of service</option>
    </select>
    <br>
    <br>
    <button type="submit" class="btn btn-primary">Edit CAR</button>
</form>
<br>
<input type="button" id="myBtn" value="Go Back" class="btn btn-primary">
    <script>
        var btn = document.getElementById('myBtn');
        btn.addEventListener('click', function() {
        document.location.href = 'admin.php';
        });
</script>
</body>
</html>