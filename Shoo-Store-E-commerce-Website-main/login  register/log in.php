<?php
// Path to the file where emails and passwords are stored
$file = 'users.txt';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Read the contents of the users file
    $users = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Loop through each line in the file
    foreach ($users as $user) {
        // Split the line into email and password
        list($stored_email, $stored_password) = explode(':', $user);

        // Check if the email and password match
        if ($stored_email == $email && $stored_password == $password) {
            // Authentication successful
            echo "<h2>Login successful!</h2>";
            echo "<img src='success_image.jpg' alt='Success'>";
            exit; // Stop further processing
        }
    }

    // Authentication failed
    echo "<h2>Login failed. Invalid email or password.</h2>";
}
?>
