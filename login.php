
<?php
  if(!isset($_SESSION)) {  session_start(); }
  require "./functions/database_functions.php";
  $conn = db_connect();

?>
<?php
if(isset($_POST['submit'])){
   $email=$_POST['email'];
  $password=$_POST['password'];

$query="SELECT * FROM users WHERE email='$email' AND password='$password' ";
$login= mysqli_query($conn,$query);

if(!$login){
  die("Query Failed" .mysqli_error($conn));
}
  header("Location:index.php");

while($row=mysqli_fetch_array($login)){
    
    $db_user_id=$row['customerid'];
    $db_username=$row['email'];
    $db_password=$row['password'];
  }
  if($email !==$db_username && $password !== $db_password){
    header("Location:login.php");
  
}else{
      header("Location:index.php");

}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>


    <title>Sign up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="css/loginStyle.css" />

  </head>


  <body>

    <div class="container">
      <h1>Login</h1><br>
      <img src="images/log_img.jpg">

      <form action="" method="POST">
        <div>
          <label for="u">User name</label>
          <input type="text" class="form-control" name="email" id="u" placeholder="User name"  required>
        </div>
        <div>
         <label for="inputPassword">Password</label>
         <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required>
       </div><br>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
         <h4>For Registration <a href="signup.php">Click Here</a> </h4>

      </form>

    </div>

  </body>

</html>
