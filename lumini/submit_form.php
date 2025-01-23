<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root'); 
define('DB_PASS', ''); 
define('DB_NAME', 'login_lumina'); 

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']); 
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_form (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "
        <div style='padding: 20px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px;'>
            <strong>Success!</strong> Your message has been submitted successfully.
        </div>";
    } else {
        echo "
        <div style='padding: 20px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px;'>
            <strong>Error!</strong> There was a problem submitting your message. Please try again.
        </div>";
    }
}

$conn->close();
?>
