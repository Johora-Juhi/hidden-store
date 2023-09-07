<?php
if (isset($_GET['delete_brand'])) {
    $delete_id = $_GET['delete_brand'];
    $delete_barnd = "DELETE FROM `brands` where brand_id = $delete_id ";
    $result_delete = mysqli_query($con, $delete_barnd);
    if ($result_delete) {
        $delete_product = "DELETE FROM `products` where barnd_id =$delete_id";
        $result = mysqli_query($con, $delete_product);
        if ($result) {
            echo "<script>alert('Brand deleted')</script>";
            echo "<script>window.open('index.php?view_brands','_self')</script>";
        }
    }
}
