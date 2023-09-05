<!-- connect database  -->
<?php
include('../includes/connect.php');
session_start();

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    echo $order_id;
    $select_order="SELECT * FROM `user_orders` WHERE order_id = $order_id";
    $result_order = mysqli_query($con, $select_order);
    $order = mysqli_fetch_assoc($result_order);
    $invoice_number = $order['invoice_number'];
    $amount_due = $order['amount_due'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- bootstrap link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body class="bg-secondary">
    <div class="container my-5 text-center">
        <h1 class="text-light">Confirm Payment</h1>
        <div class="form-outline w-50 mx-auto my-4">
            <input type="text" class="form-control w-50 mx-auto" name="invoice_number" value="<?php echo $invoice_number?>">
        </div>
        <div class="form-outline w-50 mx-auto my-4">
            <label for="" class="text-light pb-2">Amount</label>
            <input type="text" class="form-control w-50 mx-auto" name="amount" value="<?php echo $amount_due?>">
        </div>
        <div class="form-outline w-50 mx-auto my-4">
            <select name="payment_mode" id="" class="form-select w-50 mx-auto">
<option value="">Select an option</option>
<option value=""></option>
<option value="">Paypal</option>
<option value="">Cash on Delivery</option>
<option value="">Pay offline</option>
            </select>
        </div>
        <div class="form-outline w-50 mx-auto my-4">
            <input type="submit" class="btn btn-info" value="Confirm" name="confirm_payment">
        </div>
    </div>
</body>
</html>