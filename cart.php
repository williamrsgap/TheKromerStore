<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = intval($_POST['quantity']);
    $title = $_POST['title'];
    $price = floatval($_POST['price']);
    $image = isset($_POST['image']) ? $_POST['image'] : 'placeholder.png'; // Default to placeholder

    // Initialize cart if not set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if product already exists in the cart
    $exists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] === $product_id) {
            $item['quantity'] += $quantity; // Update quantity
            $exists = true;
            break;
        }
    }

    // If the product doesn't exist, add it
    if (!$exists) {
        $_SESSION['cart'][] = [
            'id' => $product_id,
            'title' => $title,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $image, // Always set the image key
        ];
    }

    header('Location: view_cart.php');
    exit;
}

?>

