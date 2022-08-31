<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car renting</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="mbappe.css">
</head>
<body>
    <label>Search by Car :</label>
    <br>
    <br>
    <label>Plate Number:</label>
    <br>
    <input type="text" id="plateNo" name="plateNo" >
    <br>
    <label>Car Model:</label>
    <br>
    <input type="text" id="model" name="model">
    <br>
    <label>Car Name:</label>
    <br>
    <input type="text" id="carname" name="carname">
    <br>
    <label>Car Status:</label>
    <br>
    <input type="text" id="carstatus" name="carstatus" >
    <br>
    <label>Car Condition:</label>
    <br>
    <input type="text" id="condition" name="condition">
    <br>
    <label>Car Color:</label>
    <br>
    <input type="text" id="carcolor" name="carcolor">
    <br>
    <label>Car Price:</label>
    <br>
    <input type="text" id="carprice" name="carprice">
    <br>
    <br>
    <label>Search by Customer :</label>
    <br>
    <br>
    <label>Customer first name :</label>
    <br>
    <input type="text" id="fname" name = "fname">
    <br>
    <label>Customer last name :</label>
    <br>
    <input type="text" id="lname" name = "lname">
    <br>
    <label>Customer email :</label>
    <br>
    <input type="text" id="email" name = "email">
    <br>
    <label>Customer mobile:</label>
    <br>
    <input type="text" id="mobile" name = "mobile">
    <br>
    <br>
    <label>Search by Reservation Day :</label>
    <br>
    <br>
    <label>Reservation Day :</label>
    <br>
    <input type="date" id="resDay" name = "resDay">
    <br>
    <label>Reservation End :</label>
    <br>
    <input type="date" id="endDay" name = "endDay">
    <br>
    <br>
    
 <table class="table table-hover" id="car table">
      <thead>
        <tr>
            <th scope="col">Car ID</th>
            <th scope="col">Car Name</th>
            <th scope="col">Car Model</th>
            <th scope="col">Car Color</th>
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
      <tbody id="output">     
      </tbody>
    </table>
    <br>
    <br>
    <!--Search with ajax-->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#plateNo,#model,#carname,#carstatus,#condition,#carcolor,#carprice,#fname,#lname,#email,#mobile,#resDay,#endDay").on("keyup change",function(){
                $.ajax({
                    type:'POST',
                    url:'advancedSearch.php',
                    data:{
                        plateNo:$("#plateNo").val(),
                        model:$("#model").val(),
                        carname:$("#carname").val(),
                        carstatus:$("#carstatus").val(),
                        condition:$("#condition").val(),
                        carcolor:$("#carcolor").val(),
                        carprice:$("#carprice").val(),

                        fname:$("#fname").val(),
                        lname:$("#lname").val(),
                        email:$("#email").val(),
                        mobile:$("#mobile").val(),

                        resDay:$("#resDay").val(),
                        endDay:$("#endDay").val(), 
                    },
                    success:function(data){
                        $("#output").html(data);
                    }
                })
            })
        })
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