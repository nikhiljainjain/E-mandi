
<?php 
include("header.php");
?>

    <div class="row" style="margin-top:10px;">
      <div class="small-12">
          
          <?php 
            if (empty($_GET["msg"])){
                echo "<h1><b>Success</b></h1><p>You have purchased a product, then please check your spam in email for the receipt.</p>";
            }else{
                echo "<h1>Attention</h1><p>". $_GET["msg"] ."</p>";
            }
          ?>
      </div>
    </div>


<?php 
include("footer.php");
?>