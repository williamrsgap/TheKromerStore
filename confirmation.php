<?php
session_start();

// Simulate order processing (normally, you'd save to a database here)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $payment_method = htmlspecialchars($_POST['payment_method']);
    
    // Clear cart after order submission
    $_SESSION['cart'] = [];
} else {
    header("Location: checkout.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include "includes/nav.php"; ?>
    <div class="confirmation-container">
        <h1>Order Confirmed</h1>
        <p>Thank you, <strong><?php echo $name; ?></strong>, for your order!</p>
        <p>A confirmation email has been sent to <strong><?php echo $email; ?></strong>.</p>
        <p>We will deliver your order to:</p>
        <p><strong><?php echo $address; ?></strong></p>
        <p>Payment Method: <strong><?php echo ucfirst(str_replace('_', ' ', $payment_method)); ?></strong></p>
        <a href="index.php" class="home-button">Continue Shopping</a>
    </div>
</body>
</html>
