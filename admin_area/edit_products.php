<?php
if (isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];
    $get_products = "SELECT * FROM `products` where product_id=$edit_id";
    $result = mysqli_query($con, $get_products);
    $products = mysqli_fetch_array($result);
    $product_id = $products['product_id'];
    $product_description = $products['product_description'];
    $product_keywords = $products['product_keywords'];
    $category_id = $products['category_id'];
    // select choosen category 
    $select_category = "SELECT * FROM `categories` where category_id = $category_id";
    $result_category = mysqli_query($con, $select_category);
    $category = mysqli_fetch_assoc($result_category);
    $category_title = $category['category_title'];
    $barnd_id = $products['barnd_id'];
    // select choosen category 
    $select_brand = "SELECT * FROM `brands` where brand_id = $barnd_id";
    $result_brand = mysqli_query($con, $select_brand);
    $brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $brand['brand_title'];
    $product_title = $products['product_title'];
    $product_image1 = $products['product_image1'];
    $product_image2 = $products['product_image2'];
    $product_image3 = $products['product_image3'];
    $product_price = $products['product_price'];
    $status = $products['status'];
}

?>
<h1 class="text-center">Edit Products</h1>
<!-- form  -->
<form action="" method="post" enctype="multipart/form-data">
    <!-- title  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <label for="product_title" class="form-label">Product Title</label>
        <input type="text" id="product_title" name="product_title" class="form-control" value="<?php echo $product_title ?>" placeholder="Enter product title" autocomplete="off">
    </div>
    <!-- description  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <label for="product_description" class="form-label">Product Description</label>
        <input type="text" id="product_description" name="product_description" class="form-control" value="<?php echo $product_description ?>" placeholder="Enter product description" autocomplete="off">
    </div>
    <!-- keywords  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <label for="product_keywords" class="form-label">Product Keywords</label>
        <input type="text" id="product_keywords" name="product_keywords" class="form-control" value="<?php echo $product_keywords ?>" placeholder="Enter product keywords" autocomplete="off">
    </div>
    <!-- category  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <select name="product_category" id="" class="form-select">
            <option value="<?php echo $category_id ?>" selected><?php echo $category_title ?></option>
            <?php
            $selct_categories = 'SELECT * FROM `categories`';
            $result_categories = mysqli_query($con, $selct_categories);
            while ($row_data = mysqli_fetch_assoc($result_categories)) {
                $category_title = $row_data['category_title'];
                $category_id = $row_data['category_id'];
                echo "<option value='$category_id'>$category_title</option>";
            }
            ?>
        </select>
    </div>
    <!-- brand  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <select name="product_brand" id="" class="form-select">
            <option value="<?php echo $barnd_id ?>" selected><?php echo $brand_title ?></option>
            <?php
            $selct_brands = 'SELECT * FROM `brands`';
            $result_brands = mysqli_query($con, $selct_brands);
            while ($row_data = mysqli_fetch_assoc($result_brands)) {
                $brand_title = $row_data['brand_title'];
                $brand_id = $row_data['brand_id'];
                echo "<option value='$brand_id'>$brand_title</option>";
            }
            ?>
        </select>
    </div>
    <!-- image1  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <label for="product_image1" class="form-label">Product Image 1</label>
        <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control">
            <img src="./product_images/<?php echo $product_image1 ?>" class="product_img" alt="">
        </div>
    </div>
    <!-- image2  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <label for="product_image2" class="form-label">Product Image 2</label>
        <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control">
            <img src="./product_images/<?php echo $product_image2 ?>" class="product_img" alt="">
        </div>
    </div>
    <!-- image3  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <label for="product_image3" class="form-label">Product Image 3</label>
        <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control">
            <img src="./product_images/<?php echo $product_image3 ?>" class="product_img" alt="">
        </div>
    </div>
    <!-- price  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <label for="product_price" class="form-label">Product Price</label>
        <input type="text" id="product_price" name="product_price" class="form-control" value="<?php echo $product_price ?>" placeholder="Enter product price" autocomplete="off">
    </div>
    <!-- Submit  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <input type="submit" name="edit_product" class="btn btn-info rounded-0 px-3 mb-3" value="Update">
    </div>
</form>

<?php
if (isset($_POST['edit_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $new_product_image1 = $_FILES['product_image1']['name'];
    $new_product_image2 = $_FILES['product_image2']['name'];
    $new_product_image3 = $_FILES['product_image3']['name'];
    if ($new_product_image1) {
        $update_image1 = $new_product_image1;
        $temp_product_image1 = $_FILES['product_image1']['tmp_name'];
        move_uploaded_file($temp_product_image1, "./product_images/$update_image1");
    } else {
        $update_image1 = $product_image1;
    }
    if ($new_product_image2) {
        $update_image2 = $new_product_image2;
        $temp_product_image2 = $_FILES['product_image2']['tmp_name'];
        move_uploaded_file($temp_product_image2, "./product_images/$update_image2");
    } else {
        $update_image2 = $product_image2;
    }
    if ($new_product_image3) {
        $update_image3 = $new_product_image3;
        $temp_product_image3 = $_FILES['product_image3']['tmp_name'];
        move_uploaded_file($temp_product_image3, "./product_images/$update_image3");
    } else {
        $update_image3 = $product_image3;
    }

    $update_product = "Update `products` SET product_title = '$product_title', product_description = '$product_description', product_keywords = '$product_keywords', category_id = $product_category, barnd_id=$product_brand, product_image1 = '$update_image1', product_image2 = '$update_image2', product_image3 = '$update_image2', product_price = '$product_price', date= NOW() where product_id = $edit_id";

    $result_products= mysqli_query($con,$update_product);
    if($result_products){
        echo "<script>alert('Product Updated')</script>";
        echo "<script>window.open('./index.php?view_products','_self')</script>";
    }
}
?>