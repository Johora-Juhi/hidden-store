<?php
if (isset($_GET['all_orders'])) {
    $select_orders = "SELECT * FROM `user_orders`";
    $result_order = mysqli_query($con, $select_orders);
    $orders_count = mysqli_num_rows($result_order);
    if ($orders_count > 0) {
        echo "<h3 class='text-center text-success my-5'>All orders</h3>
        <table class='table table-bordered text-center my-5'>
        <thead class='table-info'>
        <tr>
        <th>Sl no</th>
        <th>Due Amount</th>
        <th>Invoice Number</th>
        <th>Total Products</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody class='table-secondary'>";
        $number = 1;
        while ($orders = mysqli_fetch_array($result_order)) {
            $order_id = $orders['order_id'];
            $amount_due = $orders['amount_due'];
            $invoice_number = $orders['invoice_number'];
            $total_products = $orders['total_products'];
            $order_date = $orders['order_date'];
            $order_status = $orders['order_status'];

            echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='index.php?delete_order=$order_id' class='text-black'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
            $number++;
        }
        echo "</tbody>
        </table>";
    } else {
        echo "<h3 class='text-center text-success my-5'>No orders yet</h3>";
    }
}
