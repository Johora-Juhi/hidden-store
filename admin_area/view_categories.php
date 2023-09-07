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
                    <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $category_id ?>"><i class="fa-solid fa-trash"></i></button></td>
                    <!-- <td><a href="index.php?delete_category=<?php echo $category_id ?>" class="text-black"><i class="fa-solid fa-trash"></i></a></td> -->
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal_<?php echo $category_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Delete <?php echo $category_title ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                This category products will also get delteted. Do you want to continue the process?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="button" class="btn btn-danger"><a href="index.php?delete_category=<?php echo $category_id ?>" class="text-decoration-none text-light">Yes</a></button>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </tbody>
</table>