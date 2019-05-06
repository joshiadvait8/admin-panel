<?php include 'adminHeader.php' ?>
<?php include 'adminConn.php' ?>
<?php 
if(!isset($_SESSION['login_user']))
{
  header("Location: adminLogin.php");
}

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $kindOfProperty = $_POST['gridRadios'];
    $sellType = $_POST['gridRadiosSale'];
    $propertyType = $_POST['propertyType'];
    $bldgName = $_POST['bldgName'];
    $location = $_POST['location'];
    $area = $_POST['area'];
    //$flatType = $_POST['flatType'];
    $price = $_POST['price'];
    $description = $_POST['description'];
     //echo $kindOfProperty," ",$sellType," ",$propertyType," ",$bldgName," ",$location," ",$area," ",$flatType," ",$price," ",$description;
     $target_dir = "images/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       $propertyImage = basename( $_FILES["fileToUpload"]["name"]);
      // echo $propertyImage;
    } else {  
      echo "Sorry, there was an error uploading your file.";
    }

    if($kindOfProperty == "commercial"){
      
      $sql = "INSERT INTO commercialproperty(BuyRent,PropertyType,BuildingName,Location,Area,Price,Description,image)
       VALUES ('$sellType', '$propertyType', '$bldgName','$location',$area,$price,'$description','$propertyImage')";

      if (mysqli_query($conn, $sql)) {
          echo "<script>alert('New Property record added successfully')</script>";
      } else {
          echo mysqli_error($conn);
          echo "<script>alert('Unable to add Please try again')</script>";
      }
  
    }
    else if($kindOfProperty == "residential"){
      $flatType = $_POST['flatType'];
      $sql = "INSERT INTO residentialproperty(BuyRent,PropertyType,BuildingName,Location,Area,FlatType,Price,Description,image)
       VALUES ('$sellType', '$propertyType', '$bldgName','$location','$area','$flatType','$price','$description','$propertyImage')";

      if (mysqli_query($conn, $sql)) {
          echo "<script>alert('New Property record added successfully')</script>";
      } else {
          echo "<script>alert('Unable to add Please try again')</script>";
      }
    }
   
    mysqli_close($conn);

  }
?>
<script>
funcdisable = () => {document.getElementById('flattypeid').disabled=true;}
funcEnable = () => {document.getElementById('flattypeid').disabled=false;}
</script>
    <div class="container col-sm-8" style="margn:0 auto; ">
      <form method="post" action="" enctype="multipart/form-data">
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
                  onClick = "funcdisable()"
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
                  onClick = "funcEnable()"
                />
                <label class="form-check-label" for="gridRadios2">
                  Residential
                </label>
              </div>
            </div>
          </div>
        </fieldset>
        <fieldset class="form-group">
          <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Sell Type</legend>
            <div class="col-sm-10">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="gridRadiosSale"
                  id="gridRadios1"
                  value="buy"
                  
                />
                <label class="form-check-label" for="gridRadios1">
                  Buy
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="gridRadiosSale"
                  id="gridRadios2"
                  value="rent"
                />
                <label class="form-check-label" for="gridRadios2">
                  Rent
                </label>
              </div>
            </div>
          </div>
        </fieldset>
        <div class="form-group row">
          <label for="sel1" class="col-sm-2 col-form-label">Property Type</label>
          <div class="col-sm-2">
            <select class="form-control" id="proptypeid" name="propertyType">
              <option>--Select--</option>
              <option>Shop</option>
              <option>Flat</option>
              <option>Office</option>
            </select>
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
              placeholder="Enter Area in Sq.ft"
              name="area"
            />
          </div>
        </div>
        <div class="form-group row">
          <label for="sel1" class="col-sm-2 col-form-label">Flat Type</label>
          <div class="col-sm-2">
            <select class="form-control" id="flattypeid" name="flatType">
              <option>--Select--</option>
              <option>1RK</option>
              <option>1BHK</option>
              <option>2BHK</option>
              <option>3BHK</option>
            </select>
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
            ></textarea>
          </div>
        </div>
        <div class="form-group row">
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
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary btn-block">Add Property</button>
          </div>
        </div>
      </form>
    </div>
    <?php include 'adminFooter.php' ?>