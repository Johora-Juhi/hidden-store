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
    $result_category = mysqli_query($con,$select_category);
    $category = mysqli_fetch_assoc($result_category);
    $category_title = $category['category_title'];
    $barnd_id = $products['barnd_id'];
       // select choosen category 
       $select_brand = "SELECT * FROM `brands` where brand_id = $barnd_id";
       $result_brand = mysqli_query($con,$select_brand);
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
        <input type="text" id="product_title" name="product_title" class="form-control" value="<?php echo $product_title ?>" placeholder="Enter product title" autocomplete="off" required>
    </div>
    <!-- description  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <label for="product_description" class="form-label">Product Description</label>
        <input type="text" id="product_description" name="product_description" class="form-control" value="<?php echo $product_description ?>" placeholder="Enter product description" autocomplete="off" required>
    </div>
    <!-- keywords  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <label for="product_keywords" class="form-label">Product Keywords</label>
        <input type="text" id="product_keywords" name="product_keywords" class="form-control" value="<?php echo $product_keywords ?>" placeholder="Enter product keywords" autocomplete="off" required>
    </div>
    <!-- category  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <select name="product_category" id="" class="form-select">
            <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
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
            <option value="<?php echo $brand_title?>"><?php echo $brand_title?></option>
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
            <input type="file" id="product_image1" name="product_image1" class="form-control" required>
            <img src="./product_images/<?php echo $product_image1 ?>" class="product_img" alt="">
        </div>
    </div>
    <!-- image2  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <label for="product_image2" class="form-label">Product Image 2</label>
        <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control" required>
            <img src="./product_images/<?php echo $product_image2 ?>" class="product_img" alt="">
        </div>
    </div>
    <!-- image3  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <label for="product_image3" class="form-label">Product Image 3</label>
        <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control" required>
            <img src="./product_images/<?php echo $product_image3 ?>" class="product_img" alt="">
        </div>
    </div>
    <!-- price  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <label for="product_price" class="form-label">Product Price</label>
        <input type="text" id="product_price" name="product_price" class="form-control" value="<?php echo $product_price?>" placeholder="Enter product price" autocomplete="off" required>
    </div>
    <!-- Submit  -->
    <div class="form-outline mb-4 w-50 mx-auto">
        <input type="submit" name="edit_product" class="btn btn-info rounded-0 px-3 mb-3" value="Update" required>
    </div>
</form>