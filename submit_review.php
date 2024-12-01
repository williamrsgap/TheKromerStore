<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'Anonymous';
    $review = isset($_POST['review']) ? htmlspecialchars($_POST['review']) : '';
    $date = date('Y-m-d H:i:s');

    // Read existing reviews
    $reviewsFile = "data/reviews.json";
    $reviews = file_exists($reviewsFile) ? json_decode(file_get_contents($reviewsFile), true) : [];

    // Append the new review
    $reviews[] = [
        'name' => $name,
        'review' => $review,
        'date' => $date
    ];

    // Save reviews back to the file
    file_put_contents($reviewsFile, json_encode($reviews));

    // Redirect back to the contact page
    header("Location: contact.php");
    exit();
}
?>
