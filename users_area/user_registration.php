<!-- database connection -->
<?php
include('../includes/connect.php');
include('../functions/common_functions.php')

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
        <h1 class="text-center">New Regitartion Form</h1>
        <!-- form  -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- username  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="name" class="form-label">Username</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" autocomplete="off" required>
            </div>
            <!-- email  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" autocomplete="off" required>
            </div>
            <!-- image  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="user_image" class="form-label">User Image</label>
                <input type="file" id="user_image" name="user_image" class="form-control" required>
            </div>
            <!-- password  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" autocomplete="off" required>
            </div>
            <!-- confirm_password  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required>
            </div>
            <!-- address  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Enter your address" autocomplete="off" required>
            </div>
            <!-- mobile  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="mobile" class="form-label">Contact</label>
                <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required>
            </div>
            <!-- Submit  -->
            <div class="form-outline mb-4 w-50 mx-auto">
                <input type="submit" name="user_register" class="btn btn-info rounded-0 px-3 mb-2" value="Register" required>
                <p class="small fw-bold">Already have an acccount? <a href="user_login.php"> Login</a></p>
            </div>
        </form>
    </div>

<?php
if(isset($_POST['user_register'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $user_ip=getIPAddress();

    // move images 
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");

    // sellect query 
    $select_query= "SELECT * FROM `user_table` WHERE username='$name' or user_email='$email'";
    $result_user=mysqli_query($con,$select_query);
    $number = mysqli_num_rows($result_user);
    if($number>0){
        echo "<script>alert('Username and email already exist')</script>";
    }else if($password !== $confirm_password){
        echo "<script>alert('Password does not match')</script>";
    }else{
    // insert quert 
    $insert_query = "INSERT INTO `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES ('$name','$email','$password','$user_image','$user_ip','$address','$mobile')";
    $result= mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('user registered successfully')</script>";
    }
}
}
?>
    <!-- bootsrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>