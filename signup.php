

<?php
  if(!isset($_SESSION)) {  session_start(); }
  require "./functions/database_functions.php";
  $conn = db_connect();

?>
<?php
if(isset($_POST['submit'])){
   $firstname = $_POST['firstname'];
   $lastname= $_POST['lastname'];
   $phone= $_POST['phone'];
   $email= $_POST['email'];
   $password= $_POST['password'];
  
 
  $query= "INSERT INTO users(firstname,lastname,phone,email,password) Values ('$firstname','$lastname','$phone','$email','$password')";
 
  $post_insert_query=mysqli_query($conn,$query);
  if(!$post_insert_query){
  die("Erroe".mysqli_error($conn));
 }
}
  ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="css/style.css" />

  </head>

  <body>



      <div class="container">
        <div>
          <h1>Welcome</h1>
          <img src="images/sign_img.jpg">
        </div>

        <form action="" method="POST">
             <div>
               <label for="f">First name</label>
               <input type="text" class="form-control" name="firstname" id="f" placeholder="First name" onchange="firstval()" required>
             </div>

             <div>
               <label for="l">Last name</label>
               <input type="text" class="form-control" name="lastname" id="l" placeholder="Last name" onchange="LNameVal()" required>
             </div>

             <div>
               <label for="p">Phone Number</label>
               <input type="text" class="form-control" name="phone" id="p" placeholder="Phone Number"  required>
             </div>

             <div>
               <label for="e">Email</label>
               <input type="text" class="form-control" name="email" id="e" placeholder="Email" oninput="t(this.value)" required>
                 <div class="valid-feedback">Looks good!</div>
                 <div class="invalid-feedback">Not a valid Email Address!</div>
             </div>

             <div>
              <label for="inputPassword">Password</label>
              <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required>
             </div>

             <div>
              <label for="conPassword">Confirm Password</label>
              <input type="password" class="form-control" id="conPassword" oninput="passVal(this.value)" placeholder="Password" required>
             </div>

             <br>


            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
         <h4>Already Registered? <a href="login.php">Login</a> </h4>

       </form>
      </div>

      <script>

      function firstval(){

        var firstName = document.getElementById("f").value;
        if (firstName == ""){
          $('#f').removeClass().addClass("form-control is-invalid");
        }else {
          $('#f').removeClass().addClass("form-control is-valid");
        }
      }

      function LNameVal(){

        var LName = document.getElementById("l").value;
        if (LName == ""){
          $('#l').removeClass().addClass("form-control is-invalid");
        }else {
          $('#l').removeClass().addClass("form-control is-valid");
        }
      }



      function passVal(val){

        var oldpass = document.getElementById("inputPassword").value;

        if ( !(oldpass == val) ){

          $('#conPassword').removeClass().addClass("form-control is-invalid");
		  $('#inputPassword').removeClass().addClass("form-control");

        }else {

          $('#inputPassword').removeClass().addClass("form-control is-valid");

          $('#conPassword').removeClass().addClass("form-control is-valid");
        }
      }

      function t(val) {

        if (  /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val) ) {

          $(".invalid-feedback").css("display", "none");
          $(".valid-feedback").css("display", "inline-block");
          $('#e').removeClass().addClass("form-control is-valid");

        }else {

          $(".valid-feedback").css("display", "none");
          $(".invalid-feedback").css("display", "inline-block");
          $('#e').removeClass().addClass("form-control is-invalid");
        }
      }


      </script>

  </body>

</html>
