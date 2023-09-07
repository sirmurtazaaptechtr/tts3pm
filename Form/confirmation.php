<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page</title>
</head>
<body>
    <h1>Form Submission Confirmation</h1>

    <?php
    session_start();

    // Check if the form data is available in the session
    if (isset($_SESSION['form_data'])) {
        $formData = $_SESSION['form_data'];
        echo "<p>Your information has been successfully submitted:</p>";
        echo "<ul>";
        echo "<li><b>Name:</b> " . htmlspecialchars($formData['name']) . "</li>";
        echo "<li><b>Email:</b> " . htmlspecialchars($formData['email']) . "</li>";
        echo "<li><b>Website:</b> " . htmlspecialchars($formData['website']) . "</li>";
        echo "<li><b>Comment:</b> " . htmlspecialchars($formData['comment']) . "</li>";
        echo "<li><b>Gender:</b> " . htmlspecialchars($formData['gender']) . "</li>";
        echo "</ul>";

        // Clear the form data session
        unset($_SESSION['form_data']);
    } else {
        echo "<p>No form data available for confirmation.</p>";
    }
    ?>

    <p><a href="Sep072023-1.php">Return to the form</a></p>
</body>
</html>
