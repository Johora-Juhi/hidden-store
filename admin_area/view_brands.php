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
        if (isset($_GET['view_brands'])) {
            $select_brand = "SELECT * FROM `brands`";
            $result_brand = mysqli_query($con, $select_brand);
            $number = 0;
            while ($brands = mysqli_fetch_array($result_brand)) {
                $brand_id = $brands['brand_id'];
                $brand_title = $brands['brand_title'];
                $number++;
        ?>
                <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $brand_title ?></td>
                    <td><a href="index.php?edit_brand=<?php echo $brand_id ?>" class="text-black"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $brand_id ?>"><i class="fa-solid fa-trash"></i></button></td>
                </tr>

                <!-- Modal for Delete Confirmation -->
                <div class="modal fade" id="exampleModal<?php echo $brand_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete <?php echo $brand_title ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this brand? This brand's products will also get deleted.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary"><a href="index.php?delete_brand=<?php echo $brand_id ?>" class="text-decoration-none text-light">Yes</a></button>
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
