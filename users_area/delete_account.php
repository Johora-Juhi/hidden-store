<?php
if (isset($_POST['delete'])) {
    $delete_user = "DELETE from `user_table` where user_id = $user_id";
    $result_user = mysqli_query($con, $delete_user);
    if ($result_user) {
        session_destroy();
        echo "<script>alert('Account deleted')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if (isset($_POST['dont_delete'])) {
    echo "<script>window.open('./profile.php','_self')</script>";
}
?>
<h3 class="my-5 text-danger">Delete Account</h3>
<form action="" method="post">
    <div class="form-outline my-4 w-50 mx-auto">
        <input type="submit" class="form-control" value="Delete Account" name="delete">
    </div>
    <div class="form-outline my-4 w-50 mx-auto">
        <input type="submit" class="form-control" value="Don't Delete Account" name="dont_delete">
    </div>
</form>