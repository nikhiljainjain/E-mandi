<?php 

if(session_id() == '' || !isset($_SESSION)){session_start();}

include('config.php');

$pid = $_GET['product_id'];

$sql = "DELETE FROM products WHERE id=" .$pid;

$result = $mysqli->query($sql);

if (mysqli_affected_rows($result, $mysqli) > 0){
    header("location: products.php");
}else{
    $msg = "Product not available";
    header("location: success.php?msg=". $msg);
}

?>