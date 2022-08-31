<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car renting system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="loginStyle.css">
  </head>
<body>
  <section class="container-fluid bg">
    <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-3">
        <div class="form-group">
            <form method="POST" action="checkLogin.php" class="form-container">
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
              </div>

              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>

              <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-primary">
                <input type="radio" name="role" id="admin" value="admin" autocomplete="off" required>Admin
              </label>

              <label class="btn btn-primary">
                <input type="radio" name="role" id="user" value="user" autocomplete="off" required>User
              </label>
              </div>
              <br>
              <br>
              <?php
                if(isset($_GET['error'])==true){
                  echo '<samp align="center">Incorrect username or password</samp><br>';
                }
              ?>
              <button type="submit" class="btn btn-primary">Submit</button>
              <p class="question">Don't have an account? <A HREF="register.php" class="goto">Sign Up</A></p>
          </form>
          </div>
      </section>
    </section>
  </section>
</body>
</html>
