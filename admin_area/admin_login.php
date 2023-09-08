<!-- database connection -->
<?php
include_once('../includes/connect.php');
include_once('../functions/common_functions.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- fontawosome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <h2 class="text-center my-5">Admin Login</h2>

    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="w-50 text-end">
            <img src="./product_images/Privacy policy-rafiki.png" alt="" class="w-75 ms-auto">
        </div>
        <div class="w-50 me-auto">
            <!-- form  -->
            <form action="" method="post">
                <!-- username  -->
                <div class="form-outline mb-4 w-50 me-auto">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <!-- password  -->
                <div class="form-outline mb-4 w-50 me-auto">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                </div>
                <!-- Submit  -->
                <div class="form-outline mb-4 w-50 me-auto">
                    <input type="submit" name="user_login" class="btn btn-info rounded-0 px-3 mb-2" value="Login" required>
                    <p class="small fw-bold">Don't have an acccount? <a href="./admin_registration.php">Register </a></p>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['user_login'])) {
        $username = $_POST['name'];
        $password = $_POST['password'];

        // check if the user is regidtered 
        $select_user = "SELECT * FROM `admin_table` WHERE admin_name='$username'";
        $result_user = mysqli_query($con, $select_user);
        $user_data = mysqli_fetch_assoc($result_user);
        $user_count = mysqli_num_rows($result_user);

        if ($user_count > 0) {
            if (password_verify($password, $user_data['admin_password'])) {
                $_SESSION['username'] = $username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('./index.php','_self')</script>";
            } else {
                echo "<script>alert('Incorrect password')</script>";
            }
        } else {
            echo "<script>alert('User is not registered')</script>";
        }
    }
    ?>
    <!-- bootsrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>