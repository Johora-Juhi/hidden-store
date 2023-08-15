<?php
include('./includes/connect.php');

// getting products 
function getProducts()
{
  global $con;
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
      $select_products = " SELECT * FROM `products` order by rand() LIMIT 0,9";
      $result_products = mysqli_query($con, $select_products);
      while ($row = mysqli_fetch_assoc($result_products)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_price = $row['product_price'];
        $product_image1 = $row['product_image1'];
        $category_id = $row['category_id'];
        $brand_id = $row['barnd_id'];
        echo "<div class='col-md-4 mb-4'>
          <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
          </div>
        </div>";
      }
    }
  }
}

// getting all products 
function getAllProducts()
{
  global $con;
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
      $select_products = " SELECT * FROM `products` order by rand()";
      $result_products = mysqli_query($con, $select_products);
      while ($row = mysqli_fetch_assoc($result_products)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_price = $row['product_price'];
        $product_image1 = $row['product_image1'];
        $category_id = $row['category_id'];
        $brand_id = $row['barnd_id'];
        echo "<div class='col-md-4 mb-4'>
          <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
          </div>
        </div>";
      }
    }
  }
}

// getting product by categories 
function getProdctsByCategories()
{
  global $con;
  if (isset($_GET['category'])) {
    $category_id = $_GET['category'];
    $select_products = " SELECT * FROM `products` WHERE category_id=$category_id";
    $result_products = mysqli_query($con, $select_products);
    $number = mysqli_num_rows($result_products);
    if ($number <= 0) {
      echo "<h2 class='text-center text-danger'>No product avaiable in this category</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_products)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_price = $row['product_price'];
      $product_image1 = $row['product_image1'];
      $category_id = $row['category_id'];
      $brand_id = $row['barnd_id'];
      echo "<div class='col-md-4 mb-4'>
          <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
          </div>
        </div>";
    }
  }
}

// getting product by Brand 
function getProdctsByBrand()
{
  global $con;
  if (isset($_GET['brand'])) {
    $brand_id = $_GET['brand'];
    $select_products = " SELECT * FROM `products` WHERE barnd_id=$brand_id";
    $result_products = mysqli_query($con, $select_products);
    $number = mysqli_num_rows($result_products);
    if ($number <= 0) {
      echo "<h2 class='text-center text-danger'>This brand is not available for the service</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_products)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_price = $row['product_price'];
      $product_image1 = $row['product_image1'];
      $category_id = $row['category_id'];
      $brand_id = $row['barnd_id'];
      echo "<div class='col-md-4 mb-4'>
          <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
          </div>
        </div>";
    }
  }
}

// getting brands 
function getBrands()
{
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
function getategories()
{
  global $con;
  $select_categories = 'SELECT * FROM `categories`';
  $result_categories = mysqli_query($con, $select_categories);
  while ($row_data = mysqli_fetch_assoc($result_categories)) {
    $category_title = $row_data['category_title'];
    $category_id = $row_data['category_id'];
    echo "<li class='nav-item mb-2'><a href='index.php?category=$category_id' class='nav-link'>$category_title</a></li>";
  }
}

function searchProducts()
{
  global $con;
  if (isset($_GET['search_data_product'])) {
    $search_data = $_GET['search_data'];
    $search_products = " SELECT * FROM `products` WHERE product_keywords like '%$search_data%'";
    $result_products = mysqli_query($con, $search_products);
    $number = mysqli_num_rows($result_products);
    if ($number <= 0) {
      echo "<h2 class='text-center text-danger'>No such products found.</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_products)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_price = $row['product_price'];
      $product_image1 = $row['product_image1'];
      $category_id = $row['category_id'];
      $brand_id = $row['barnd_id'];
      echo "<div class='col-md-4 mb-4'>
          <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
          </div>
        </div>";
    }
  }
}

function viewProductDetails()
{
  global $con;
  if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    if (!isset($_GET['category'])) {
      if (!isset($_GET['brand'])) {
        $select_products = " SELECT * FROM `products` Where product_id=$product_id";
        $result_products = mysqli_query($con, $select_products);
        while ($row = mysqli_fetch_assoc($result_products)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_price = $row['product_price'];
          $product_image1 = $row['product_image1'];
          $product_image2 = $row['product_image2'];
          $product_image3 = $row['product_image3'];
          $category_id = $row['category_id'];
          $brand_id = $row['barnd_id'];
          echo "<div class='col-md-4 mb-4'>
          <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
              <a href='index.php' class='btn btn-secondary'>Go to Home</a>
            </div>
          </div>
        </div>
        <div class='col-md-8'>
            <h2 class='text-center text-info pb-5'>Related Images</h2>
                <div class='row'>
                    <div class='col-md-6'><img class='card-img-top' src='./admin_area/product_images/$product_image2' alt=''></div>
                    <div class='col-md-6'><img class='card-img-top' src='./admin_area/product_images/$product_image3' alt=''></div>
                </div>
            
        </div>";
        }
      }
    }
  }
}

// getting ip address function 
function getIPAddress()
{
  //whether ip is from the share internet  
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address  
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

// add to cart function 
function addToCart()
{
  global $con;
  if (isset($_GET['add_to_cart'])) {
    $get_product_id = $_GET['add_to_cart'];
    $get_ip_address = getIPAddress();

    // checking if the product already exist on cart 
    $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address' and product_id=$get_product_id";
    $result_products = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_products);
    if ($number > 0) {
      echo "<script>alert('This product is already added to the cart')</script>";
      echo "<script>window.open('index.php','_Self')</script>";
    } else {
      $insert_query = "INSERT into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_address',0)";
      $result_products = mysqli_query($con, $insert_query);
      echo "<script>alert('Product is added to the cart')</script>";
      echo "<script>window.open('index.php','_Self')</script>";
    }
  }
}

// getting cart item number 
function cart_items()
{
  global $con;
  if (isset($_GET['add_to_cart'])) {
    $get_ip_address = getIPAddress();

    // checking if the product already exist on cart 
    $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
    $result_products = mysqli_query($con, $select_query);
    $count_cart_items = mysqli_num_rows($result_products);
  } else {
    $get_ip_address = getIPAddress();

    // checking if the product already exist on cart 
    $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
    $result_products = mysqli_query($con, $select_query);
    $count_cart_items = mysqli_num_rows($result_products);
  }
  echo $count_cart_items;
}
