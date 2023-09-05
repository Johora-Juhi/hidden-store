<?php
if (isset($_POST['user_update'])) {
    $username = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $new_user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    // if any  image is selected then it will be moved otherwise the previous image name will remailn unchanged 
    if ($new_user_image) {
        move_uploaded_file($user_image_tmp, "./user_images/$new_user_image");
        $update_user_image = $new_user_image;
    } else {
        $update_user_image = $user_image;
    }
    $user_id = $user_id;
    $update_user = "UPDATE `user_table` set username='$username', user_email='$user_email', user_image='$update_user_image', user_address='$user_address', user_mobile='$user_mobile' WHERE user_id=$user_id";
    $result_user = mysqli_query($con, $update_user);
    if ($result_user) {
        $_SESSION['username'] = $username;
        echo "<script>alert('User updated successfully')</script>";
        echo "<script>window.open('profile.php?edit_account','_self')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>

<body>
    <h2 class="text-success mb-3">Edit Account</h2>
    <form action="" method="post" class="w-50 mx-auto" enctype="multipart/form-data">
        <div class="form-outline mb-3">
            <input type="text" class="form-control" name="user_name" value="<?php echo $username ?>">
        </div>
        <div class="form-outline mb-3">
            <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
        </div>
        <div class="form-outline mb-3 d-flex">
            <input type="file" class="form-control w-75" name="user_image">
            <img src="./user_images/<?php echo $user_image ?>" class="w-25" alt="">
        </div>
        <div class="form-outline mb-3">
            <input type="text" class="form-control" name="user_address" value="<?php echo $user_address ?>">
        </div>
        <div class="form-outline mb-3">
            <input type="text" class="form-control" name="user_mobile" value="<?php echo $user_mobile ?>">
        </div>
        <input type="submit" value="Update" class="btn btn-info rounded-0 text-light mb-3" name="user_update">
    </form>
</body>

</html>