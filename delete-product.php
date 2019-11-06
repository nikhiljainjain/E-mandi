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


    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <?php
          $result = $mysqli->query("SELECT * from products order by id asc");
          if($result) {
            while($obj = $result->fetch_object()) {
              echo '<div class="large-4 columns">';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<a href="delete.php?product_id='. $obj->id .'" class="button [secondary success alert]">Delete this</a>';
              echo '</div>';
            }
          }
        ?>



      </div>
    </div>

<?php
include("footer.php");
?>