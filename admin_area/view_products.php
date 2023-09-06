<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3 class="text-success text-center">All Products</h3>
    <table class="table table-bordered my-5 text-center">
        <thead class="bg-info table-info">
            <tr>
                <th>Product Id</th>
                <th>Product Title</th>
                <th>Product Image </th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary table-secondary text-light">
            <?php
            $get_products = "SELECT * FROM `products`";
            $result = mysqli_query($con, $get_products);
            while ($products = mysqli_fetch_array($result)) {
                $product_id = $products['product_id'];
                $product_description = $products['product_description'];
                $product_keywords = $products['product_keywords'];
                $category_id = $products['category_id'];
                $barnd_id = $products['barnd_id'];
                $product_title = $products['product_title'];
                $product_image1 = $products['product_image1'];
                $product_image2 = $products['product_image2'];
                $product_image3 = $products['product_image3'];
                $product_price = $products['product_price'];
                $status = $products['status'];
                $date = $products['date'];
            ?>
                <tr>
                    <td><?php echo $product_id ?></td>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_img"></td>
                    <td><?php echo $product_price . "/-" ?> </td>
                    <td><?php
                                        $get_pending_products = "Select * from `orders_pending` where product_id=$product_id";
                                        $result_products = mysqli_query($con, $get_pending_products);
                                        $total_quantity = 0;
                                        while ($pending_products = mysqli_fetch_assoc($result_products)) {
                                            $quantity = $pending_products['quantity'];
                                            $total_quantity += $quantity;
                                        };;
                                        echo $total_quantity;
                                        ?></td>
                    <td><?php echo $status ?></td>
                    <td><a href="index.php?edit_products=<?php echo $product_id?>" class="text-black"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="" class="text-black"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>