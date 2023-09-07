<?php
if (isset($_GET['all_payments'])) {
    $select_payments = "SELECT * FROM `user_payments`";
    $result_payment = mysqli_query($con, $select_payments);
    $payments_count = mysqli_num_rows($result_payment);
    if ($payments_count > 0) {
        echo "<h3 class='text-center text-success my-5'>All payments</h3>
        <table class='table table-bordered text-center my-5'>
        <thead class='table-info'>
        <tr>
        <th>Sl no</th>
        <th>Amount</th>
        <th>Invoice Number</th>
        <th>Payment Mode</th>
        <th>payment Date</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody class='table-secondary'>";
        $number = 1;
        while ($payments = mysqli_fetch_array($result_payment)) {
            $payment_id = $payments['payment_id'];
            $amount = $payments['amount'];
            $invoice_number = $payments['invoice_number'];
            $payment_mode = $payments['payment_mode'];
            $payment_date = $payments['date'];

            echo "<tr>
            <td>$number</td>
            <td>$amount</td>
            <td>$invoice_number</td>
            <td>$payment_mode</td>
            <td>$payment_date</td>
            <td><a href='index.php?delete_payment=$payment_id' class='text-black'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
            $number++;
        }
        echo "</tbody>
        </table>";
    } else {
        echo "<h3 class='text-center text-success my-5'>No payments yet</h3>";
    }
}
