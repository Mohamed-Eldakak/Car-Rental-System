<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="loginStyle.css">
</head>

<body>
    <section class="container-fluid bg">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <form method="post" id="formid" action="">
                        <input type="text" name="FirstName" id="FirstName" placeholder="First Name" required class="form-control">
                        <br>
                        <input type="text" name="LastName" id="LastName" placeholder="Last Name" required class="form-control">
                        <br>
                        <input type="text" name="mail" id="mail" placeholder="E-mail" required class="form-control">
                        <br>
                        <input type="password" name="pass" id="pass" placeholder="Password" required class="form-control">
                        <br>
                        <input type="password" name="pass2" id="pass2" placeholder="Confirm Password" required class="form-control">
                        <br>
                        <label for="">Gender</label>
                        <br>
                        <select name="gender" id="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <br>
                        <select name="city" id="city" class="form-control">
                        <option value="">Select City</option>  
                        <?php
                            include "config.php";
                            $sql="SELECT * FROM city";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result)){
                                ?>
                                <option value="<?php echo $row['cid']; ?>"><?php echo $row['cname'] ?></option>
                                <?php 
                                }
                        ?>
                        </select>
                        <br>
                        <input type="text" name="mobileno" id="mobileno" placeholder="Mobile number" required class="form-control">
                        <br>
                        <input type="text" name="Bankno" id="Bankno" placeholder="Bank Number" required class="form-control">
                        <br>
                        <p class="question">Already have an account? <A HREF="index.php" class="goto">Login</A></p>
                        <input type="submit" id="submit" name="submit">
                    </form>
                </div>
            </section>
        </section>
    </section>

    <script>
        var form = document.getElementById('formid');
        form.onsubmit = function x(event) {
            var fname = document.getElementById('FirstName').value;
            var lname = document.getElementById('LastName').value;
            var x = emailValidation();
            var y = passwordValidation();
            var f = isNumber(fname);
            var l = isNumber(lname);
            return x && y && l && f;
        }
        function passwordValidation() {
            var pass = document.getElementById('pass').value;
            var pass2 = document.getElementById('pass2').value;
            if (pass != pass2) {
                alert("Passwords doesn't match");
                return false;
            }
            return true;
        }
        function emailValidation() {
            var mail = document.getElementById('mail').value;
            var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (regex.test(mail)) {
                return true
            }
            else {
                alert("In valid E-mail")
                return false
            }
        }
        function isNumber(n) {
            if(isNaN(n)){
                return true;
            }else{
                alert('Can\'t be a number');
                return false;
            }
        }
    </script>
</body>

</html>
<?php
include "config.php";
if(isset($_POST['submit'])){
$fname = $_POST['FirstName'];
$lname = $_POST['LastName'];
$email = $_POST['mail'];
$pass = $_POST['pass'];
$gender = $_POST['gender'];
$city = $_POST['city'];
$mobile = $_POST['mobileno'];
$bank = $_POST['Bankno'];
$sql1= "SELECT * FROM users WHERE email = '{$email}'";
$result = mysqli_query($conn, $sql1);

if(mysqli_num_rows($result) == 0){
    $sql = "INSERT INTO users (`fname`, `lname`, `email`, `gender`, `cid`, `mobileno`, `PASSWORD`,`BankNo`) 
            VALUES ('$fname', '$lname', '$email', '$gender', '$city', '$mobile', '$pass','$bank')";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("User added")</script>';
      } else {
        echo "Error";
      }
    }
else{
        echo '<script>alert("User Already Exists")</script>';
    }
}
?>