<?php include 'adminHeader.php' ?>
<?php include 'adminConn.php' ?>
<script>

</script>
<?php
//session_start();
  if(!isset($_SESSION['login_user']))
  {
    header("Location: adminLogin.php");
  }
  
  
?>

    <div class="container" style="margin-top:1%">
    <form method="post" action="">
    <fieldset class="form-group">
          <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">
              What kind of Property ?
            </legend>
            <div class="col-sm-10">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="gridRadios"
                  id="gridRadios1"
                  value="commercial"
                onclick = "javascript:submit()"
                />
                <label class="form-check-label" for="gridRadios1">
                  Commercial
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="gridRadios"
                  id="gridRadios2"
                  value="residential"
                  onclick = "javascript:submit()"
                />
                <label class="form-check-label" for="gridRadios2">
                  Residential
                </label>
              </div>
            </div>
          </div>
        </fieldset>
        
        </form>
        <?php 
         if($_SERVER["REQUEST_METHOD"] == "POST"){
            $kindOfProperty = $_POST['gridRadios'];
    
        echo "<h3 class='text-center'>$kindOfProperty property details</h3>";
         }
        ?>
    <table id="mytable" class="table table-striped" style="">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">BuyRent</th>
      <th scope="col">PropertyType</th>
      <th scope="col">BuildingName</th>
      <th scope="col">Location</th>
      <th scope="col">Area</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Flat Type</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
  <?php 
     if($_SERVER["REQUEST_METHOD"] == "POST"){
        $kindOfProperty = $_POST['gridRadios'];

        if($kindOfProperty == "commercial"){
            $sql = "SELECT * FROM commercialproperty";
            $result = mysqli_query($conn, $sql);
            //echo "vnknvknmv",$result;
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['Commercialid'];
                    $sellType = $row['BuyRent'];
                    $propertyType = $row['PropertyType'];
                    $bldgName = $row['BuildingName'];
                    $location = $row['Location'];
                    $area = $row['Area'];                    
                    $price = $row['Price'];
                    $description = $row['Description'];  
                    $propertyImage =$row['image'] ;
                   
                    echo "<tr>
                    <th scope='row'>$id</th>
                    <td> $sellType</td>
                    <td> $propertyType</td>
                    <td>$bldgName</td>
                    <td>$location</td>
                    <td>$area</td>
                    <td>$price</td>
                    <td>$description</td>
                    <td></td>
                    <td><a href='edit.php?id=$id&type=$kindOfProperty' class='btn btn-warning'>Edit</a></td>
                     <td><a href='delete.php?id=$id&type=$kindOfProperty' class='btn btn-danger'>Delete</a></td>
                  </tr>";
                }
            } else {
                echo "0 results";
            }
        }
        else if($kindOfProperty == "residential"){
            $sql = "SELECT * FROM residentialproperty";
            $result = mysqli_query($conn, $sql);
            //echo "vnknvknmv",$result;
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['PropertyId'];
                    $sellType = $row['BuyRent'];
                    $propertyType = $row['PropertyType'];
                    $bldgName = $row['BuildingName'];
                    $location = $row['Location'];
                    $area = $row['Area'];  
                    $flatType = $row['FlatType'];                  
                    $price = $row['Price'];
                    $description = $row['Description'];  
                    $propertyImage =$row['image'] ;
                   
                    echo "<tr>
                    <th scope='row'>$id</th>
                    <td> $sellType</td>
                    <td> $propertyType</td>
                    <td>$bldgName</td>
                    <td>$location</td>
                    <td>$area</td>
                    <td>$price</td>
                    <td>$description</td>
                    <td>$flatType</td>
                    <td><a href='edit.php?id=$id&type=$kindOfProperty' class='btn btn-warning'>Edit</a></td>
                     <td><a href='delete.php?id=$id&type=$kindOfProperty' class='btn btn-danger'>Delete</a></td>
                  </tr>";
                }
            } else {
                echo "0 results";
            }
        }
       
       
        
        mysqli_close($conn);
     }
    
?>
    
    
  </tbody>
</table>

<a href="adminAddProperty.php" class="btn btn-primary btn-block">Looking for Adding New Property ?</a>
  </div>

<?php include 'adminFooter.php' ?>
