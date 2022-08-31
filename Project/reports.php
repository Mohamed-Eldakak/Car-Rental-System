<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <title>Reports</title>
</head>
<body>
<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="select">
  <option selected value="">Select option</option>
  <option value="speceficPeriodCust.php" name="speceficPeriodCust" id="speceficPeriodCust">All  reservations  within  a  specified  period  including  all  car  and  customer information</option>
  <option value="speceficPeriodNoCust.php" name="speceficPeriodNoCust" id="speceficPeriodNoCust">All  reservations  of   any   car  within  a  specified  period  including  all  car information</option>
  <option value="getCarStatus.php" id="getCarStatus" name="getCarStatus">The status of all cars on a specific day</option>
  <option value="customerRes.php" id="customerRes" name="customerRes">All  reservations  of  specific  customer including  customer  information,  car model and plate id</option>
  <option value="dailyPayments.php" id="dailyPayments" name="dailyPayments">Daily payments within specific period</option>
</select>
<script type="text/javascript">
    $(function(){
        $('#select').on('change',function(){
            var url=$(this).val();
            console.log(url);
            if(url){
                window.location=url;
            }
            return false;
        })
    })
</script>
</body>
</html>