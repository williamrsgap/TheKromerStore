<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']); // Product ID passed from the form

    $key = array_search($id, array_column($_SESSION['cart'], 'id')); 
    if (isset($_SESSION['cart'][$key])) {
        unset($_SESSION['cart'][$key]);
        echo "Unset Key";
    }
    // Reindex the cart array to maintain sequential keys
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    header("Location: view_cart.php");
    exit();
}
?>
