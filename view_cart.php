<?php
require "php/functions.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include "includes/nav.php"; ?>
    <div class="cart-container">
        <h1>Your Shopping Cart</h1>
        <?php if (!empty($_SESSION['cart'])) { ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_price = 0; // Corrected variable name
                    foreach ($_SESSION['cart'] as $item) {
                        $id = isset($item['id']) ? intval($item['id']) : 0;
                        $title = isset($item['title']) ? htmlspecialchars($item['title']) : "Unknown Product";
                        $image = isset($item['image']) ? "products/" . htmlspecialchars($item['image']) : "images/placeholder.png";
                        $price = isset($item['price']) && is_numeric($item['price']) ? floatval($item['price']) : 0;
                        $quantity = isset($item['quantity']) && is_numeric($item['quantity']) ? intval($item['quantity']) : 1;

                        // Calculate item total and add to cart total
                        $item_total = $price * $quantity; // Consistent variable name
                        $total_price += $item_total;
                        ?>
                        <tr>
                            <td><img src="<?php echo $image; ?>" alt="Product Image"></td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td>&dollar; <?php echo number_format($price, 2); ?></td>
                            <td>&dollar; <?php echo number_format($item_total, 2); ?></td>
                            <td>
                                <form action="remove_from_cart.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                    <button type="submit" class="remove-button">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="cart-summary">
                <p>Total Price: <span>&dollar; <?php echo number_format($total_price, 2); ?></span></p>
                <a href="checkout.php" class="checkout-button">Proceed to Checkout</a>
            </div>
        <?php } else { ?>
            <p class="empty-cart">Your cart is empty!</p>
        <?php } ?>
    </div>
</body>

</html>