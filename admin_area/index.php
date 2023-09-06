<!-- database connection  -->
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
  <title>Admin Dashboard</title>
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!-- fontawosome link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css link -->
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <div class="container-fluid p-0">
    <!-- first child  -->
    <nav class="navbar navbar-expand-lg bg-info navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>

        <div class="navbar navbar-expand-lg bg-info navbar-light">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Welcome Guest</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- second child  -->
    <div class="container-fluid bg-light text-center p-2">
      <h1>Manage Details</h1>
    </div>
    <!-- third child  -->
    <div class="row">
      <div class="col-md-12 d-flex bg-secondary align-items-center">
        <div class="px-3">
          <img src="" alt="" class="adminImage">
          <p class="text-center text-light">Admin name</p>
        </div>
        <div class="button text-center">
          <button><a href="insert_product.php" class="nav-link bg-info text-light p-2">Insert Products</a></button>
          <button><a href="index.php?view_products" class="nav-link bg-info text-light p-2">View Products</a></button>
          <button><a href="index.php?insert_categories" class="nav-link bg-info text-light p-2">Insert Categories</a></button>
          <button><a href="" class="nav-link bg-info text-light p-2">View Categories</a></button>
          <button><a href="index.php?insert_brands" class="nav-link bg-info text-light p-2">Insert Brands</a></button>
          <button><a href="" class="nav-link bg-info text-light p-2">View Brands</a></button>
          <button><a href="" class="nav-link bg-info text-light p-2">All Orders </a></button>
          <button><a href="" class="nav-link bg-info text-light p-2">All Payments</a></button>
          <button><a href="" class="nav-link bg-info text-light p-2">Users List</a></button>
          <button><a href="" class="nav-link bg-info text-light p-2">Logout</a></button>
        </div>
      </div>
    </div>

    <!-- fourth child  -->
    <div class="container my-5">
      <?php
      if (isset($_GET['insert_categories'])) {
        include('insert_categories.php');
      }
      if (isset($_GET['insert_brands'])) {
        include('insert_brands.php');
      }
      if (isset($_GET['view_products'])) {
        include('./view_products.php');
      }

      ?>
    </div>
    <!-- last-child  -->
    <div class="container-fluid p-3 text-center bg-info">
      <p>All rights reserved @- juu-2023</p>
    </div>
  </div>
  <!-- bootsrap js link  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>