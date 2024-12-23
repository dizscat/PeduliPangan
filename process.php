<?php
require_once 'config.php';

// Tambahkan ini untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debug: Print POST data
    error_log("POST Data: " . print_r($_POST, true));

    // Sanitasi input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Debug: Print sanitized data
    error_log("Sanitized Data: name=$name, email=$email, phone=$phone");

    // Validasi input
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Name is required";
    }
    
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    if (empty($message)) {
        $errors[] = "Message is required";
    }

    // Debug: Print errors if any
    if (!empty($errors)) {
        error_log("Validation Errors: " . print_r($errors, true));
    }

    // Jika tidak ada error, simpan ke database
    if (empty($errors)) {
        $sql = "INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)";
        
        // Debug: Print SQL query
        error_log("SQL Query: " . $sql);

        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt === false) {
            error_log("Prepare failed: " . mysqli_error($conn));
            $response = [
                'status' => 'error',
                'message' => 'Database prepare error'
            ];
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $message);
            
            if (mysqli_stmt_execute($stmt)) {
                error_log("Data inserted successfully!");
                $response = [
                    'status' => 'success',
                    'message' => 'Thank you! Your message has been sent successfully.'
                ];
            } else {
                error_log("Execute failed: " . mysqli_stmt_error($stmt));
                $response = [
                    'status' => 'error',
                    'message' => 'Sorry, there was an error sending your message.'
                ];
            }
            
            mysqli_stmt_close($stmt);
        }
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Please correct the following errors: ' . implode(", ", $errors)
        ];
    }

    // Debug: Print final response
    error_log("Response: " . print_r($response, true));

    // Kirim response dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?> 
