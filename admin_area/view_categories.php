<table class="table table-bordered my-5 text-center">
    <thead class="table-info">
        <tr>
            <th>Sl no</th>
            <th>Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table-secondary">
        <?php
        if (isset($_GET['view_categories'])) {
            $select_cat = "SELECT * FROM `categories`";
            $result_cat = mysqli_query($con, $select_cat);
            $number = 0;
            while ($categories = mysqli_fetch_array($result_cat)) {
                $category_id = $categories['category_id'];
                $category_title = $categories['category_title'];
                $number++;
        ?>
                <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $category_title ?></td>
                    <td><a href="index.php?edit_category=<?php echo $category_id ?>" class="text-black"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="" class="text-black"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>