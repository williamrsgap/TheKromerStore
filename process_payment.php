<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payment_method = isset($_POST['payment_method']) ? htmlspecialchars($_POST['payment_method']) : '';
    $card_number = isset($_POST['card_number']) ? $_POST['card_number'] : '';
    $expiry_date = isset($_POST['expiry_date']) ? $_POST['expiry_date'] : '';
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';

    // Validation for card fields if Credit Card is selected
    if ($payment_method === 'credit_card') {
        if (empty($card_number) || !preg_match('/^\d{16}$/', $card_number)) {
            die("Invalid card number. It must be exactly 16 digits.");
        }
        if (empty($expiry_date) || !preg_match('/^\d{2}\/\d{2}$/', $expiry_date)) {
            die("Invalid expiry date. Use MM/YY format.");
        }
        if (empty($cvv) || !preg_match('/^\d{3}$/', $cvv)) {
            die("Invalid CVV. It must be exactly 3 digits.");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include "includes/nav.php"; ?>
    <div class="payment-container">
        <h1>Complete Your Order</h1>
        <form action="confirmation.php" method="POST" class="payment-form">
            <div class="user-info">
                <h2>Personal Information</h2>
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="tel" name="phone" placeholder="Phone Number" required>
                <input type="text" name="address" placeholder="Shipping Address" required>
            </div>

            <?php if ($payment_method === 'credit_card') { ?>
                <div class="card-info">
                    <h2>Credit Card Information</h2>
                    <input type="text" name="card_number" value="<?php echo htmlspecialchars($card_number); ?>"
                        placeholder="Card Number (16 digits)" pattern="\d{16}" title="Card number must be exactly 16 digits"
                        required>
                    <input type="text" name="expiry_date" value="<?php echo htmlspecialchars($expiry_date); ?>"
                        placeholder="Expiry Date (MM/YY)" pattern="\d{2}/\d{2}"
                        title="Expiry date must be in the format MM/YY" required>
                    <input type="text" name="cvv" value="<?php echo htmlspecialchars($cvv); ?>" placeholder="CVV (3 digits)"
                        pattern="\d{3}" title="CVV must be exactly 3 digits" required>
                </div>
            <?php } ?>

            <div class="payment-summary">
                <h2>Order Summary</h2>
                <p>Total: <strong>&dollar; <?php echo number_format(array_sum(array_map(function ($item) {
                    return $item['price'] * $item['quantity'];
                }, $_SESSION['cart'])), 2); ?></strong></p>
                <p>Payment Method: <strong><?php echo ucfirst(str_replace('_', ' ', $payment_method)); ?></strong></p>
            </div>

            <input type="hidden" name="payment_method" value="<?php echo htmlspecialchars($payment_method); ?>">
            <button type="submit" class="submit-button">Place Order</button>
        </form>
    </div>
</body>

</html>