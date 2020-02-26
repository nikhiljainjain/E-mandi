<?php

include("header.php");

if(!isset($_SESSION["username"])){
  header("location:index.php");
}
include 'config.php';
?>



    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>My COD Orders</h3>
        <hr>

        <?php
          
          $result = null;
          if ($_SESSION["type"] == "user"){
                $user = $_SESSION["username"];
                $result = $mysqli->query("SELECT * from orders where email='".$user."'");
          }else {
              $result = $mysqli->query("SELECT * FROM ORDERS");
          }
          
          if($result) {
            while($obj = $result->fetch_object()) {
              //echo '<div class="large-6">';
              echo '<p><h4>Order ID ->'.$obj->id.'</h4></p>';
              echo '<p><strong>Date of Purchase</strong>: '.$obj->date.'</p>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Product Name</strong>: '.$obj->product_name.'</p>';
              echo '<p><strong>Price Per Unit</strong>: '.$obj->price.'</p>';
              echo '<p><strong>Units Bought</strong>: '.$obj->units.'</p>';
              echo '<p><strong>Total Cost</strong>: '.$currency.$obj->total.'</p>';
              if ($_SESSION["type"] == "admin") echo '<p><strong>Customer Email Id</strong>: '.$obj->email.'</p>';
              //echo '</div>';
              //echo '<div class="large-6">';
              //echo '<img src="images/products/sports_band.jpg">';
              //echo '</div>';
              echo '<p><hr></p>';

            }
          }
        ?>
      </div>
    </div>


<?php 
include("footer.php");
?>