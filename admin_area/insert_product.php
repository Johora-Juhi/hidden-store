<!-- database connection -->
<?php
include('../includes/connect.php');

if (isset($_POST['insert_product'])) {

    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $status = 'true';

    // accessing image name 
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // accessing image temp name 
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // checking empty condition 
    if ($product_title == '' or $product_description == '' or $product_keywords == '' or $product_category == '' or $product_brand == '' or $product_price == '' or $product_image1 == '' or $product_image2 == '' or $product_image1 == '') {
        echo "<script>alert('Please fill all avialble fields') </script>";
        exit();
    } else {
        // storing images 
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // insert query 
        $insert_product = "insert into `products` (product_title,product_description,product_keywords,category_id,barnd_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title','$product_description','$product_keywords','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$status')";
        $result_product = mysqli_query($con, $insert_product);
        if ($result_product) {
            echo "<script>alert('Product added successfully') </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product -Admin Dashboard</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- fontawosome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
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
                <input type="submit" name="insert_product" class="btn btn-info rounded-0 px-3 mb-3" value="Insert Product" required>
            </div>
        </form>
    </div>


    <!-- bootsrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>