<?php include 'adminHeader.php' ?>
<?php include 'adminConn.php' ?>
<!-- after editing code -->
<?php 
if(!isset($_SESSION['login_user']))
{
  header("Location: adminLogin.php");
}
 $kindOfProperty=$_GET['type'];
 $propid=$_GET['id'];
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    //$kindOfProperty = $_POST['gridRadios'];
    $sellType = $_POST['gridRadiosSale'];
    $propertyType = $_POST['propertyType'];
    $bldgName = $_POST['bldgName'];
    $location = $_POST['location'];
    $area = $_POST['area'];
    $flatType = $_POST['flatType'];
    $price = $_POST['price'];
    $description = $_POST['description'];
     //echo $kindOfProperty," ",$sellType," ",$propertyType," ",$bldgName," ",$location," ",$area," ",$flatType," ",$price," ",$description;
     //$target_dir = "images/";
    //   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    //   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //    $propertyImage = basename( $_FILES["fileToUpload"]["name"]);
    //   // echo $propertyImage;
    // } else {  
    //   echo "Sorry, there was an error uploading your file.";
    // }

    if($kindOfProperty == "commercial"){
      $sql = "update commercialproperty set BuyRent='$sellType',
      PropertyType='$propertyType', BuildingName='$bldgName',
      Location='$location',Area=$area,Price=$price,Description='$description'
       where Commercialid=$propid";
      

      if (mysqli_query($conn, $sql)) {
          echo "<script>alert(' Property record Updated successfully')</script>";
      } else {
          echo mysqli_error($conn);
          echo "<script>alert('Unable to update Please try again')</script>";
      }
  
    }
    else if($kindOfProperty == "residential"){
      $sql = "update residentialproperty set 
      BuyRent='$sellType',PropertyType='$propertyType',
      BuildingName='$bldgName',Location='$location',
      Area='$area',FlatType='$flatType',Price='$price',Description='$description'
      where PropertyId=$propid";
       

      if (mysqli_query($conn, $sql)) {
          echo "<script>alert('New Property record added successfully')</script>";
          //header("Location: adminHome.php");
      } else {
          echo "<script>alert('Unable to add Please try again')</script>";
      }
    }
   
    //mysqli_close($conn);

  }
?>
<!-- showing actual data before editing code -->
<?php 
     
       $kindOfProperty=$_GET['type'];
      $propid=$_GET['id'];
      $flatType="";
        if($kindOfProperty == "commercial"){
          // echo"<script type=text/javascript>
          //     alert('fjhdbf');
          //     document.getElementById('flattype').disabled='true';
          // </script>";

            $sql = "SELECT * FROM commercialproperty where Commercialid=$propid";
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
                 
                  
              }
          } else {
              echo "0 results";
          }
      }
     
        //mysqli_close($conn);
     
?>

    <div class="container col-sm-8" style="margn:0 auto; ">
      <form method="post" action="" enctype="multipart/form-data">
      <div class="form-group row">
         
          <div class="col-sm-4" style="margin:auto">
            <img src ="<?php echo "./images/$propertyImage"?> " width="300" height="200"/>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label"
            >Sell Type</label
          >
          <div class="col-sm-10">
            <input
              type="text"
              class="form-control"
              id="inputEmail3"
              placeholder="Enter buy or rent"
              name="gridRadiosSale"
              value='<?php echo "$sellType";?>'
            />
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label"
            >Property Type</label
          >
          <div class="col-sm-10">
            <input
              type="text"
              class="form-control"
              id="inputEmail3"
              placeholder="Enter office /shop /flat"
              name="propertyType"
              value='<?php echo "$propertyType";?>'
            />
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label"
            >Building Name</label
          >
          <div class="col-sm-10">
            <input
              type="text"
              class="form-control"
              id="inputEmail3"
              placeholder="Enter Building Name here"
              name="bldgName"
              value='<?php echo "$bldgName";?>'
            />
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label"
            >Location</label
          >
          <div class="col-sm-10">
            <input
              type="text"
              class="form-control"
              id="inputEmail3"
              placeholder="Enter Location Name here"
              name="location"
              value='<?php echo "$location";?>'
            />
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Area</label>
          <div class="col-sm-10">
            <input
              type="text"
              class="form-control"
              id="inputEmail3"
              placeholder="Enter Area Name here"
              name="area"
              value='<?php echo "$area";?>'
            />
          </div>
        </div>
        <div class="form-group row" id="myDIV">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Flat Type</label>
          <div class="col-sm-10">
            <input
              type="text"
              class="form-control"
              id="flat"
              placeholder="Enter 1RK / 1BHK / 2BHK"
              name="flatType"
              value='<?php echo "$flatType";?>'
            />
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
          <div class="col-sm-10">
            <input
              type="text"
              class="form-control"
              id="inputEmail3"
              placeholder="Enter Price here"
              name="price"
              value='<?php echo "$price";?>'
            />
          </div>
        </div>
        <div class="form-group row">
          <label
            for="exampleFormControlTextarea1"
            class="col-sm-2 col-form-label"
            >Description</label
          >
          <div class="col-sm-10">
            <textarea
              class="form-control"
              id="exampleFormControlTextarea1"
              rows="3"
              name="description"
              
            ><?php echo "$description";?></textarea>
          </div>
        </div>
        <!-- <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label"
            >Property Photo</label
          >
          <div class="col-sm-10">
            <input
              type="file"
              class="form-control-file"
              id="exampleFormControlFile1"
              name="fileToUpload"
            />
          </div>
        </div> -->
        <div class="form-group row">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary btn-block">Update Property</button>
          </div>
        </div>
      </form>
    </div>
    <?php 
     
     $kindOfProperty=$_GET['type'];
     $propid=$_GET['id'];
     $flatType="";
       if($kindOfProperty == "commercial"){
         echo"<script type=text/javascript>
             
         document.getElementById('myDIV').style.display = 'none';
         </script>";
       }
    ?>
   
    <?php include 'adminFooter.php' ?>