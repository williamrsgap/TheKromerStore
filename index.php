<?php require "php/functions.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="desciption" content="We have a large collection of electronics including laptops, monitors, peripherals, and desktops">
    <meta name="keywords" content="laptops, monitors, peripherals, desktops">
    <link rel="stylesheet" href="css/styles.css">
    <title>The Kromer Store</title>
</head>
<body>
    <?php include "includes/nav.php"?>
    <?php include "includes/header.php"?>
    <main>
        <div class="left">
            <div class="section-title">Product Categories</div>
            <?php $categories = getCategories() ?>
            <?php
                foreach($categories as $category){
                    ?>
                        <a href="category.php?category=<?php echo urlencode($category['category']) ?>">
                            <?php echo ucfirst($category['category']) ?>
                        </a>
                    <?php
                }
            ?>
        </div>
        <div class="right">
            <div class="section-title">Home page</div>
            <?php
                $products = getHomePageProducts(5);
            ?>
            <div class="product">
                <?php
                    foreach($products as $product) {
                        ?>
                    <div class="product-left">
                    <img src="<?php echo "products/{$product['image']}" ?>" alt="">
                </div>
                <div class="product-right">
                    <p class="title">
                        <a href="product.php?title=<?php echo urldecode($product['title'])?>">
                            <?php echo $product['title'] ?>
                        </a>
                    </p>
                    <p class="description">
                        <?php echo $product['description']?>
                </p>       
                    <p class="price">
                    &dollar;
                        <?php echo $product['price'] ?>
                    </p>            
                </div>
                        <?php
                    }
                ?>                
            </div>
        </div>
    </main>
    <?php include "includes/footer.php"?>
    <script src="javascript/script.js"></script>
</body>
</html>        