<!-- connect database  -->
<?php
include('./includes/connect.php');
include('./functions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Commerce- Cart Details</title>
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!-- fontawosome link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css link -->
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-info navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./users_area/user_registration.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping fa-bounce" style="color: #050505;"></i> <sup><?php cart_items(); ?></sup></a>
            </li>

          </ul>
          <form class="d-flex" action="search_product.php" method="get" role="search">
            <input class="form-control me-2 rounded-1" type="search" name="search_data" placeholder="Search" aria-label="Search">
            <input class="btn btn-outline-light" type="submit" name="search_data_product" value="Search">
          </form>
        </div>
      </div>
    </nav>
  </div>

  <!-- calling cart function  -->
  <?php
  addToCart();
  ?>

  <!-- second child  -->
  <div class="navbar navbar-expand-lg bg-secondary">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php
      
      if (!isset($_SESSION['user_email'])) {
        echo "
        <li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>Login</a>

      </li>
        ";
      } else {
        echo "
        <li class='nav-item'>
        <a class='nav-link' href='#'>Welcome " . $_SESSION['user_email'] . "</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='./users_area/logout.php'>Logout</a>

      </li>
        ";
      }
      ?>
    </ul>
  </div>
  <!-- third child  -->
  <div class="bg-light text-center">
    <h3>Hidden Store</h3>
    <p>Communication is the heart o ecommere and community</p>
  </div>
  <!-- fourth-child  -->
  <div class="container">


    <?php
    global $con;
    $total_price = 0;
    $get_ip_address = getIPAddress();
    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
    $result_cart = mysqli_query($con, $cart_query);
    $row_count = mysqli_num_rows($result_cart);
    if ($row_count > 0) {
      echo "  
        <form action='' method='post'>
          <table class='table table-bordered text-center'>
            <thead>
              <tr>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Remove</th>
                <th class='col-span-2'>Operations</th>
              </tr>
            </thead>
            <tbody>";
      while ($row_data = mysqli_fetch_array($result_cart)) {
        $product_id = $row_data['product_id'];
        $product_quantity = $row_data['quantity'];
        $product_query = "SELECT * FROM `products` WHERE product_id=$product_id";
        $result_products = mysqli_query($con, $product_query);
        // while ($row_product_price = mysqli_fetch_array($result_products)) {
        //   $product_price_array = array($row_product_price['product_price']);
        //   $product_price_sum = array_sum($product_price_array);
        // $product_title= $row_product_price['product_title'];
        // $product_price= $row_product_price['product_price'];
        // $product_image1= $row_product_price['product_image1'];
        $cart_product = mysqli_fetch_assoc($result_products);

        $product_title = $cart_product['product_title'];
        $product_price = $cart_product['product_price'];
        $product_image1 = $cart_product['product_image1'];
        // echo "$product_price_sum";
        $product_price_sum = $product_price * $product_quantity;

    ?>
        <tr>
          <td><?php echo $product_title ?></td>
          <td><img class="cart-image" src="./admin_area/product_images/<?php echo $product_image1 ?>" alt=""></td>
          <td>
            <input type="text" class="form-input w-50" name="quantity" placeholder="<?php echo $product_quantity ?>">
            <?php
            if (isset($_POST['update_quantity'])) {
              $quantity = $_POST['quantity'];
              $update_cart = "UPDATE `cart_details` SET quantity = $quantity WHERE ip_address='$get_ip_address' AND product_id= $product_id";
              $result = mysqli_query($con, $update_cart);
              echo "<script>window.open('cart.php','_self')</script>";
            }
            ?>
          </td>
          <td><?php echo $product_price_sum ?></td>
          <td><input type="checkbox" name="remove_item[]" value="<?php echo $product_id ?>"></td>
          <td>
            <input type="submit" value="Update" name="update_quantity" class="btn btn-info">
            <input type="submit" value="Remove" name="remove" class="btn btn-info">
          </td>
        </tr>
      <?php
        //  }
        $total_price += $product_price_sum;
      }
      ?>
      </tbody>
      </table>
      </form>
      <!-- function for removing item from cart  -->
      <?php
      function remove_item()
      {
        global $con;
        if (isset($_POST['remove'])) {
          foreach ($_POST['remove_item'] as $remove_id) {
            echo $remove_id;
            $delete_query = "DELETE FROM `cart_details` where product_id=$remove_id";
            $result_query = mysqli_query($con, $delete_query);
            if ($result_query) {
              echo "<script>window.open('cart.php','_self')</script>";
            }
          }
        }
      }

      echo $remove_item = remove_item();
      ?>
      <!-- subtotal  -->
      <div class="d-flex gap-3 my-3">
        <h4>Subtotal: <strong class="text-info"><?php echo $total_price ?>/-</strong></h4>
        <a href="index.php"><button class="btn btn-info rounded-0">Continue Shopping</button></a>
        <a href="./users_area/checkout.php"><button class="btn btn-secondary rounded-0">Checkout</button></a>
      </div>
  </div>
<?php
    } else {
      echo "<h2 class='text-center text-danger'>Cart is empty</h2>
  <a href='index.php'><button class='btn btn-info rounded-0 my-3'>Continue Shopping</button></a>
  
  </div>";
    }
?>
<!-- last-child  -->
<?php
include('./shared/footer.php')
?>
<!-- bootsrap js link  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>