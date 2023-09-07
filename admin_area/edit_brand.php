<h3 class="text-center text-success my-5">Edit Brand</h3>
<form action="" method="post" class="w-50 mx-auto text-center">
    <?php
    if (isset($_GET['edit_brand'])) {
        $edit_id = $_GET['edit_brand'];
        $select_brand = "SELECT * FROM `brands` where brand_id = $edit_id";
        $result = mysqli_query($con, $select_brand);
        $brand = mysqli_fetch_assoc($result);
        $brand_title = $brand['brand_title'];
    }
    if (isset($_POST['update_brand'])) {
        $brand_title = $_POST['brand_title'];
        $update_brand = "UPDATE `brands` set brand_title = '$brand_title' where brand_id=$edit_id";
        $result_update = mysqli_query($con, $update_brand);
        if ($result_update) {
            echo "<script>alert('brand updated')</script>";
            echo "<script>window.open('index.php?view_brands','_self')</script>";
        }
    }
    ?>
    <div class="form-outline">
        <label for="brand-title" class="form-label">Brand title</label>
        <input type="text" name="brand_title" id="brand-title" class="form-control mt-2 mb-4" value="<?php echo $brand_title ?>">
    </div>
    <div class="form-outline">
        <input type="submit" value="Update" name="update_brand" class="btn btn-info rounded-0">
    </div>
</form>