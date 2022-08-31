<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Portal</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="select">
        <option selected value="">Select option</option>
        <option value="advancedSearchPage.php" name="advancedSearch" id="advancedSearch">Advanced Search</option>
        <option value="addCarPage.php" name="addCar" id="addCar">Add Car</option>
        <option value="editCarPage.php" name="EditCar" id="EditCar">Edit Car Status</option>
        <option value="reservations.php" id="reservations" name="reservations">Reservations</option>
        <option value="reports.php" id="reservations" name="reservations">Reports</option>
    </select>
    <button id="myBtn" class="btn btn-primary">Logout</button>
    <!-- log out-->
    <script>
        var btn = document.getElementById('myBtn');
        btn.addEventListener('click', function() {
        document.location.href = 'index.php';
        });
    </script>
    <script type="text/javascript">
        $(function(){
            $('#select').on('change',function(){
                var url=$(this).val();
                if(url){
                    window.location=url;
                }
                return false;
            })
        })
    </script>
</body>
</html>