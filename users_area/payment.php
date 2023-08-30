<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Ecommerce</title>
</head>
<body>
    <div class="container">
        <?php
        $user_ip= getIPAddress();

        $select_user="SELECT * FROM `user_table` where user_ip='$user_ip'";
        $result_user=mysqli_query($con,$select_user);
        $user=mysqli_fetch_assoc($result_user);
        $user_id=$user['user_id'];
        ?>
        <h1 class="text-center text-info">Payment options</h1>
        <div class="row justify-content-around align-items-center w-75 mx-auto my-5">
            <a href="https://www.paypal.com" target="_blank" class="col-md-6"><img src="./user_images/artist2.jpg" alt=""></a>
            <a href="order.php?user_id=<?php echo $user_id?>" class="col-md-6 text-center"><h2>Pay offline</h2></a>
        </div>
    </div>
</body>
</html>