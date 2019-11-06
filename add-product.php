<?php

include("header.php");

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"] == "user") {
  header("location:index.php");
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $target_dir = "./images/products/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] ;
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            $uploadOk = 0;
        }
        
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $name = $_POST["name"];
            $code = strtoupper($name);
            $desc = $_POST["benefit"];
            $qty = $_POST["quantity"];
            $price = $_POST["price"];
            $img = basename( $_FILES["fileToUpload"]["name"]);
            $q = "INSERT INTO PRODUCTS (product_code, product_name, product_desc, product_img_name, qty, price) VALUES ('$code', '$name', '$desc', '$img', '$qty', '$price')";
            $mysqli->query($q);
            header("location: products.php");
        } else {
            $msg = "Sorry, there was an error uploading your file.";
            header("location: success.php?msg=". $msg);
        }
    }
}
?>
<form method="POST" style="margin-top:30px;"  action="add-product.php" enctype="multipart/form-data">>
      <div class="row">
        <div class="small-8">

          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Name</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Potato" name="name">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Benefits</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" name="benefit">
            </div>
          </div>
            <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Quantity</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="11" name="quantity">
            </div>
          </div>
            <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Price</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="99" name="price">
            </div>
          </div>
            <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Image</label>
            </div>
            <div class="small-8 columns">
              <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" name="submit" value="Login" style="width: 100%;background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>
<?php
include("footer.php");
?>