<!-- connect database  -->
<?php
include('./includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-COmmerse using PHP</title>
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
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping fa-bounce" style="color: #050505;"></i> <sup>1</sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price: 500/-</a>
            </li>

          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2 rounded-1" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </div>
  <!-- second child  -->
  <div class="navbar navbar-expand-lg bg-secondary">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
    </ul>
  </div>
  <!-- third child  -->
  <div class="bg-light text-center">
    <h3>Hidden Store</h3>
    <p>Communication is the heart o ecommere and community</p>
  </div>
  <!-- fourth-child  -->
  <div class="row">
    <div class="col-md-10">
      <!-- Products  -->
      <div class="row">
        <div class="col-md-4 mb-2">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-info">Add to cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2 bg-secondary p-0">
      <!-- brands  -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center text-light ">
        <li class="nav-item mb-2 bg-info">
          <h3>Delivery Brands</h3>
        </li>
        <?php
        $select_brands = 'SELECT * FROM `brands`';
        $result_brands = mysqli_query($con, $select_brands);
        while ($row_data = mysqli_fetch_assoc($result_brands)) {
          $brand_title = $row_data['brand_title'];
          $brand_id = $row_data['brand_id'];
          echo "<li class='nav-item mb-2'><a href='index.php?brand=$brand_id' class='nav-link'>$brand_title</a></li>";
        }
        ?>
      </ul>

      <!-- categories  -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center text-light ">
        <li class="nav-item mb-2 bg-info">
          <h3>Categories</h3>
        </li>
        <?php
        $select_categories = 'SELECT * FROM `categories`';
        $result_categories = mysqli_query($con, $select_categories);
        while ($row_data = mysqli_fetch_assoc($result_categories)) {
          $category_title = $row_data['category_title'];
          $category_id = $row_data['category_id'];
          echo "<li class='nav-item mb-2'><a href='index.php?category=$category_id' class='nav-link'>$category_title</a></li>";
        }
        ?>
      </ul>

    </div>
  </div>
  <!-- last-child  -->
  <div class="container-fluid p-3 text-center bg-info">
    <p>All rights reserved @- juu-2023</p>
  </div>
  <!-- bootsrap js link  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>