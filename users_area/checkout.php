<!-- connect database  -->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Commerce using PHP</title>
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!-- fontawosome link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css link -->
  <link rel="stylesheet" href="style.css">
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
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./user_registration.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping fa-bounce" style="color: #050505;"></i> <sup><?php cart_items(); ?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price: <?php totalCartPrice(); ?>/-</a>
            </li>

          </ul>
          <form class="d-flex" action="../search_product.php" method="get" role="search">
            <input class="form-control me-2 rounded-1" type="search" name="search_data" placeholder="Search" aria-label="Search">
            <input class="btn btn-outline-light" type="submit" name="search_data_product" value="Search">
          </form>
          <div>

          </div>
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

      if (!isset($_SESSION['username'])) {
        echo "
        <li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='./user_login.php'>Login</a>

      </li>
        ";
      } else {
        echo "
        <li class='nav-item'>
        <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='./logout.php'>Logout</a>

      </li>
        ";
      }
      ?>
    </ul>
  </div>
  <!-- third child  -->
  <div class="bg-light text-center">
    <h3>Hidden Store</h3>
    <p>Communication is the heart of ecommere and community</p>
  </div>
  <!-- fourth-child  -->
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <?php
        if (!isset($_SESSION['username'])) {
          include('./user_login.php');
        } else {
          include('./payment.php');
        }
        ?>
      </div>

    </div>
  </div>
  <!-- last-child  -->
  <?php
  include('../shared/footer.php')
  ?>
  <!-- bootsrap js link  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>