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
                    <td><a href="" class="text-black"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>