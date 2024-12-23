<?php
require_once 'includes/config.php';

try {
    // Drop tables if they exist (optional for clean migration)
    $conn->exec("DROP TABLE IF EXISTS donations, donation_requests, users");

    // Create `users` table
    $conn->exec("
        CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            role ENUM('admin', 'donatur', 'beneficiary') NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");

    // Create `donation_requests` table
    $conn->exec("
        CREATE TABLE donation_requests (
            id INT AUTO_INCREMENT PRIMARY KEY,
            beneficiary_id INT NOT NULL,
            title VARCHAR(150) NOT NULL,
            type ENUM('general', 'food') NOT NULL DEFAULT 'general',
            address TEXT NULL,
            description TEXT NOT NULL,
            amount DECIMAL(10, 2) NOT NULL,
            status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (beneficiary_id) REFERENCES users(id) ON DELETE CASCADE
        )
    ");

    // Create `donations` table
    $conn->exec("
        CREATE TABLE donations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            donator_id INT NOT NULL,
            request_id INT NOT NULL,
            amount DECIMAL(10, 2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (donator_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (request_id) REFERENCES donation_requests(id) ON DELETE CASCADE
        )
    ");

    echo "Migration completed successfully!<br>";

    // Seed users table
    $conn->exec("
        INSERT INTO users (name, email, password, role) VALUES
        ('Admin User', 'admin@example.com', '" . password_hash('admin123', PASSWORD_DEFAULT) . "', 'admin'),
        ('Donor User', 'donor@example.com', '" . password_hash('donor123', PASSWORD_DEFAULT) . "', 'donatur'),
        ('Beneficiary User', 'beneficiary@example.com', '" . password_hash('beneficiary123', PASSWORD_DEFAULT) . "', 'beneficiary')
    ");
    echo "Users seeded successfully!<br>";

    // Seed donation_requests table
    $conn->exec("
        INSERT INTO donation_requests (beneficiary_id, title, description, type, address, amount, status) VALUES
        (3, 'Help for School Supplies', 'We need funds to buy school supplies for children in need.', 'general', NULL, 500.00, 'approved'),
        (3, 'Food Aid for Homeless', 'Requesting support to distribute food to homeless people.', 'food', '123 Main Street, Cityville', 0.00, 'approved'),
        (3, 'Emergency Food Support', 'Urgent request for food distribution in disaster areas.', 'food', '456 Elm Street, Townsville', 0.00, 'pending')
    ");
    echo "Donation requests seeded successfully!<br>";

    // Seed donations table
    $conn->exec("
        INSERT INTO donations (donator_id, request_id, amount) VALUES
        (2, 1, 100.00),
        (2, 1, 150.00)
    ");
    echo "Donations seeded successfully!<br>";

} catch (PDOException $e) {
    echo "Migration or seeding failed: " . $e->getMessage();
}
?>
