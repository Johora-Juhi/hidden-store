<?php
if(isset($_GET['delete_order'])){
    $delete_id = $_GET['delete_order'];
    $delete_order= "DELETE FROM `user_orders` where order_id=$delete_id";
    $result_delete = mysqli_query($con,$delete_order);
    if($result_delete){
        echo "<script>alert('Order deleted')</script>";
        echo "<script>window.open('./index.php?all_orders','_self')</script>";
    }
}
?>