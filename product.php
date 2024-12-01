<?php
session_start();
require "php/functions.php";

// Initialize cart session if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['title'])) {
    $title = urldecode($_GET['title']);
    $product = getProductByTitle($title);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="desciption" content="<?php echo $product[0]['meta_description'] ?>">
    <meta name="keywords" content="<?php echo $product[0]['meta_keywords'] ?>">
    <link rel="stylesheet" href="css/styles.css">
    <title><?php echo $title ?></title>
    <style>
        footer {
            position: fixed;
            bottom: 0;
        }
    </style>
</head>

<body>
    <?php include "includes/nav.php" ?>
    <?php include "includes/header.php" ?>
    <main>
        <div class="left">
            <div class="section-title">Product Categories</div>
            <?php $categories = getCategories() ?>
            <?php
            foreach ($categories as $category) {
                ?>
                <a href="category.php?category=<?php echo urlencode($category['category']) ?>">
                    <?php echo ucfirst($category['category']) ?>
                </a>
                <?php
            }
            ?>
        </div>
        <div class="right">
            <div class="section-title">Product details</div>
            <div class="product">
                <div class="product-left">
                    <img src="<?php echo "products/{$product[0]['image']}" ?>" alt="">
                </div>
                <div class="product-right">
                    <p class="title"><?php echo $product[0]['title']; ?></p>
                    <p class="description"><?php echo $product[0]['description']; ?></p>
                    <p class="price">&dollar; <?php echo $product[0]['price']; ?></p>
                    <p class="stock <?php echo $product[0]['stock'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                        <?php
                        if ($product[0]['stock'] > 0) {
                            echo "In stock: {$product[0]['stock']} units.";
                        } else {
                            echo "Out of stock.";
                        }
                        ?>
                    </p>

                    <form action="cart.php" method="POST" class="cart-form">
                        <input type="hidden" name="image" value="<?php echo $product[0]['image'] ?>">
                        <input type="hidden" name="product_id" value="<?php echo $product[0]['id']; ?>">
                        <input type="hidden" name="title" value="<?php echo $product[0]['title']; ?>">
                        <input type="hidden" name="price" value="<?php echo $product[0]['price']; ?>">
                        <label for="quantity" class="quantity-label">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" min="1"
                            max="<?php echo $product[0]['stock']; ?>" value="1" required <?php echo $product[0]['stock'] <= 0 ? 'disabled' : ''; ?>>
                        <button type="submit" class="add-to-cart-button" <?php echo $product[0]['stock'] <= 0 ? 'disabled' : ''; ?>>Add to Cart</button>
                    </form>
                </div>

            </div>
        </div>
    </main>
    <?php include "includes/footer.php" ?>
    <script src="javascript/script.js"></script>
</body>

</html>