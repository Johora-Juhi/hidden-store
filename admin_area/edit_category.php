<h3 class="text-center text-success my-5">Edit category</h3>
<form action="" method="post" class="w-50 mx-auto text-center">
    <?php
    if (isset($_GET['edit_category'])) {
        $edit_id = $_GET['edit_category'];
        $select_category = "SELECT * FROM `categories` where category_id = $edit_id";
        $result = mysqli_query($con, $select_category);
        $category = mysqli_fetch_assoc($result);
        $category_title = $category['category_title'];
    }
    if (isset($_POST['update_category'])) {
        $category_title = $_POST['category_title'];
        $update_category = "UPDATE `categories` set category_title = '$category_title' where category_id=$edit_id";
        $result_update = mysqli_query($con, $update_category);
        if ($result_update) {
            echo "<script>alert('Category updated')</script>";
            echo "<script>window.open('index.php?view_categories','_self')</script>";
        }
    }
    ?>
    <div class="form-outline">
        <label for="category-title" class="form-label">Category title</label>
        <input type="text" name="category_title" id="category-title" class="form-control mt-2 mb-4" value="<?php echo $category_title ?>">
    </div>
    <div class="form-outline">
        <input type="submit" value="Update" name="update_category" class="btn btn-info rounded-0">
    </div>
</form>