<?php
$shop_name = "eMandi";
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $shop_name; ?></title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php"><?php echo $shop_name; ?></a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
            <li><a href="index.php">Home</a></li>
          
          <li><a href="products.php">Our Products</a></li>
            <?php 
                 if (isset($_SESSION["type"])){
                    if ($_SESSION["type"] == "user"){
                     echo '<li><a href="cart.php">View Cart</a></li><li><a href="orders.php">My Orders</a></li>';   
                        echo '<li><a href="account.php">Account Details</a></li>';
                    }
                    else if ($_SESSION["type"] == "admin"){
                     echo '<li><a href="orders.php">Orders</a></li>';   
                        echo '<li><a href="account.php">Edit Products</a></li>';
                    }
                     echo '<li><a href="logout.php">Log Out</a></li>';
                 }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="about.php">About Us</a></li>
        </ul>
      </section>
    </nav>