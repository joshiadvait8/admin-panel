<?php include 'adminHeader.php'?>
<?php include 'adminConn.php' ?>
<?php
   if($_SERVER["REQUEST_METHOD"] == "POST"){
    //session_start();
    // Store Session Data
    
  $email = $_POST['email'];
  $passwd = $_POST['passwd'];
    // Initializing Session with value of PHP Variable
  // echo "email = ",$email;
  // echo "pass = ",$passwd;
  $sql = "SELECT * from adminLogin where email='$email' and passwd='$passwd'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
      // logged in
      header("Location: adminHome.php");
      $_SESSION['login_user']= $email;
      //echo "email = ",$email;
  } else {
    //pass   it back login failed
    echo "<script>alert('Incorect username or password')</script>";
    //header("Location: adminLogin.php");
    //echo "email = ",$email;
  }
  
  mysqli_close($conn);
}

?>


    <div class="container col-md-4 col-sm-3 text-center" style="">
      <h3 class="text-center">Welcome Admin</h3>
      <form method="post" action="">
        <div class="form-group row text-center">
          
          <div class="col-sm-10" style="margin: auto">
            <input
              type="text"
              class="form-control"
              id="inputEmail3"
              placeholder="Email"
              name="email"
            />
          </div>
        </div>
        <div class="form-group row">
          
          <div class="col-sm-10" style="margin: auto" >
            <input
              type="password"
              class="form-control"
              id="inputPassword3"
              placeholder="Password"
              name="passwd"
            />
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10" style="margin: auto">
            <button type="submit"  class="btn btn-primary btn-block">Sign in</button>
          </div>
        </div>
      </form>
    </div>

<?php include 'adminFooter.php' ?>