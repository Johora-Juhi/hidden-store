<?php
include('../includes/connect.php');

if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['category_title'];
    //select data from database to stop repetation
    $select_query = "SELECT * FROM `categories` where category_title = '$category_title' ";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This category is already present in the database')</script>";
    } else {
        $query = "INSERT INTO `categories` (`category_title`) VALUES ('$category_title');    ";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script>alert('Category has been inserted successfully')</script>";
        }
    }
}


?>

<form action="" method="post">
    <div class="input-group mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i> </span>
        <input type="text" name="category_title" class="form-control" placeholder="Insert Categories" aria-label="Insert_categories" aria-describedby="basic-addon1">
    </div>
    <input type="submit" name="insert_cat" value="Insert Categories" class="btn btn-info rounded-0"></input>
</form>