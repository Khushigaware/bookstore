<?php
include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home.css">

</head>
<body>

<?php
include 'user_header.php';
?>

<section class="orders">
    <h2>Placed Orders</h2>
    <div class="orders_cont">
        <?php
        $order_query = mysqli_query($conn, "SELECT * FROM orders WHERE user_id='$user_id'") or die('query failed');

        if (mysqli_num_rows($order_query) > 0) {
            while ($fetch_orders = mysqli_fetch_assoc($order_query)) {
                // Format the 'placed_on' column value
                $placed_on = $fetch_orders['placed_on'];
                if ($placed_on == "0000-00-00 00:00:00" || empty($placed_on)) {
                    $display_date = "Not Available";
                } else {
                    // Convert the DATETIME value into a readable format (e.g., "17-12-2024 14:30")
                    $display_date = date("d-m-Y H:i", strtotime($placed_on));
                }
        ?>
        <div class="orders_box">
            <p> placed on : <span><?php echo $display_date; ?></span> </p>
            <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
            <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
            <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
            <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
            <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
            <p> your orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
            <p> total price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
            <p> payment status : 
                <span style="color:<?php echo ($fetch_orders['payment_status'] == 'pending') ? 'red' : 'green'; ?>;">
                    <?php echo $fetch_orders['payment_status']; ?>
                </span> 
            </p>
        </div>
        <?php
            }
        } else {
            echo '<p class="empty">No orders placed yet!</p>';
        }
        ?>
    </div>
</section>

<?php
include 'footer.php';
?>

<script src="https://kit.fontawesome.com/eedbcd0c96.js" crossorigin="anonymous"></script>
<script src="script.js"></script>

</body>
</html>
