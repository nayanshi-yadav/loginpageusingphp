<?php
$login=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include 'partials/_dbconnect.php';
  $username=$_POST['username'];
  $password=$_POST['password'];

  $sql="select * from users where username ='$username' ";
  $result=mysqli_query($conn,$sql);
  
  $num= mysqli_num_rows($result);
  if($num==1){
    while($row=mysqli_fetch_assoc($result)){
      if(password_verify($password,$row['password'])){

          $login=true;
          session_start();
          $_SESSION['loggedin']=true;
          $_SESSION['username']=$username;
          header("location: welcome.php");
  }
  else{
    $showError=true;
  }
}
  }
  else{
    $showError=true;
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <?php require "partials/_nav.php" ?>
    <div class="container">
        <h1>Log In to Our website</h1>
<?php
  if($login){
       echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>You are logged in .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
  if($showError){
    echo' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error:</strong>Invalid credentials ,Please try again.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
?>
                    <form  action="/loginsystem/login.php" method="post">
            <div class="mb-3 col-md-6">
                <label for="username" >Username</label>
                <input type="name" name="username" class="form-control" id="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                
            </div>
           
            
           
            <button type="submit" class="btn btn-primary">Log In</button>
            </form>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>