<?php
if (isset($_GET['delete_category'])) {
    $delete_id = $_GET['delete_category'];
    $delete_barnd = "DELETE FROM `categories` where category_id = $delete_id ";
    $result_delete = mysqli_query($con, $delete_barnd);
    if ($result_delete) {

        $delete_product = "DELETE FROM `products` where category_id =$delete_id";
        $result = mysqli_query($con, $delete_product);
        if ($result) {
            echo "<script>alert('category deleted')</script>";
            echo "<script>window.open('index.php?view_categories','_self')</script>";
        }
    }
}
