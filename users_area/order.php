<?php
include('../includes/connect.php');
include('../functions/common_functions.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}

$total_price = 0;
  $get_ip_address = getIPAddress();
  $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
  $result_cart = mysqli_query($con, $cart_query);
  while ($row_data = mysqli_fetch_array($result_cart)) {
    $product_id = $row_data['product_id'];
    $product_quantity = $row_data['quantity'];
    $product_query = "SELECT * FROM `products` WHERE product_id=$product_id";
    $result_products = mysqli_query($con, $product_query);
    $cart_product = mysqli_fetch_assoc($result_products);
    $product_price_sum = $product_price * $product_quantity;

    // while ($row_product_price = mysqli_fetch_array($result_products)) {
    //   $product_price = array($row_product_price['product_price']);
    //   $product_price_sum = array_sum($product_price);
    //   // echo "$product_price_sum";
    // }
    $total_price += $product_price_sum;
  }
  echo "$total_price";
?>