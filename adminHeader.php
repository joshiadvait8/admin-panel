<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>Rajhans | Admin</title>
    <style>
      .container{
        /* border:solid #A4B0BD 1px; */
        
        border-radius: 20px;
        margin-top:5%;
        /* margin-left:30%;  */

      }
      input{
        margin:0 auto;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="adminHome.php">Rajhans Real Estate</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="adminHome.php"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminAddProperty.php">Add Property</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-primary" id="logoutbtnid" href="logout.php" style="color:#fff;display:none">Logout</a>
          </li>
          
        </form>
      </div>
    </nav>

    <?php
  session_start();
  if(isset($_SESSION['login_user']))
  {
      echo "<script>document.getElementById('logoutbtnid').style.display=''</script>";
  }
 ?>