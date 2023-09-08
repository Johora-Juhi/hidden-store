<?php
if (isset($_GET['all_users'])) {
    $select_users = "SELECT * FROM `user_table`";
    $result_user = mysqli_query($con, $select_users);
    $users_count = mysqli_num_rows($result_user);
    if ($users_count > 0) {
        echo "<h3 class='text-center text-success my-5'>All users</h3>
        <table class='table table-bordered text-center my-5'>
        <thead class='table-info'>
        <tr>
        <th>Sl no</th>
        <th>User Name</th>
        <th>user Email</th>
        <th>User image</th>
        <th>user Address</th>
        <th>user Mobile</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody class='table-secondary'>";
        $number = 1;
        while ($users = mysqli_fetch_array($result_user)) {
            $user_id = $users['user_id'];
            $username = $users['username'];
            $user_email = $users['user_email'];
            $user_image = $users['user_image'];
            $user_address = $users['user_address'];
            $user_address = $users['user_address'];
            $user_mobile = $users['user_mobile'];

            echo "<tr>
            <td>$number</td>
            <td>$username</td>
            <td>$user_email</td>
            <td><img src='../users_area/user_images/$user_image' alt='$username' class='product_img'/></td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            <td><a href='index.php?delete_user=$user_id' class='text-black'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
            $number++;
        }
        echo "</tbody>
        </table>";
    } else {
        echo "<h3 class='text-center text-danger my-5'>No users yet</h3>";
    }
}
