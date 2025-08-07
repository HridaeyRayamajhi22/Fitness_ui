<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $trainingStyle = htmlspecialchars(trim($_POST['trainingStyle'] ?? ''));

    // Validate input
    if (empty($name) || empty($email) || empty($phone) || empty($trainingStyle)) {
        echo "All fields are required.";
        exit;
    }

    // Optionally: Save to a file (you can use a database instead)
    $entry = "Name: $name\nEmail: $email\nPhone: $phone\nTraining Style: $trainingStyle\n---\n";
    file_put_contents('submissions.txt', $entry, FILE_APPEND | LOCK_EX);

    echo "Thank you for registering! We'll be in touch soon.";
} else {
    echo "Invalid request.";
}
?>
