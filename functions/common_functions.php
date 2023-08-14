<?php
include('./includes/connect.php');

// getting products 
function getProducts(){
    global $con;
    $select_products= " SELECT * FROM `products` order by rand() LIMIT 0,9";
        $result_products= mysqli_query($con,$select_products);
        while($row= mysqli_fetch_assoc($result_products)){
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_price = $row['product_price'];
          $product_image1 = $row['product_image1'];
          $category_id = $row['category_id'];
          $brand_id = $row['barnd_id'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='#' class='btn btn-info'>Add to cart</a>
              <a href='#' class='btn btn-secondary'>View more</a>
            </div>
          </div>
        </div>";
        }
}

// getting brands 
function getBrands(){
    global $con;
    $select_brands = 'SELECT * FROM `brands`';
    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
      $brand_title = $row_data['brand_title'];
      $brand_id = $row_data['brand_id'];
      echo "<li class='nav-item mb-2'><a href='index.php?brand=$brand_id' class='nav-link'>$brand_title</a></li>";
    }
}

// getting categories 
function getategories(){
    global $con;
    $select_categories = 'SELECT * FROM `categories`';
        $result_categories = mysqli_query($con, $select_categories);
        while ($row_data = mysqli_fetch_assoc($result_categories)) {
          $category_title = $row_data['category_title'];
          $category_id = $row_data['category_id'];
          echo "<li class='nav-item mb-2'><a href='index.php?category=$category_id' class='nav-link'>$category_title</a></li>";
        }
}
