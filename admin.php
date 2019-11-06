<?php

include("header.php");

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"] == "user") {
  header("location:index.php");
}

include 'config.php';
?>


    <div class="row" style="margin-top:10px;text-align:center">
      <div class="large-12">
          <?php 
            if ($_SESSION["type"] == "admin"){
                echo '<a href="add-product.php" class="button [secondary success alert]">Add Product</a>
              <br>';
            }
          ?>
        <a href="edit-product.php" class="button [secondary success alert]">Edit Product Quantity</a>
          <br>
          <a href="delete-product.php" class="button [secondary success alert]">Delete product </a>
          <br>

          
      </div>
    </div>

<?php
include("footer.php");
?>