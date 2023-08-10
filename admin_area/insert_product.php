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
                    ?>
                    <option value=""></option>
                </select>
            </div>
            <!-- brand  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select a Brand</option>
                    <option value=""></option>
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