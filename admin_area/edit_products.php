<h1 class="text-center">Edit Products</h1>
        <!-- form  -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" name="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required>
            </div>
            <!-- description  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" id="product_description" name="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required>
            </div>
            <!-- keywords  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" id="product_keywords" name="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required>
            </div>
            <!-- category  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
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
                    <option value="">Select a Brand</option>
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
                <input type="file" id="product_image1" name="product_image1" class="form-control" required>
            </div>
            <!-- image2  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" id="product_image2" name="product_image2" class="form-control" required>
            </div>
            <!-- image3  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" id="product_image3" name="product_image3" class="form-control" required>
            </div>
            <!-- price  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" name="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required>
            </div>
            <!-- Submit  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <input type="submit" name="edit_product" class="btn btn-info rounded-0 px-3 mb-3" value="Update" required>
            </div>
        </form>