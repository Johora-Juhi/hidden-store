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
        <div class="form-outline mb-4">
            <input type="text" class="form-control" name="user_name">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control" name="user_email">
        </div>
        <div class="form-outline mb-4 d-flex">
            <input type="file" class="form-control w-75" name="user_image">
            <img src="./user_images/<?php echo $user_image?>" class="w-25" alt="">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control" name="user_mobile">
        </div>
        <input type="submit" value="Update" class="btn btn-info rounded-0 text-light mb-4" name="user_update">
    </form>
</body>

</html>