<?php
include('../includes/connect.php');
include('../functions/common_functions.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}

$total_price = 0;
$total_quantity =0;
  $get_ip_address = getIPAddress();
  $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
  $result_cart = mysqli_query($con, $cart_query);
//   $total_product = mysqli_num_rows($result_cart); 
  while ($row_data = mysqli_fetch_array($result_cart)) {
    $product_id = $row_data['product_id'];
    $product_quantity = $row_data['quantity'];
    $product_query = "SELECT * FROM `products` WHERE product_id=$product_id";
    $result_products = mysqli_query($con, $product_query);
    $cart_product = mysqli_fetch_assoc($result_products);
    $product_price = $cart_product['product_price'];
    $product_price_sum = $product_price * $product_quantity;

    // while ($row_product_price = mysqli_fetch_array($result_products)) {
    //   $product_price = array($row_product_price['product_price']);
    //   $product_price_sum = array_sum($product_price);
    //   // echo "$product_price_sum";
    // }
    $total_price += $product_price_sum;
    $total_quantity += $product_quantity;
  }
  echo "$total_price</br>";
  echo $total_quantity;

  $invoice_number = mt_rand();
  $order_status = 'pending';

// insert_order 
$insert_order = "INSERT INTO `user_orders` (user_id,amount_due,invoice_number,total_products,order_date,order_status) VALUES ($user_id,$total_price,$invoice_number,$total_quantity,NOW(),'$order_status')";
$result_order = mysqli_query($con,$insert_order);
if($result_order){
    echo "<script>alert('Order placed sucessfully')</script>";
    echo "<script>window.open('./profile.php','_self')</script>";
}
?>