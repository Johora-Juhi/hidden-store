<!-- database connection -->
<?php
include('../includes/connect.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration </title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- fontawosome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center"> User Login</h1>
        <!-- form  -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- username  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="name" class="form-label">Username</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" autocomplete="off" required>
            </div>
            <!-- password  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="password" class="form-label">Password</label>
                <input type="text" id="password" name="password" class="form-control" placeholder="Enter password" autocomplete="off" required>
            </div>
            <!-- Submit  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <input type="submit" name="user_login" class="btn btn-info rounded-0 px-3 mb-2" value="Login" required>
                <p class="small fw-bold">Don't have an acccount? <a href="user_registration.php"> Register</a></p>
            </div>
        </form>
    </div>


    <!-- bootsrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>