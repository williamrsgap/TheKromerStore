<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="We have a large collection of electronics including laptops, monitors, peripherals, and desktops">
    <meta name="keywords" content="laptops, monitors, peripherals, desktops">
    <link rel="stylesheet" href="css/styles.css">
    <title>The Kromer Store</title>
    <style>
        footer {
            position: fixed;
            bottom: 0;
        }

        .reviews-section,
        .contact-info {
            margin: 25px;
            padding: 25px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .reviews-section h2,
        .contact-info h2 {
            margin-bottom: 10px;
        }

        .review-form input,
        .review-form textarea {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .review-form button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .review-form button:hover {
            background-color: #0056b3;
        }

        .review-list {
            margin-top: 20px;
        }

        .review-item {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .review-item:last-child {
            border-bottom: none;
        }

        .review-item h3 {
            margin: 0;
        }

        .review-item p {
            margin: 5px 0;
        }

        .review-item small {
            color: #888;
        }

        .contact-info p {
            margin: 5px 0;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <?php include "includes/nav.php" ?>
    <?php include "includes/header.php" ?>
    <main>
        <div class="reviews-section">
            <h2>Reviews</h2>
            <!-- Review Submission Form -->
            <form action="submit_review.php" method="POST" class="review-form">
                <input type="text" name="name" placeholder="Your Name" required>
                <textarea name="review" rows="4" placeholder="Your Review" required></textarea>
                <button type="submit">Submit Review</button>
            </form>

            <!-- Review List -->
            <div class="review-list">
                <?php
                $reviewsFile = "data/reviews.json";
                if (file_exists($reviewsFile)) {
                    $reviews = json_decode(file_get_contents($reviewsFile), true);
                    if (!empty($reviews)) {
                        foreach ($reviews as $review) {
                            echo "<div class='review-item'>";
                            echo "<h3>" . htmlspecialchars($review['name']) . "</h3>";
                            echo "<p>" . htmlspecialchars($review['review']) . "</p>";
                            echo "<small>Submitted on " . htmlspecialchars($review['date']) . "</small>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No reviews yet. Be the first to leave one!</p>";
                    }
                } else {
                    echo "<p>No reviews yet. Be the first to leave one!</p>";
                }
                ?>
            </div>
        </div>

        <div class="contact-info">
            <h2>Contact Information</h2>
            <p><strong>Address:</strong> 1 University Plaza, Youngstown, Ohio, 44555</p>
            <p><strong>Phone:</strong> +1 (880) 989-2725</p>
            <p><strong>Email:</strong> support@kromerstore.com</p>
            <p><strong>Business Hours:</strong> Monday - Friday, 9:00 AM - 5:00 PM</p>
            <p><strong>Social Media:</strong> Follow us on <a href="#">Facebook</a>, <a href="#">Twitter</a>, and <a
                    href="#">Instagram</a>.</p>
        </div>
    </main>
    <?php include "includes/footer.php" ?>
    <script src="javascript/script.js"></script>
</body>

</html>