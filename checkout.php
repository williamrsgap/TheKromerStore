<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include "includes/nav.php"; ?>
    <div class="checkout-container">
        <h1>Checkout</h1>
        <div class="summary-section">
            <h2>Order Summary</h2>
            <table class="summary-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_price = 0;
                    foreach ($_SESSION['cart'] as $item) {
                        $total_price += $item['price'] * $item['quantity'];
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['title']); ?></td>
                            <td><?php echo intval($item['quantity']); ?></td>
                            <td>&dollar; <?php echo number_format($item['price'], 2); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <p class="total-price">Total: &dollar; <?php echo number_format($total_price, 2); ?></p>
        </div>

        <div class="payment-section">
            <h2>Payment Methods</h2>
            <form action="process_payment.php" method="POST">
                <!-- Credit/Debit Card Option -->
                <div class="payment-option">
                    <input type="radio" id="credit-card" name="payment_method" value="credit_card"
                        onclick="toggleCardInfo(true)" required>
                    <label for="credit-card">Credit/Debit Card</label>
                </div>

                <div class="card-info" id="card-info" style="display: none;">
                    <input type="text" name="card_number" placeholder="Card Number (16 digits)" pattern="\d{16}"
                        title="Card number must be exactly 16 digits">
                    <input type="text" name="card_name" id="card-name" placeholder="Name on Card">
                    <input type="text" name="expiry_date" placeholder="Expiry Date (MM/YY)" pattern="\d{2}/\d{2}" title="Expiry date must be in the format MM/YY">
                    <input type="text" name="cvv" placeholder="CVV (3 digits)" pattern="\d{3}" title="CVV must be exactly 3 digits">
                </div>

                <!-- Cash on Delivery Option -->
                <div class="payment-option">
                    <input type="radio" id="cash-on-delivery" name="payment_method" value="cash_on_delivery"
                        onclick="toggleCardInfo(false)" required>
                    <label for="cash-on-delivery">Cash on Delivery</label>
                </div>

                <button type="submit" class="submit-button">Confirm Order</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript to toggle card info fields
        function toggleCardInfo(show) {
            const cardInfo = document.getElementById("card-info");
            if (show) {
                cardInfo.style.display = "block";
                // Set required attributes for card fields
                document.getElementById("card-number").setAttribute("required", "true");
                document.getElementById("card-name").setAttribute("required", "true");
                document.getElementById("expiry-date").setAttribute("required", "true");
                document.getElementById("cvv").setAttribute("required", "true");
            } else {
                cardInfo.style.display = "none";
                // Remove required attributes for card fields
                document.getElementById("card-number").removeAttribute("required");
                document.getElementById("card-name").removeAttribute("required");
                document.getElementById("expiry-date").removeAttribute("required");
                document.getElementById("cvv").removeAttribute("required");
            }
        }
    </script>
</body>

</html>