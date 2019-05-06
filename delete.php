<?php include 'adminHeader.php' ?>
<?php include 'adminConn.php' ?>
<?php 
if(!isset($_SESSION['login_user']))
{
  header("Location: adminLogin.php");
}
$kindOfProperty=$_GET['type'];
$propid=$_GET['id'];
$flatType="";
  if($kindOfProperty == "commercial"){
      $sql = "delete from commercialproperty 
       where Commercialid=$propid";
      

      if (mysqli_query($conn, $sql)) {
          echo "<script>alert(' Property record deleted successfully')</script>";
      } else {
          echo mysqli_error($conn);
          echo "<script>alert('Unable to delete Please try again')</script>";
      }
  }
  else if($kindOfProperty == "residential"){
    $sql = "delete from residentialproperty 
    where PropertyId=$propid";
   

   if (mysqli_query($conn, $sql)) {
       echo "<script>alert(' Property record deleted successfully')</script>";
   } else {
       echo mysqli_error($conn);
       echo "<script>alert('Unable to delete Please try again')</script>";
   }
  }


 ?>
 <h3><a href="adminHome.php">Go Back to Home</a></h3>