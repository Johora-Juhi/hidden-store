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
    <title><?php echo "Welcome " . $_SESSION['username']; ?></title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- fontawosome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
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
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "<li class='nav-item'>
              <a class='nav-link' href='./profile.php'>My Account</a>
            </li>";
                        } else {
                            echo "<li class='nav-item'>
              <a class='nav-link' href='./user_registration.php'>Register</a>
            </li>";
                        }
                        ?>
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
        <div class="col-md-2">
            <ul class="navbar-nav bg-secondary text-center text-light">
                <li class='nav-item bg-info'>
                    <a class='nav-link' href=''>
                        <h4>Your Profile</h4>
                    </a>
                </li>
                <?php
                $username = $_SESSION['username'];

                $select_user = "SELECT * FROM `user_table` where username = '$username'";
                $result_user = mysqli_query($con, $select_user);
                $user = mysqli_fetch_assoc($result_user);
                $user_id = $user['user_id'];
                $username = $user['username'];
                $user_email = $user['user_email'];
                $user_address = $user['user_address'];
                $user_mobile = $user['user_mobile'];
                $user_image = $user['user_image'];
                echo "
                <li class='nav-item'>
                    <img class='profile_img' src='./user_images/$user_image' alt=''>
                </li>"
                ?>
                <li class='nav-item'>
                    <a class='nav-link' href='./profile.php'>Pending Orders</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='./profile.php?edit_account'>Edit Account</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='./profile.php?my_orders'>My orders</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='./profile.php?delete_account'>Delete Account</a>
                </li>
                <li class='nav-item pb-4'>
                    <a class='nav-link' href='./logout.php'>Logout</a>
            </ul>
        </div>
        <div class="col-md-10 text-center">
            <?php
            get_pending_orders();
            if (isset($_GET['edit_account'])) {
                include('./edit_account.php');
            }
            if (isset($_GET['my_orders'])) {
                include('./user_orders.php');
            }
            if (isset($_GET['delete_account'])) {
                include('./delete_account.php');
            }
            ?>
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