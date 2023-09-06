<h3 class="text-success">All My Orders</h3>
<table class="table table-bordered">
    <thead class="bg-info">
        <tr>
            <th>Sl No</th>
            <th>Total Products</th>
            <th>Amount Due</th>
            <th>Invoice Number</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>
        <?php
        $select_orders = "SELECT * FROM `user_orders` where user_id = $user_id";
        $result_orders = mysqli_query($con, $select_orders);
        $number = 1;
        // $orders = mysqli_fetch_assoc($result_orders);
        while ($orders = mysqli_fetch_assoc($result_orders)) {
            $order_id = $orders['order_id'];
            $amount_due = $orders['amount_due'];
            $invoice_number = $orders['invoice_number'];
            $total_products = $orders['total_products'];
            $order_date = $orders['order_date'];
            $order_status = $orders['order_status'];
            if ($order_status == "pending") {
                $order_status = "Incomplete";
            } else {
                $order_status = "Complete";
            }
            echo "
        <tr>
            <td>$number</td>
            <td>$total_products</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>";
        ?>
        <?php

            if ($order_status == 'Complete') {
                echo "<th>Paid</th>";
            } else {
                echo " <td> <a href='confirm_payment.php?order_id=$order_id' class='text-black'>Confirm</a> </td>
                </tr>";
            }

            $number++;
        }
        ?>
    </tbody>
</table>